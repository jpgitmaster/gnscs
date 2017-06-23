<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" ng-app="gnscsApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="{{ asset('public/img/logo.png') }}" />
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.png') }}">
    <title>24/7 Global Nursing Solution & Consulting Services LLC</title>

    <!-- Font Awesome v4.7.0 -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">

    <!-- Bootstrap v3.3.7 -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">

    <!-- Global CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/gnscs/global.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/gnscs/admin/master.css') }}">
    
    @if (isset($stylesheet))
      @foreach($stylesheet as $css)
        <link rel="stylesheet" type="text/css" href="{{ asset($css) }}">
      @endforeach
    @endif

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>

<div id="wrapper" resize-page>
    <div id="header" ng-app="admnhdr" ng-controller="ctrlHeader">
        <div id="header_lft" class="lftsdrw">
            <button class="nav-toggle" ng-click="getPageSize(menu)" type="button" ng-class="{'active': menu}"><span></span></button>
        </div>
        <div id="header_rght" class="rghtsdrw">
            <di class="no-gutter">
                <div class="col-lg-6 col-md-7 col-sm-8 col-xs-8">
                    <div id="lft_side">
                        <!-- <div class="input-group pull-left">
                          <div class="input-group-btn">
                            <button type="button" class="btn btn-default">
                                <span class="text ng-binding">Search</span>
                            </button>
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                              <span class="caret"></span>
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu links">
                              <li><a href=""><span class="fa fa-search"></span> &nbsp; Search All</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href=""><span class="fa fa-users"></span> &nbsp; Users</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href=""><span class="fa fa-image"></span> &nbsp; Images</a></li>
                            </ul>
                          </div>
                          <input type="text" class="form-control" ng-model="searchthis" />
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-6 col-md-5 col-sm-4 col-xs-4">
                    <div id="rght_side" class="pull-right">
                        <div class="shtdwn">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                        <!-- <ul class="lnks icns_lnks">
                            <li class="lnk">
                                <a class="lnk_hrf">
                                    <i class="fa fa-bell"><small class="icns_count">2</small></i>
                                </a>
                            </li>
                            <li class="lnk">
                                <a class="lnk_hrf">
                                    <i class="fa fa-envelope"><small class="icns_count">15</small></i>

                                </a>
                            </li>
                            <li class="lnk">
                                <a class="lnk_hrf">
                                    <i class="fa fa-comments-o"></i>
                                </a>
                            </li>
                        </ul> -->
                    </div>
                </div>
            </di>
        </div>
    </div>

    <div id="content">
        <div id="content_lft" class="lftsdrw" ng-class="{'expand_nav': menu == true}">
            <ul class="lnks">
                <!-- <li class="lnk">
                    <a href="/" class="lnk_hrf">
                        <div class="icns p10"><i class="fa fa-medkit"></i></div>
                        <div class="text p10">Jobs</div>
                    </a>
                </li> -->
                <li class="lnk">
                    <a href="/" class="lnk_hrf">
                        <div class="icns p10"><i class="fa fa-users"></i></div>
                        <div class="text p10">Applicants</div>
                    </a>
                </li>
                <li class="lnk"></li>
            </ul>
        </div>
        <div id="content_rght" class="rghtsdrw" ng-class="{'expand_content': menu == true}">
            <div class="innr" ng-app="admncntnt">
                <div class="innrpg" ng-controller="ctrlContent">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
    
<!-- jQuery v3.2.0 -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap v3.3.7 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- JS -->
@if (isset($scripts))
  @foreach($scripts as $js)
    <script src="{{asset($js)}}"></script>
  @endforeach
@endif

<!-- Angular v1.6.4 -->
<script src="{{ asset('plugins/angular/angular.min.js') }}"></script>
<script src="{{ asset('plugins/angular/angular-sanitize.min.js') }}"></script>
<script src="{{ asset('plugins/angular/angular-resource.min.js') }}"></script>
<script src="{{ asset('plugins/angular/angular-animate.min.js') }}"></script>

<!-- App -->
@if (isset($ngular))
  @foreach($ngular as $ng)
    <script src="{{ asset($ng) }}"></script>
  @endforeach
@endif
</body>
</html>