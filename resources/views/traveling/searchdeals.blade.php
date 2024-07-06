@extends('layouts.app')

@section('content')

<div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h4>Searched Results</h4>
          <h2>Amazing Prices &amp; More</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="search-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <form id="search-form" name="gs" method="POST" role="search" action="{{ route('traveling.deals.search') }}">
            @csrf
            <div class="row">
              <div class="col-lg-2">
                <h4>Sort Deals By:</h4>
              </div>
              <div class="col-lg-4">
                  <fieldset>
                      <select name="country_id" class="form-select" aria-label="Default select example" id="chooseLocation" onChange="this.form.click()">
                          <option selected>Destinations</option>
                          @foreach ($states as $state)
                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                          @endforeach
                          
                          
                          <option value="Thailand">Thailand</option>
                          <option value="Australia">Australia</option>
                          <option value="India">India</option>
                          <option value="Indonesia">Indonesia</option>
                          <option value="Malaysia">Malaysia</option>
                          <option value="Singapore">Singapore</option>
                      </select>
                  </fieldset>
              </div>
              <div class="col-lg-4">
                  <fieldset>
                      <select name="price" class="form-select" aria-label="Default select example" id="choosePrice" onChange="this.form.click()">
                          <option selected>Price</option>
                          <option value="100">$100 </option>
                          <option value="250">$250 </option>
                          <option value="500">$500</option>
                          <option value="1000">$1,000 - $2,500</option>
                          <option value="2500+">$2,500+</option>
                      </select>
                  </fieldset>
              </div>
              <div class="col-lg-2">                        
                  <fieldset>
                      <button type="submit" class="border-button">Search Results</button>
                  </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="amazing-deals">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading text-center">
            <h2>Best Weekly Offers In Each City</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
          </div>
        </div>
        @if ($searches->count() > 0)
            @foreach ($searches as $area)
            <div class="col-lg-6 col-sm-6">
            <div class="item">
                <div class="row">
                <div class="col-lg-6">
                    <div class="image">
                    <img src="{{ asset('assets/images/'.$area->image.'')}} " alt="">
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="content">
                    <span class="info">*Limited Offer Today</span>
                    <h4>{{$area->name}}</h4>
                    <div class="row">
                        <div class="col-6">
                        <i class="fa fa-clock"></i>
                        <span class="list">{{ $area->num_days }} Days</span>
                        </div>
                        <div class="col-6">
                        <i class="fa fa-map"></i>
                        <span class="list">Daily Places</span>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet dire consectetur adipiscing elit.</p>
                    <div class="main-button">
                        <a href="{{route('traveling.reservation', $area->id) }}">Make a Reservation</a>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            @endforeach
        @else
        
            <p class="alert alert-success">The search result currently unavailable</p>
        @endif

        
       
      </div>
    </div>
  </div>
@endsection