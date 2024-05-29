@extends('layouts.main')

@section('content')
    <div class="">
        <section class="container my-5">
            <h4 class="text-warning mb-4"> POPULAR ACTOR</h4>
            <div class="row row-cols-2  row-cols-md-3 row-cols-xl-5 g-4">
              @foreach ($actors as $cast)
              <div class="col actor">
                <div>
                    <a href="{{route('actor.show',$cast['id'])}}">
                      <img src="{{ $cast['profile_path'] }}"
                        alt="{{ $cast['name'] }}" class="img-fluid">
                    </a>
                    <h6 class="mb-0 mt-2">{{ $cast['name'] }}</h6>
                    <p class="small text-low mb-1">{{ $cast['known_for_department'] }}</p>               
                    <p class="small text-low text-truncate">{{ $cast['known_for'] }}</p>
                   
                </div>
            </div>
              @endforeach

            </div>
            
              {{-- navigation --}}
              {{-- <div class="text-center">
                <div class="btn-group shadow-0 mt-4" role="group" aria-label="Basic example">
                    <a href="{{url('person/page/'.$previous)}}" class="btn btn-outline-secondary" data-mdb-color="dark"  data-mdb-ripple-init>Prev</a>
                    <a href="{{url('person/page/'.$next)}}" class="btn btn-outline-secondary" data-mdb-color="dark"  data-mdb-ripple-init>Next</a>
                  </div>
              </div> --}}

              <div class="page-load-status my-5 text-center d-flex justify-content-center">
                <p class="">
                    <div class="spinner-border infinite-scroll-request" role="status ">
                        <span class="visually-hidden">Loading...</span>
                      </div>
                </p>
                <p class="infinite-scroll-last">End of content</p>
                <p class="infinite-scroll-error">No more pages to load</p>
              </div>
             
        </section>
        <hr>
    </div>
@endsection

@push('scripts')
<script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>
    <script>
       let elem = document.querySelector('.row');
       console.log(elem);
let infScroll = new InfiniteScroll( elem, {
  // options
  path: '/person/page/@{{#}}',
  append: '.actor',
  status: '.page-load-status'
});

    </script>
@endpush
