@extends('layouts.app')

@section('content')

<div class="about-main-content" style="margin-top: -25px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="content">
            <div class="blur-bg"></div>
            <h4>EXPLORE OUR STATE</h4>
            <div class="line-dec"></div>
            <h2>Welcome To {{ $state->name }}</h2>
            <p>{{ $state->description }}</p>
            <div class="main-button">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ***** Main Banner Area End ***** -->

  <div class="weekly-offers">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading text-center">
            <h2>Best Weekly Offers In Each State</h2>
            <p></p>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-weekly-offers owl-carousel">
            @foreach ($areas as $area)
                <div class="item">
                <div class="thumb">
                    <img src="{{ asset('assets/images/'.$area->image.'') }}" alt="">
                    <div class="text">
                    <h4>{{$area->name}}<br><span></span></h4>
                    <h6> RM{{$area->price}}<br><span>/person</span></h6>
                    <div class="line-dec"></div>
                    <ul>
                        <li>Deal Includes:</li>
                        <li><i class="fa fa-taxi"></i> {{$area->num_days}} Days Trip > Hotel Included</li>
                        <li><i class="fa fa-plane"></i> Facilites Included</li>
                        <li><i class="fa fa-building"></i> Daily Places Visit</li>
                    </ul>
                    <div class="main-button">
                        <a class="button" href="{{ route('traveling.reservation', $area->id) }}">Make a Reservation</a>
                    </div>
                    </div>
                </div>
                </div>
            @endforeach

            
            
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="more-about">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="left-image">
            <img src="{{ asset('assets/images/about-left-image.jfif') }}" alt="">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="section-heading">
            <h2>Discover More About Our Country</h2>
            <p>Malaysia is country that has total 13 states including Sabah and Sarawak</p>
          </div>
          <div class="row">
           
            <div class="col-lg-12">
              <div class="info-item">
                <div class="row">
                  <div class="col-lg-6">
                    <h4>{{ $areasCount }}+</h4>
                    <span>Homestay Places</span>
                  </div>
                  {{-- <div class="col-lg-6">
                    <h4>240.580+</h4>
                    <span>Different Check-ins Yearly</span>
                  </div> --}}
                </div>
              </div>
            </div>
          </div>
          <p>States in Malaysia: Pahang, Johor, Terengganu, Melaka, Negeri Sembilan, Selangor, Perlis, Pulau Pinang, Kelantan, Kedah, Perak, Sabah and Sarawak.</p>
          
        </div>
      </div>
    </div>
  </div>


@endsection