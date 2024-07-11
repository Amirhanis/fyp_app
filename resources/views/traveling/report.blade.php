@extends ('layouts.app')
@section('content')

<div class="reportrow">
<div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Homestay</h5>
                <p class="card-text">number of homestay: {{ $areasCount }}</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Reservations: {{ $reservationsCount }}</h5>
                <p class="card-text">Homestay Kinabatangan, Pekan: {{ $reservationOne }}</p>
                <p class="card-text">Raudhah Homestay, Pulai: {{ $reservationTwo }}</p>
                <p class="card-text">Homestay Primabayu, Kuantan: {{ $reservationThree }}</p>
                <p class="card-text">Adam Homestay, Skudai: {{ $reservationFour }}</p>
                <p class="card-text">Homestay Kinabatangan, Sungai: {{ $reservationFive }}</p>
                <p class="card-text">Zamzam Homestay: {{ $reservationSix }}</p>
            </div>
        </div>
    </div>
    <!--<div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">States</h5>
                <p class="card-text">number of states: </p>
            </div>
        </div>
    </div>-->
    
</div>

@endsection