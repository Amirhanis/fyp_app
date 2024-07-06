@extends('layouts.app')

@section('content')




  <div class="reservation-form">
    <div class="container">
      <div class="row">
       
        <div class="col-lg-12">
          <form id="reservation-form" name="gs" method="POST" role="search" action="{{ route('traveling.reservation.store', $area->id) }}">
            @csrf
            <div class="row">
              <div class="col-lg-12">
                <h4>Make Your <em>Reservation</em> Through This <em>Form</em></h4>
              </div>
              <div class="col-lg-12">
                  <fieldset>
                      <label for="chooseDestination" class="form-label">User id: </label><em>{{ Auth::user()->id }}</em>
                      <input type="hidden" value="{{ Auth::user()->id}}" name="user_id" class="Name"required>

                  </fieldset>
              </div>
              <div class="col-lg-12">

                @if(isset(Auth::user()->id))
                  <fieldset>
                      <label for="chooseDestination" class="form-label">Your Destination: </label><em>{{ $area->name }}</em>
                      <input type="hidden" value="{{ $area->name }}" name="destination" class="Name"required>
                  </fieldset>
                  @endif
              </div>
              <div class="col-lg-6">
                  <fieldset>
                      <label for="Name" class="form-label">Your Name</label>
                      <input type="text" name="name" class="Name" placeholder="Ex. John Smithee" autocomplete="on" required>
                  </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                    <label for="Number" class="form-label">Your Phone Number</label>
                    <input type="text" name="phone_no" class="Number" placeholder="Ex. +xxx xxx xxx" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-6">
                  <fieldset>
                      <label for="chooseGuests" class="form-label">Number Of Guests</label>
                      <select name="no_guests" class="form-select" aria-label="Default select example" id="chooseGuests" onChange="this.form.click()">
                          <option selected>ex. 3 or 4 or 5</option>
                          <option type="checkbox" name="option1" value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4+">4+</option>
                      </select>
                  </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                    <label for="Number" class="form-label">Check In Date</label>
                    <input type="date" name="check_in_date" class="date" required>
                </fieldset>
              </div>
              
              <div class="col-lg-12">                        
                  <fieldset>
                    @if(isset(Auth::user()->id))
                      <button type="submit" class="button">Continue Book</button>
                    @else
                      <p class="alert alert-success">You need to login to make a reservation</p>
                    @endif
                  </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="second-page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2>Any Inquiries</h2>
          
          <div class="main-button"><a href="about.html">Discover More</a></div>
        </div>
      </div>
    </div>
  </div>

  <div class="more-info reservation-info">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-phone"></i>
            <h4>Make a Phone Call</h4>
            <a href="#">+6011 3707 3948</a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-envelope"></i>
            <h4>Contact Us via Email</h4>
            <a href="#">amirhanis@graduate.utm.my</a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-map-marker"></i>
            <h4>Visit My Linkedin</h4>
            <a href="#">@amirhanis</a>
          </div>
        </div>
      </div>
    </div>
  </div>  

  @endsection