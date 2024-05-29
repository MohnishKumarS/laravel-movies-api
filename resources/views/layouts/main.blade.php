<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie APP</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css" rel="stylesheet" />
    {{-- links --}}
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- SWIPER JS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @stack('styles')
    @livewireStyles
</head>

<body>

    {{-- NAVBAR --}}
    @include('navbar')

    {{-- CONTENT --}}
    <main class="my-5 pb-5">
        @yield('content')
    </main>




    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"></script>



    @livewireScripts

    @stack('scripts')


    <script>
        // SWIPER 
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            autoplay: {
                    "delay": 3000
                  },
            direction: 'horizontal',
            loop: false,
            slidesPerView: 4,
    
            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
    
            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
    
            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
                draggable: true,
                clickable: true,
            },
            "breakpoints": {
                    "320": {
                      "slidesPerView": 1,
                      "slidesPerGroup": 1,
                      "spaceBetween": 14
                    },
                    "768": {
                      "slidesPerView": 2,
                      "slidesPerGroup": 3,
                      "spaceBetween": 24
                    },
                    "992": {
                      "slidesPerView": 4,
                      "slidesPerGroup": 1,
                      "spaceBetween": 30,
                      "pagination": false
                    }
                  }
        });
    </script>

</body>

</html>
