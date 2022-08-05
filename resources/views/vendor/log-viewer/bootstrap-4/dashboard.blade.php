@extends('log-viewer::bootstrap-4._master')

@section('content')
    <div class="page-header mb-4">
        <h1>@lang('Dashboard')</h1>
    </div>

    <div class="row">
        <div class="col-md-6 col-lg-3">
            <canvas id="stats-doughnut-chart" height="300" class="mb-3"></canvas>
        </div>

        <div class="col-md-6 col-lg-9">
            <div class="row">
                @foreach($percents as $level => $item)
                    <div class="col-sm-6 col-md-12 col-lg-4 mb-3">
                        <div class="card level-{{ strtolower($item['name']) }}{{ $item['percent'] == '0' ? ' card-empty' : ''}}">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-3">
                                        @if($item['name'] === 'All')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <line x1="4" y1="6" x2="20" y2="6"></line>
                                                <line x1="4" y1="12" x2="20" y2="12"></line>
                                                <line x1="4" y1="18" x2="20" y2="18"></line>
                                            </svg>
                                        @elseif($item['name'] === 'Emergency')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bug" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M9 9v-1a3 3 0 0 1 6 0v1"></path>
                                                <path d="M8 9h8a6 6 0 0 1 1 3v3a5 5 0 0 1 -10 0v-3a6 6 0 0 1 1 -3"></path>
                                                <line x1="3" y1="13" x2="7" y2="13"></line>
                                                <line x1="17" y1="13" x2="21" y2="13"></line>
                                                <line x1="12" y1="20" x2="12" y2="14"></line>
                                                <line x1="4" y1="19" x2="7.35" y2="17"></line>
                                                <line x1="20" y1="19" x2="16.65" y2="17"></line>
                                                <line x1="4" y1="7" x2="7.75" y2="9.4"></line>
                                                <line x1="20" y1="7" x2="16.25" y2="9.4"></line>
                                            </svg>
                                        @elseif($item['name'] === 'Alert')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="12" cy="12" r="9"></circle>
                                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                            </svg>
                                        @elseif($item['name'] === 'Critical')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart-broken" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"></path>
                                                <path d="M12 7l-2 4l4 3l-2 4v3"></path>
                                            </svg>
                                        @elseif($item['name'] === 'Error')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-triangle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M12 9v2m0 4v.01"></path>
                                                <path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75"></path>
                                            </svg>
                                        @elseif($item['name'] === 'Warning')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-flag" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <line x1="5" y1="5" x2="5" y2="21"></line>
                                                <line x1="19" y1="5" x2="19" y2="14"></line>
                                                <path d="M5 5a5 5 0 0 1 7 0a5 5 0 0 0 7 0"></path>
                                                <path d="M5 14a5 5 0 0 1 7 0a5 5 0 0 0 7 0"></path>
                                            </svg>
                                        @elseif($item['name'] === 'Notice')
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pinned" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M9 4v6l-2 4v2h10v-2l-2 -4v-6"></path>
                                                    <line x1="12" y1="16" x2="12" y2="21"></line>
                                                    <line x1="8" y1="4" x2="16" y2="4"></line>
                                                </svg>
                                        @elseif($item['name'] === 'Info')
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-info-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <circle cx="12" cy="12" r="9"></circle>
                                                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                                    <polyline points="11 12 12 12 12 16 13 16"></polyline>
                                                </svg>
                                        @elseif($item['name'] === 'Debug')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-radioactive" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M13.5 14.6l3 5.19a9 9 0 0 0 4.5 -7.79h-6a3 3 0 0 1 -1.5 2.6"></path>
                                                <path d="M13.5 9.4l3 -5.19a9 9 0 0 0 -9 0l3 5.19a3 3 0 0 1 3 0"></path>
                                                <path d="M10.5 14.6l-3 5.19a9 9 0 0 1 -4.5 -7.79h6a3 3 0 0 0 1.5 2.6"></path>
                                            </svg>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <h3 class="card-title mb-1">
                                            <a href="#" class="text-reset">{{ $item['name'] }}</a>
                                        </h3>
                                        <div class="card-number">
                                            {{ $item['count'] }} @lang('entries') - {!! $item['percent'] !!} %
                                        </div>
                                        <div class="mt-3">
                                            <div class="row g-2 align-items-center">
                                                <div class="col-auto">
                                                    {!! $item['percent'] !!}%
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar" style="width: {!! $item['percent'] !!}%" role="progressbar" aria-valuenow="{!! $item['percent'] !!}" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="visually-hidden"> {{ $item['count'] }} @lang('entries') - {!! $item['percent'] !!}%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            new Chart(document.getElementById("stats-doughnut-chart"), {
                type: 'doughnut',
                data: {!! $chartData !!},
                options: {
                    legend: {
                        position: 'bottom'
                    }
                }
            });
        });
    </script>
@endsection
