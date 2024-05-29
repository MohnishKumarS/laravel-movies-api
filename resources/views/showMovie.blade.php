@extends('layouts.main')


@section('content')
    <section class="show-moviebg">
        <div class="shows container">
            <div class="row mb-5 pt-5">
                <div class="col-lg-5">
                    <div>
                        <img src="https://image.tmdb.org/t/p/w500/{{ $viewMovie['poster_path'] }}" class="img-fluid shadow"
                            alt="">
                    </div>
                </div>
                <div class="col-lg-7 mt-4 mt-lg-0">
                    <div>
                        <h2>{{ $viewMovie['title'] }}
                            ({{ Carbon\Carbon::parse($viewMovie['release_date'])->format('Y') }})</h2>
                        @php
                            echo $viewMovie['tagline'] ? "<p class=''>{$viewMovie['tagline']} </p>" : '';
                        @endphp
                        <p class="small"><i class="fa-solid fa-star text-warning"></i>
                            {{ floor($viewMovie['vote_average'] * 10) }}% |
                            {{ Carbon\Carbon::parse($viewMovie['release_date'])->format('M d, Y') }} |
                            @foreach ($viewMovie['genres'] as $item)
                                {{ $item['name'] . ',' }}
                            @endforeach
                        </p>
                        <h5 class="text-warning">Overview</h5>
                        <p class="text-secondary">{{ $viewMovie['overview'] }}</p>

                        <h5 class="text-warning">Features cast</h5>

                        <div class="row mt-3">
                            @foreach ($viewMovie['credits']['crew'] as $crew)
                                @if ($loop->index < 4)
                                    <div class="col-3">
                                        <h6 class="mb-0">{{ $crew['name'] }}</h6>
                                        <p class="text-low small">{{ $crew['job'] }}</p>
                                    </div>
                                @endif
                            @endforeach

                        </div>

                        {{-- videos --}}
                        <div x-data="{ isOpen = false }">
                            @if (count($viewMovie['videos']['results']) > 0)
                                <div class="mt-4 ">
                                    <button @click="isOpen=true" data-mdb-ripple-init data-mdb-modal-init
                                        data-mdb-target="#youtubeVideo" class="btn btn-warning w-25" target="_blank">
                                        <i class="fa-solid fa-play me-2"></i> Play Trailer</button>
                                    {{-- <a href="https://youtube.com/watch?v={{ $viewMovie['videos']['results'][0]['key'] }}"
                                        class="btn btn-warning w-25" target="_blank">
                                        <i class="fa-solid fa-play me-2"></i> Play Trailer</a> --}}
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="cast container my-5">
            <h4 class="text-warning mb-4">CAST</h4>
            <div class="row">
                @foreach ($viewMovie['credits']['cast'] as $cast)
                    @if ($loop->index < 8)
                        <div class="col-6 col-sm-4 col-md-2 mb-4">
                            <div>
                                <a href="{{route('actor.show',$cast['id'])}}">
                                    <img src="https://image.tmdb.org/t/p/w500/{{ $cast['profile_path'] }}"
                                    alt="{{ $cast['name'] }}" class="img-fluid">
                                </a>
                                <h6 class="mb-0 mt-2">{{ $cast['name'] }}</h6>
                                <p class="small text-low">{{ $cast['character'] }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
        <hr>

        <div class="movie-img container my-5" x-data="{ isOpen: false }">
            <h4 class="text-warning mb-4">IMAGE POSTERS</h4>
            <div class="row row-cols-2 row-cols-lg-4 mb-5">
                @foreach ($viewMovie['images']['posters'] as $imgs)
                    @if ($loop->index < 4)
                        <div class="col ">
                            <div>
                                <a @click.prevent = "
                                isOpen = true 
                                images = 'https://image.tmdb.org/t/p/w500/{{ $imgs['file_path'] }}'">
                                    <img src="https://image.tmdb.org/t/p/w500/{{ $imgs['file_path'] }}" class="img-fluid"
                                        alt="movie-poster">
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="row row-cols-2 row-cols-lg-4 mb-4">
                @foreach ($viewMovie['images']['backdrops'] as $imgs)
                    @if ($loop->index < 4)
                        <div class="col ">
                            <div>
                                <a @click.prevent = "
                                isOpen = true 
                                images='https://image.tmdb.org/t/p/w500/{{ $imgs['file_path'] }}'"  >
                                    <img src="https://image.tmdb.org/t/p/w500/{{ $imgs['file_path'] }}" class="img-fluid"
                                        alt="movie-poster">
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>

            <!-- Image Modal -->
            <div class="modal fade" :class="{ 'show': isOpen }" :style="{ display: isOpen ? 'block' : 'none' }"
                id="posterImage" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Movie Video</h5>
                            <button type="button" class="btn-close" @click="isOpen = false" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           <img :src="images" alt="poster">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- image model --}}
    <!-- Ensure that Alpine.js is properly initialized on a parent container -->
    {{-- <div x-data="{ isOpen: false }">
        <button @click="isOpen = true" class="btn btn-primary">Click</button>

        <!-- Image Modal -->
        <div class="modal fade" :class="{ 'show': isOpen }" :style="{ display: isOpen ? 'block' : 'none' }" id="movieImage"
            tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Movie Video</h5>
                        <button type="button" class="btn-close" @click="isOpen = false" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        hello
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!--video Modal -->
    <div class="modal fade" id="youtubeVideo" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Movie Video</h5>
                    <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="videoWrapper">
                        @if (count($viewMovie['videos']['results']) > 0)
                        <iframe width="560" height="315"
                        src="https://www.youtube.com/embed/{{ $viewMovie['videos']['results'][0]['key'] }}"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        @endif
                       

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


@push('styles')
    <style>
        /* .modal.show {
            display: block;
        }

        .modal-backdrop {
            display: none;
        } */

        .modal {
            --mdb-modal-width: 990px !important;
        }

        .videoWrapper {
            position: relative;
            padding-bottom: 56.25%;
            /* 16:9 */
            height: 0;
        }

        .videoWrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .show-moviebg {
            position: relative;
            background: url("https://image.tmdb.org/t/p/original/{{ $viewMovie['images']['backdrops'][4]['file_path'] }}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            max-height: 70vh;

            &:after {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(to left, rgba(0, 0, 0)15%, rgba(0, 0, 0, 0.325));
                z-index: 1;
            }

            & .shows{
                position: relative;
                z-index: 10;
            }
        }
    </style>
@endpush
