@extends('layouts.app')
@section('content')

<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Update Reservations Info</h5>
                <p>Curent Info</b></p>
            <form method="POST" action="{{ route('user.updatebookings', $bookings->id)}}" enctype="multipart/form-data">
                <!-- Email input -->
                 @csrf
                
                <div class="form-outline mb-4 mt-4">
                <fieldset>
                      <label for="chooseGuests" class="form-label"><p>Number Of Guests</p></label>
                      <select name="no_guests" class="form-select" aria-label="Default select example" id="chooseGuests" onChange="this.form.click()">
                          <option selected>ex. 3 or 4 or 5</option>
                          <option type="checkbox" name="option1" value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4+">4+</option>
                      </select>
                  </fieldset>
                </div>

                <div class="form-outline mb-4 mt-4"></div>
                <fieldset>
                  <label for="Number" class="form-label"><p>Check In Date</p></label>
                  <input type="date" name="check_in_date" class="date" required>
                  @if ($errors->has('check_in_date'))
                    <span class="text-danger">{{ $errors->first('check_in_date') }}</span>
                  @endif
                </fieldset>
                </div>

                @if ($errors->has('status'))
                    <p class="alert alert-danger">{{ $errors->first('status') }}</p>
                @endif

                <br>
              

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>

@endsection