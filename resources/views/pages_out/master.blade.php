<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" ng-app="gnscsApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="{{ asset('public/img/logo.png') }}" />
  
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.png') }}">
    <title>24/7 Global Nursing Solution & Consulting Services LLC</title>

    <!-- Font Awesome v4.7.0 -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">

    <!-- Bootstrap v3.3.7 -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">

    <!-- Global CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/gnscs/global.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/gnscs/pages_out/master.css') }}">

    @if (isset($stylesheet))
      @foreach($stylesheet as $css)
        <link rel="stylesheet" type="text/css" href="{{ asset($css) }}">
      @endforeach
    @endif
</head>
<body>
<div id="wrapper">
  <nav id="navigation" class="navbar">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">
        <img src="img/logo.png" alt="Logo" class="logo">
        Global Nursing Solution &
        <br /><span>Consulting Services LLC</span>
      </a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="{{ Request::is('home') ? 'active' : '' }}">
          <a href="home">Home</a>
        </li>
        <li class="{{ Request::is('about') ? 'active' : '' }}">
          <a href="about">About</a>
        </li>
        <li class="{{ Request::is('services') ? 'active' : '' }}">
          <a href="services">Services</a>
        </li>
        <li class="{{ Request::is('careers') ? 'active' : '' }}">
          <a href="careers">Careers</a>
        </li>
        <li class="{{ Request::is('contacts') ? 'active' : '' }}">
          <a href="contacts">Contact Us</a>
        </li>
      </ul>
    </div>
  </nav>
  <div id="inrpg">
      @yield('content')
  </div>
  <div class="clearfix"></div>
  <div id="footer">
    <div class="no-gutter">
      <div class="col-lg-4 ftr">
        <div class="ftrbx">
          <h3>24/7 Global Nursing Solution & Consulting Services LLC</h3>
          <ul>
            <li>
              <i class="fa fa-envelope" aria-hidden="true" style="font-size: 16px;"></i>
              <a href="mailto:support@247globalnursingsolution.com">support@247globalnursingsolution.com</a>
            </li>
            <!-- <li>
              <i class="fa fa-mobile" aria-hidden="true"></i>
              <span>0912-345-6789</span>
            </li> -->
            <li>
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>(212) 244-0247</span>
            </li>
            <li>
              <i class="fa fa-fax" aria-hidden="true" style="font-size: 16px;"></i>
              <span>Fax No: (212) 244-0248</span>
            </li>
            <li>
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>
                330 West 38th Street, Suite 808, New York, NY, 10018
              </span>
            </li>
            <li></li>
          </ul>
          <ul class="sclmedia">
            <li><a href="https://www.facebook.com/247-Global-Nursing-Solution-and-Consulting-Services-LLC-177514276040094/?fref=ts" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="https://twitter.com/247GNSCS" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="https://www.instagram.com/247gnscs/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-3 ftr">
        <div class="ftrbx">
          <h3>Links</h3>
          <ul>
            <li>
              <a href="home">Home</a>
            </li>
            <li>
              <a href="about">About</a>
            </li>
            <li>
              <a href="services">Services</a>
            </li>
            <li>
              <a href="careers">Careers</a>
            </li>
            <li>
              <a href="contact">Contact</a>
            </li>
            <li></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-5 ftr">
        <div class="ftrbx">
          <h3>Services</h3>
          <ul>
            <li>
              <a href="services">Certified Nursing Assistants</a>
            </li>
            <li>
              <a href="services">Licensed Physical Therapists</a>
            </li>
            <li>
              <a href="services">Licensed Occupational Therapists</a>
                </li>
                <li>
                  <a href="services">Licensed Speech Therapists</a>
                </li>
                <li>
                  <a href="services">Physical Therapy Assistants</a>
                </li>
                <li>
                  <a href="services">Occupational Therapy Assistants</a>
                </li>
                <li>
                  <a href="services">MDS Nurses</a>
                </li>
                <li></li>
              </ul>
            </div>
          </div>
      <!-- <div class="col-lg-3 ftr">
        <div class="ftrbx">
          <h3>For more inquiries:</h3>
          <form action="">
            <div class="nptgrp">
              <label>Name <span>*</span></label>
              <input name="nqry_name" type="text" class="form-control">
            </div>
            <div class="nptgrp">
              <label>Email <span>*</span></label>
              <input name="nqry_email" type="text" class="form-control">
            </div>
            <div class="nptgrp">
              <label>Message <span>*</span></label>
              <textarea name="nqry_msg" class="form-control" cols="20" rows="5"></textarea>
            </div>
            <button class="btn btn-success">Submit</button>
          </form>
        </div>
      </div> -->
    </div>
  </div>
  <div class="clearfix"></div>
  <div id="footerbtm">
      <p>24/7 Global Nursing Solution & Consulting Services LLC © 2016. All Rights Reserved</p>
  </div>
</div>
<!-- jQuery v3.2.0 -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap v3.3.7 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- JS -->
@if (isset($scripts))
  @foreach($scripts as $js)
    <script src="{{ asset($js) }}"></script>
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
