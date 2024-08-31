@extends('layouts.admin')
@section('content')

<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Add Homestay</h5>
          <form method="POST" action="{{ route('create.states') }}" enctype="multipart/form-data">
                <!-- Email input -->
                 @csrf
                <div class="form-outline mb-4 mt-4">
                  <label>Homestay Name:</label>
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                  <label>Homestay Image:</label>
                  <input type="file" name="image" id="form2Example1" class="form-control" />
                 
                </div>  
                <div class="form-outline mb-4 mt-4">
                  <label>Homestay Price:</label>
                  <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price" />
                 
                </div> 
                 <div class="form-outline mb-4 mt-4">
                  <input type="text" name="num_days" id="form2Example1" class="form-control" placeholder="num_days" />
                 
                </div>  <div class="form-outline mb-4 mt-4">
                  <label>State Id(1-Pahang, 2-Johor, 3-Selangor, 4-Kuala Lumpur):</label>
                  <input type="text" name="country_id" id="form2Example1" class="form-control" placeholder="country_id" />
                 
                </div> 
                <!--<div class="form-floating">
                  <textarea name="description" class="form-control" placeholder="description" id="floatingTextarea2" style="height: 100px"></textarea>
                </div>-->
                <br>
      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>

@endsection