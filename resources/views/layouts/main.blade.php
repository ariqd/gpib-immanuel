<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GPIB Immanuel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <style>
        /* Set the size of the div element that contains the map */
        #map {
            height: 200px;
            /* The height is 400 pixels */
            width: 100%;
            /* The width is the width of the web page */
        }

        .btn.btn-primary {
            background-color: #34647A;
            border-color: #34647A;
        }

        .list-group-item.active {
            background-color: #34647A;
            border-color: #34647A;
        }
    </style>
</head>

<body>
    @include('components.navbar')

    @if (session('success'))
        <div class="alert alert-success">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <body class="d-flex flex-column min-vh-100">
        @yield('content')
    </body>

    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJgZ1TH8lF_npi8P8WXYEfPxPsy48B_U4&callback=initMap&v=weekly"
        defer></script>
    <script>
        // Initialize and add the map
        function initMap() {
            // The location of Uluru
            const uluru = {
                lat: -25.344,
                lng: 131.031
            };
            // The map, centered at Uluru
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 4,
                center: uluru,
            });
            // The marker, positioned at Uluru
            const marker = new google.maps.Marker({
                position: uluru,
                map: map,
            });
        }
        window.initMap = initMap;
    </script>
</body>

</html>
