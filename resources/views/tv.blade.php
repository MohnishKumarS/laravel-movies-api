@extends('layouts.main')

@section('content')
    <div class="">
        <section class="container my-5">
            <h4 class="text-warning mb-4"> POPULAR SHOWS</h4>
            <div class="row row-cols-2  row-cols-md-3 row-cols-xl-5 g-4">
                @foreach ($popularShow as $show)
                    @if ($loop->index < 5)
                        <x-tvcard :show="$show" :genres="$genres" />
                    @endif
                @endforeach
            </div>
        </section>
        <hr>
        <section class="container my-5">
          <h4 class="text-warning mb-4"> TOP RATED SHOWS</h4>
          <div class="row row-cols-2  row-cols-md-3 row-cols-xl-5 g-4">
              @foreach ($topRatedShow as $show)
                  @if ($loop->index < 5)
                      <x-tvcard :show="$show" :genres="$genres" />
                  @endif
              @endforeach
          </div>
      </section>
        <hr>
        <section class="container my-5">
          <h4 class="text-warning mb-4"> UPCOMING SHOWS</h4>
          <div class="row row-cols-2  row-cols-md-3 row-cols-xl-5 g-4">
              @foreach ($upcomingShow as $show)
                  @if ($loop->index < 5)
                      <x-tvcard :show="$show" :genres="$genres" />
                  @endif
              @endforeach
          </div>
      </section>

    </div>
@endsection
