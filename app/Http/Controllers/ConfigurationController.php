<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ConfigurationController extends Controller
{

    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:configuration-edit');
    }

    /**
     * Display form for editing all configuration sections
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.configuration.index');
    }

    /**
     * Display form for editing specific resource
     *
     * @param $section
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($section)
    {
        $settings = config("app_settings.field_config.$section");

        return view('admin.configuration.edit', compact('settings', 'section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Factory $cache
     * @param $upsert
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function update(Factory $cache, $upsert = [])
    {
        $configKeys = array_keys(config('app_settings.values'));

        request()->validate(['section' => 'required|in:' . implode(',', array_keys(config('app_settings.field_config')))]);

        $section = request()->get('section');

        foreach (request()->only($configKeys) as $name => $value) {
            $upsert[] = ['config_name' => $name, 'config_value' => json_encode($value)];
            $rules[$name] = config("app_settings.field_config.$section.$name.rules") ? : '';
        }

        request()->validate( $rules );

        Configuration::upsert($upsert,'config_name');

        $cache->forget('app_settings');

        return redirect()->back()->with('success', 'Konfiguracija je uspešno izmenjena!');
    }
}
