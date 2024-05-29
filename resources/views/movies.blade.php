@extends('layouts.main')

@section('content')
    <div class="">
        <section class="container my-5">
            <h4 class="text-warning mb-4"> POPULAR MOVIES</h4>
            <div>
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach ($popularMovie as $item)
                            <x-movie-swiper-card :movie="$item" :genres="$genres" />
                        @endforeach
                    </div>
                    <!-- If we need pagination -->
                   
                    <div class="scroll-swiper">
                        {{-- <div class="swiper-pagination"></div> --}}
                    <div class="swiper-scrollbar"></div>
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <section class="container my-5">
            <h4 class="text-warning mb-4"> TOP RATED MOVIES</h4>
        <div>
            <div class="swiper">
                <div class="swiper-wrapper">
                    @foreach ($topRatedMovie as $item)
                        <x-movie-swiper-card :movie="$item" :genres="$genres" />
                    @endforeach
                </div>
                <!-- If we need pagination -->
               
                <div class="scroll-swiper">
                    <div class="swiper-pagination"></div>
                {{-- <div class="swiper-scrollbar"></div> --}}
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section class="container my-5">
        <h4 class="text-warning mb-4"> NOW PLAYING</h4>
        <div>
            <div class="swiper">
                <div class="swiper-wrapper">
                    @foreach ($nowplayingMovie as $item)
                        <x-movie-swiper-card :movie="$item" :genres="$genres" />
                    @endforeach
                </div>
                <!-- If we need pagination -->
               
                <div class="scroll-swiper">
                    <div class="swiper-pagination"></div>
                {{-- <div class="swiper-scrollbar"></div> --}}
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section class="container my-5">
        <h4 class="text-warning mb-4"> UPCOMING MOVIES</h4>
        <div>
            <div class="swiper">
                <div class="swiper-wrapper">
                    @foreach ($upcomingMovie as $item)
                        <x-movie-swiper-card :movie="$item" :genres="$genres" />
                    @endforeach
                </div>
                <!-- If we need pagination -->
               
                <div class="scroll-swiper">
                    <div class="swiper-pagination"></div>
                {{-- <div class="swiper-scrollbar"></div> --}}
                </div>
            </div>
        </div>
    </section>
</div>


@endsection
