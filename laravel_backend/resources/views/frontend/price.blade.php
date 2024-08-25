@extends('layouts.website')
@section('content')  
   
<!--page title start-->

<section class="page-title">
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-lg-8 col-md-12">
        <h1>
          <span>Price</span> Table
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
            <li class="breadcrumb-item active" aria-current="page">Price Table</li>
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

<!--pricing start-->

<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-12">
        <div class="theme-title">
          <h6>Pricing Plan</h6>
          <h2>Choose affordable prices</h2>
        </div>
      </div>
    </div>
    <div class="row align-items-center">
      <div class="col-lg-4 col-md-12">
        <div class="price-table">
          <div class="price-header">
            <div>
              <h3 class="price-title">Basic</h3>
              <div class="price-value">
                <h2>
                  <sup>$</sup>34
                </h2>
                <span>/Month</span>
              </div>
            </div>
            <div class="price-icon">
              <img class="img-fluid" src="{{url('website/assets/images/price-icon/01.png')}}" alt="">
            </div>
          </div>
          <p>Our plans come with a 100% free 14 day trial. No credit card needed.</p>
          <div class="price-list">
            <ul class="list-unstyled">
              <li>
                <i class="bi bi-check-lg"></i>50 Gb Bandwidth
              </li>
              <li>
                <i class="bi bi-check-lg"></i>Unlimited Site licenses
              </li>
              <li>
                <i class="bi bi-check-lg"></i>10 Free Optimization
              </li>
              <li>
                <i class="bi bi-check-lg"></i>24/7 Hours Support
              </li>
            </ul>
          </div>
          <a class="themeht-btn mt-5" href="#">Purchase Now</a>
        </div>
      </div>
      <div class="col-lg-4 col-md-12 mt-6 mt-lg-0">
        <div class="price-table">
          <div class="price-header">
            <div>
              <h3 class="price-title">Standard</h3>
              <div class="price-value">
                <h2>
                  <sup>$</sup>49
                </h2>
                <span>/Month</span>
              </div>
            </div>
            <div class="price-icon">
              <img class="img-fluid" src="{{url('website/assets/images/price-icon/02.png')}}" alt="">
            </div>
          </div>
          <p>Our plans come with a 100% free 14 day trial. No credit card needed.</p>
          <div class="price-list">
            <ul class="list-unstyled">
              <li>
                <i class="bi bi-check-lg"></i>50 Gb Bandwidth
              </li>
              <li>
                <i class="bi bi-check-lg"></i>Unlimited Site licenses
              </li>
              <li>
                <i class="bi bi-check-lg"></i>10 Free Optimization
              </li>
              <li>
                <i class="bi bi-check-lg"></i>24/7 Hours Support
              </li>
            </ul>
          </div>
          <a class="themeht-btn mt-5" href="#">Purchase Now</a>
        </div>
      </div>
      <div class="col-lg-4 col-md-12 mt-6 mt-lg-0">
        <div class="price-table">
          <div class="price-header">
            <div>
              <h3 class="price-title">Premium</h3>
              <div class="price-value">
                <h2>
                  <sup>$</sup>59
                </h2>
                <span>/Month</span>
              </div>
            </div>
            <div class="price-icon">
              <img class="img-fluid" src="{{url('website/assets/images/price-icon/03.png')}}" alt="">
            </div>
          </div>
          <p>Our plans come with a 100% free 14 day trial. No credit card needed.</p>
          <div class="price-list">
            <ul class="list-unstyled">
              <li>
                <i class="bi bi-check-lg"></i>50 Gb Bandwidth
              </li>
              <li>
                <i class="bi bi-check-lg"></i>Unlimited Site licenses
              </li>
              <li>
                <i class="bi bi-check-lg"></i>10 Free Optimization
              </li>
              <li>
                <i class="bi bi-check-lg"></i>24/7 Hours Support
              </li>
            </ul>
          </div>
          <a class="themeht-btn mt-5" href="#">Purchase Now</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!--pricing end-->

</div>

<!--body content end--> 


@endsection