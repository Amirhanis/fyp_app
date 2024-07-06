@extends('layouts.app')

@section('content')


<section id="section-1">
    <div class="content-slider">
      @foreach ($states as $state)

      <input type="radio" id="banner{{ $state->id }}" class="sec-1-input" name="banner" checked>
      @endforeach
      <div class="slider">

        @foreach ($states as $state)
        <div id="top-banner-{{ $state->id }}" class="banner" style="background-image: url('{{ asset('assets/images/'.$state->image.'') }}')">
          <div class="banner-inner-wrapper header-text">
            <div class="main-caption">
              <h2 style="color:#BBB6B5;">Take a Look Into The Beautiful State Of:</h2>
              <h1 style="color:#BBB6B5;">{{ $state->name }}</h1>
              <div class="border-button"><a href="{{ route('traveling.about', $state->id) }}">Go There</a></div>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="more-info">
                    <div class="row">
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="fa fa-user"></i>
                        <h4><span>Population:</span><br>{{ $state->population }}</h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="fa fa-globe"></i>
                        <h4><span>Territory:</span><br>{{ $state->territory }}<em>2</em></h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="fa fa-home"></i>
                        <h4><span>AVG Price:</span><br>RM{{ $state->avg_price }}</h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <div class="main-button">
                          <a class="button" href="{{ route('traveling.about', $state->id) }}">Explore More</a>
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
      <nav>
        <div class="controls">
          @foreach ($states as $state)

          <label for="banner{{ $state->id }}"><span class="progressbar"><span class="progressbar-fill"></span></span><span class="text">{{ $state->id }}</span></label>
          @endforeach
        </div>
      </nav>
    </div>
  </section>
  <!-- ***** Main Banner Area End ***** -->
  
  <div class="visit-country">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="section-heading">
            <h2>Visit One Of Our States Now</h2>
            <p></p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8">
          <div class="items">
            <div class="row">
              @foreach ($states as $state)
                <div class="col-lg-12">
                  <div class="item">
                    <div class="row">
                      <div class="col-lg-4 col-sm-5">
                        <div class="image">
                          <img src="{{ asset('assets/images/'.$state->image.'') }}" alt="">
                        </div>
                      </div>
                      <div class="col-lg-8 col-sm-7">
                        <div class="right-content">
                          <h4>{{ $state->name }}</h4>
                          <span>{{ $state->continent }}</span>
                          <div class="main-button">
                            <a class="button" href="{{ route('traveling.about', $state->id) }}">Explore More</a>
                          </div>
                          <p>
                            {{ $state->description }}
                          </p>
                          <ul class="info">
                            <li><i class="fa fa-user"></i> {{ $state->population}}</li>
                            <li><i class="fa fa-globe"></i> {{ $state->territory}}41.290 km2</li>
                            <li><i class="fa fa-home"></i> ${{ $state->avg_price}}</li>
                          </ul>
                          <div class="text-button">
                            <a href="about.html">Need Directions ? <i class="fa fa-arrow-right"></i></a>
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
        <div class="col-lg-4">
          <div class="side-bar-map">
            <div class="row">
              <div class="col-lg-12">
                <div id="map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d498.1836142380327!2d101.6868558292299!3d3.1390039999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc498d8f1d8d5d%3A0x2b6b8f8f6f6f6f6f!2sMalaysia!5e0!3m2!1sen!2smy!4v1642870120000!5m2!1sen!2smy" width="100%" height="550px" frameborder="0" style="border:0; border-radius: 23px; " allowfullscreen=""></iframe>
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

@endsection
