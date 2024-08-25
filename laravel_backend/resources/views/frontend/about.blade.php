@extends('layouts.website')
@section('content')  
   

<!--page title start-->

<section class="page-title">
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-lg-8 col-md-12">
        <h1>
          <span>About</span> Us
        </h1>
        <nav aria-label="breadcrumb" class="page-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.html">
                <i class="bi bi-house-door me-1"></i>Home</a>
            </li>
            <li class="breadcrumb-item">
              <a href="#">Pages</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">About Us</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <div class="wave-shape">
    <svg width="100%" height="150px" fill="none">
      <path fill="white">
        <animate repeatCount="indefinite" fill="freeze" attributeName="d" dur="10s" values="
          M0 25.9086C277 84.5821 433 65.736 720 25.9086C934.818 -3.9019 1214.06 -5.23669 1442 8.06597C2079 45.2421 2208 63.5007 2560 25.9088V171.91L0 171.91V25.9086Z;
          M0 86.3149C316 86.315 444 159.155 884 51.1554C1324 -56.8446 1320.29 34.1214 1538 70.4063C1814 116.407 2156 188.408 2560 86.315V232.317L0 232.316V86.3149Z;
          M0 53.6584C158 11.0001 213 0 363 0C513 0 855.555 115.001 1154 115.001C1440 115.001 1626 -38.0004 2560 53.6585V199.66L0 199.66V53.6584Z;
          M0 25.9086C277 84.5821 433 65.736 720 25.9086C934.818 -3.9019 1214.06 -5.23669 1442 8.06597C2079 45.2421 2208 63.5007 2560 25.9088V171.91L0 171.91V25.9086Z"></animate>
      </path>
    </svg>
  </div>
</section>

<!--page title end-->


<!--body content start-->

<div class="page-content">

<!--about start-->

<section>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 col-md-12">
        <img class="img-fluid" src="{{url('website/assets/images/about/03.png')}}" alt="">
      </div>
      <div class="col-lg-6 col-md-12 mt-6 mt-lg-0 ps-lg-10">
        <div class="theme-title mb-4">
          <h6>About Us</h6>
          <h2>We're Best In Software Development</h2>
        </div>
        <p class="mb-5">Scale your software operations through a custom engineering team. Meet the demand of your company’s operations with a high-performing nearshore team skilled in the technologies you need.</p>
      </div>
    </div>
  </div>
</section>

<!--about end-->




<!--feature start-->

<section class="position-relative">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6">
        <div class="featured-item style-1">
          <div class="featured-icon">
            <img class="img-fluid" src="{{url('website/assets/images/feature/01.png')}}" alt="">
          </div>
          <div class="featured-title">
            <h5>Digital Design</h5>
          </div>
          <div class="featured-desc">
            <p>See your authentic mission, and values come to life with a unique brand image.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mt-6">
        <div class="featured-item style-1">
          <div class="featured-icon">
            <img class="img-fluid" src="{{url('website/assets/images/feature/02.png')}}" alt="">
          </div>
          <div class="featured-title">
            <h5>New Brands</h5>
          </div>
          <div class="featured-desc">
            <p>See your authentic mission, and values come to life with a unique brand image.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mt-6 mt-lg-0">
        <div class="featured-item style-1">
          <div class="featured-icon">
            <img class="img-fluid" src="{{url('website/assets/images/feature/03.png')}}" alt="">
          </div>
          <div class="featured-title">
            <h5>User Experience</h5>
          </div>
          <div class="featured-desc">
            <p>See your authentic mission, and values come to life with a unique brand image.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mt-6">
        <div class="featured-item style-1">
          <div class="featured-icon">
            <img class="img-fluid" src="{{url('website/assets/images/feature/04.png')}}" alt="">
          </div>
          <div class="featured-title">
            <h5>Helping Support</h5>
          </div>
          <div class="featured-desc">
            <p>See your authentic mission, and values come to life with a unique brand image.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--feature end-->



</div>

<!--body content end--> 


@endsection