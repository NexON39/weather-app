@extends('layouts.weatherLayout')
@section('content')

<div class="container flex">
    

{{-- header --}}
    <div class="header-section flex py-3">
        <div class="text-header"><h1>Check weather in your city!</h1></div>
    </div>
{{-- end header --}}

{{-- form --}}
    <div class="form-section flex">
        <div class="form flex mx-5">
            <form action="" method="POST" class="flex">
                <input type="text" name="cityName">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </div>
{{-- end form --}}

{{-- weather card --}}
    <div class="weather-section flex py-2">

        <div class="card flex">

            <div class="city category flex">

                <div class="text-header"><h1>London</h1></div>

                <div class="info flex">
                    <p>State:</p>
                    <p>GB</p>
                </div>

                <div class="info flex">
                    <p>Longitude:</p>
                    <p>50</p>
                </div>

                <div class="info flex">
                    <p>Latitude:</p>
                    <p>80.4</p>
                </div>

            </div>
    

            <div class="general category flex">

                <div class="text-header"><h3>General</h3></div>

                <div class="info flex">
                    <p>Weather:</p>
                    <p>Clear</p>
                </div>

                <div class="info flex">
                    <p>Description:</p>
                    <p>Clear sky</p>
                </div>

                <div class="info img flex">
                    <img src="http://openweathermap.org/img/wn/10d@2x.png" alt="">
                </div>

            </div>

            <div class="temperature category flex">

                <div class="text-header"><h3>Temperature</h3></div>

                <div class="info flex">
                    <p>Temperature:</p>
                    <p>26 C</p>
                </div>

                <div class="info flex">
                    <p>Sensed temperature:</p>
                    <p>24 C</p>
                </div>

                <div class="info flex">
                    <p>Minimum temperature:</p>
                    <p>24 C</p>
                </div>

                <div class="info flex">
                    <p>Maximal temperature:</p>
                    <p>24 C</p>
                </div>

            </div>

            <div class="other category flex">

                <div class="text-header"><h3>Other</h3></div>

                <div class="info flex">
                    <p>Pressure temperature:</p>
                    <p>100 hPa</p>
                </div>

                <div class="info flex">
                    <p>Humidity:</p>
                    <p>50%</p>
                </div>

                <div class="info flex">
                    <p>Cloudy:</p>
                    <p>3%</p>
                </div>
                
                <div class="info flex">
                    <p>Wind speed:</p>
                    <p>50 m/s</p>
                </div>

                <div class="info flex">
                    <p>Wind direction:</p>
                    <p>90 deg</p>
                </div>

            </div>
            

        </div>

    </div>
{{-- end weather card --}}

</div>

{{-- footer --}}

    <div class="footer flex">
        <a href="https://kscode.pl" target="_blank">kscode.pl</a>
        <p>&copy; 2022 All Rights Reserved.</p>
    </div>

{{-- end footer --}}

@endsection