@extends('admin.layouts.form.create_edit', [
    'cardContent' => true
])

@section('form_title', 'SiteMap')

@section('header-actions')
    <div class="btn-list">
        <a href="{{ route('admin.sitemap.update') }}" class="btn btn-green d-none d-sm-inline-block">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3"></path>
                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"></path>
                <line x1="16" y1="5" x2="19" y2="8"></line>
            </svg>
            Update Sitemap
        </a>
    </div>
@endsection

@section('card_content')
    <div class="card">
        <div class="table-responsive">
            <table class="table table-vcenter card-table">
                <thead>
                <tr>
                    <th>URL</th>
                    <th>Priority</th>
                    <th>Update freq</th>
                    <th>Updated at</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($sitemap as $rows)
                        @foreach($rows as $row)
                            <tr>
                                <td class="text-muted"><a href="{{ $row['loc'] }}" class="text-reset" target="_blank">{{ $row['loc'] }}</a></td>
                                <td>{{ $row['priority'] * 100 }}%</td>
                                <td class="text-muted">
                                    {{ $row['changefreq'] }}
                                </td>
                                <td class="text-muted">
                                    {{ $row['lastmod'] }}
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
