@extends('layouts.weatherLayout')
@section('content')

<div class="container flex">
    

{{-- header --}}
    <div class="header-section flex py-1">
        <div class="text-header"><h1>Weather app</h1></div>
        <div class="text-header"><p>Check weather in your city!</p></div>
    </div>
{{-- end header --}}

{{-- form --}}
    <div class="form-section flex">
        <div class="form flex mx-1">
            <form action="" method="POST" class="flex">
                @csrf
                <input type="text" name="cityName">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </div>
{{-- end form --}}

{{-- weather card --}}
    <div class="weather-section flex py-2">

        @if (isset($alert))

            <div class="text-header"><h1>{{ $alert }}</h1></div>
            
        @elseif(isset($status))

        <div class="card flex">

            <div class="city category flex">

                <div class="text-header"><h1>{{ $name }}</h1></div>

                <div class="info flex">
                    <p><i class="fa-solid fa-flag"></i> State:</p>
                    <p>{{ $state }}</p>
                </div>

                <div class="info flex">
                    <p><i class="fa-solid fa-up-long"></i> Longitude:</p>
                    <p>{{ $lon }}</p>
                </div>

                <div class="info flex">
                    <p><i class="fa-solid fa-right-long"></i> Latitude:</p>
                    <p>{{ $lat }}</p>
                </div>

            </div>
    

            <div class="general category flex">

                <div class="text-header"><h3>General</h3></div>

                <div class="info flex">
                    <p><i class="fa-solid fa-sun"></i> Weather:</p>
                    <p>{{ $weather }}</p>
                </div>

                <div class="info flex">
                    <p><i class="fa-solid fa-comment"></i> Description:</p>
                    <p>{{ $description }}</p>
                </div>

                <div class="info img flex">
                    <img src="http://openweathermap.org/img/wn/{{ $icon }}@2x.png" alt="">
                </div>

            </div>

            <div class="temperature category flex">

                <div class="text-header"><h3>Temperature</h3></div>

                <div class="info flex">
                    <p><i class="fa-solid fa-thermometer"></i> Temperature:</p>
                    <p>{{ $temp }} &#8451;</p>
                </div>

                <div class="info flex">
                    <p><i class="fa-solid fa-temperature-three-quarters"></i> Sensed temperature:</p>
                    <p>{{ $feels_like }} &#8451;</p>
                </div>

                <div class="info flex">
                    <p><i class="fa-solid fa-temperature-arrow-down"></i> Minimum temperature:</p>
                    <p>{{ $temp_min }} &#8451;</p>
                </div>

                <div class="info flex">
                    <p><i class="fa-solid fa-temperature-arrow-up"></i> Maximal temperature:</p>
                    <p>{{ $temp_max }} &#8451;</p>
                </div>

            </div>

            <div class="other category flex">

                <div class="text-header"><h3>Other</h3></div>

                <div class="info flex">
                    <p><i class="fa-solid fa-arrow-trend-up"></i> Air pressure:</p>
                    <p>{{ $pressure }} hPa</p>
                </div>

                <div class="info flex">
                    <p><i class="fa-solid fa-droplet"></i> Humidity:</p>
                    <p>{{ $humidity }}%</p>
                </div>

                <div class="info flex">
                    <p><i class="fa-solid fa-cloud"></i> Cloudy:</p>
                    <p>{{ $cloudy }}%</p>
                </div>
                
                <div class="info flex">
                    <p><i class="fa-solid fa-wind"></i> Wind speed:</p>
                    <p>{{ $speed }} m/s</p>
                </div>

                <div class="info flex">
                    <p><i class="fa-solid fa-compass"></i> Wind direction:</p>
                    <p>{{ $deg }}&#176;</p>
                </div>

            </div>
            

        </div>
        @else
        @endif

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