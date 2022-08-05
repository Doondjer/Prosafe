<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Product;
use Arcanedev\LogViewer\Contracts\LogViewer;
use Arcanedev\LogViewer\Tables\StatsTable;
use Carbon\Carbon;
use Illuminate\Foundation\Http\MaintenanceModeBypassCookie;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;
use Psr\Http\Message\UriInterface;
use Illuminate\Support\Str;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class AdminsController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:maintenance-up|maintenance-down', ['only' => ['maintenance']]);
        $this->middleware('permission:maintenance-up', ['only' => ['up']]);
        $this->middleware('permission:maintenance-down', ['only' => ['down']]);
        $this->middleware('permission:view-phpinfo', ['only' => ['phpinfo']]);
        $this->middleware('permission:sitemap-generate', ['only' => ['sitemapUpdate']]);
    }

    public function home(LogViewer $logViewer)
    {
        $totals = $logViewer->statsTable();

        $logsData = $this->prepareChartData($totals);

        $percents  = $this->calcPercentages($totals->footer(), $totals->header());

        return view('admin.home', compact('logsData', 'percents'));
    }

    public function maintenance()
    {
        return view('admin.maintenance.index');
    }

    public function down(Request $request)
    {
        if(app()->isDownForMaintenance()) {

            return redirect()->back()->with('error', 'Aplikacija se već nalazi u modu Održavanja!');
        }

        $request->validate(['secret' => 'nullable|string|min:12']);

        $secret = $request->get('secret') ?: Str::uuid();

        Artisan::call("down --refresh=60 --secret=$secret");

        cache()->put('maintenance:mode:data', [
            'secret' => $secret,
            'maintenance_started' => Carbon::now()
        ]);

        return redirect("/$secret");
    }

    public function up()
    {
        if( ! app()->isDownForMaintenance()) {

            return redirect()->back()->with('error', 'Aplikacija se nije ni nalazila u modu Održavanja!');
        }

        Artisan::call('up');
        cache()->delete('maintenance:mode:data');

        return redirect(route('admin_homepage'))->with('success', 'Aplikacija se više ne nalazi u modu Održavanja');
    }

    public function phpinfo()
    {
        return view('admin.phpinfo.index');
    }

    public function sitemap()
    {
        $sitemap = $this->sitemapToArray();

        return view('admin.sitemap.index', compact('sitemap'));
    }

    public function sitemapUpdate()
    {
        $sitemap = Sitemap::create()
            ->add(Url::create(route('homepage')))
            ->add(Url::create(route('contact.create')))
            ->add(Url::create(route('products.index')))
            ->add(Url::create(route('pdf.catalog')))
            ->add(Url::create(route('pdf.pricing')))
            ->add(Url::create('/login'))
            ->add(Url::create('/sitemap.xml'));

        Page::all()->each(function (Page $page) use ($sitemap) {
            $sitemap->add(Url::create(route('pages.show',['page' => $page->slug])));
        });
        Product::all()->each(function (Product $product) use ($sitemap) {
            $sitemap->add(Url::create(route('products.show',['product' => $product->slug])));
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));

        return back()->with('succes', 'Mapa sajta je uspešno generisana.');
    }

    /**
     * @return mixed
     */
    protected function sitemapToArray()
    {
        $xmlString = file_get_contents(public_path('sitemap.xml'));

        $xmlObject = simplexml_load_string($xmlString);

        $json = json_encode($xmlObject);

        return json_decode($json, true);
    }

    /**
     * Prepare chart data.
     *
     * @param  \Arcanedev\LogViewer\Tables\StatsTable  $stats
     *
     * @return array
     */
    protected function prepareChartData(StatsTable $stats)
    {
        $totals = $stats->totals()->all();

        return [
            'labels'   => json_encode(Arr::pluck($totals, 'label')),
            'datasets' =>
                [
                    'data'                 => json_encode(Arr::pluck($totals, 'value')),
                    'backgroundColor'      => json_encode(Arr::pluck($totals, 'color')),
                    'hoverBackgroundColor' => json_encode(Arr::pluck($totals, 'highlight')),
                ],
        ];
    }
    /**
     * Calculate the percentage.
     *
     * @param  array  $total
     * @param  array  $names
     *
     * @return array
     */
    protected function calcPercentages(array $total, array $names)
    {
        $percents = [];
        $all      = Arr::get($total, 'all');

        foreach ($total as $level => $count) {
            $percents[$level] = [
                'name'    => $names[$level],
                'count'   => $count,
                'percent' => $all ? round(($count / $all) * 100, 2) : 0,
            ];
        }

        return $percents;
    }
}
