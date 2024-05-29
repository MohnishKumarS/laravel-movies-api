@extends('layouts.main')


@section('content')
    <section class="show-moviebg">
        <div class="shows container">
            <div class="row mb-5 pt-5">
                <div class="col-lg-5">
                    <div>
                        <img src="{{$actor['profile_path']}}" class="img-fluid shadow"
                            alt="">
                    </div>
                </div>
                <div class="col-lg-7 mt-4 mt-lg-0">
                    <div>
                        <h2>{{$actor['name']}}</h2>
                          <p><i class="fa-solid fa-cake-candles"></i> {{$actor['birthday']}} ({{$actor['age']}}) in {{$actor['place_of_birth']}}</p>
                        <h6 class="text-warning">Biography</h6>
                        <p class="text-secondary">{{$actor['biography']}}</p>

                        <h6 class="text-warning">Connect</h6>
                        <div class="mb-3">
                            @if ($social['facebook'])
                                <span>
                                    <a href="{{$social['facebook']}}" target="_blank" class="text-light"><i class="fa-brands fa-facebook fs-2"></i></a>
                                </span>
                            @endif
                            @if ($social['twitter'])
                                <span class="ps-3">
                                    <a href="{{$social['twitter']}}" target="_blank" class="text-light"><i class="fa-brands fa-twitter fs-2"></i></a>
                                </span>
                            @endif
                            @if ($social['instagram'])
                                <span class="ps-3">
                                    <a href="{{$social['instagram']}}" target="_blank" class="text-light"><i class="fa-brands fa-instagram fs-2"></i></a>
                                </span>
                            @endif
                            @if ($social['wiki'])
                                <span class="ps-3">
                                    <a href="{{$social['wiki']}}" target="_blank" class="text-light"><i class="fa-brands fa-wikipedia-w fs-2"></i></a>
                                </span>
                            @endif
                        </div>

                        <h6 class="text-warning">Known For</h6>

                        <div class="row mt-3">
                      
                            @foreach ($movies as $mo)
                            <div class="col-2">
                             <a href="{{url('movies/'.$mo['id'])}}">
                              <img src="{{$mo['poster_path']}}" class="img-fluid" alt="{{$mo['title']}}">
                             </a>
                                <p class="text-low small">{{$mo['title']}}</p>
                            </div>
                            @endforeach

                        </div>

              

                    </div>
                </div>
            </div>
        </div>
        <hr>

        <div class="credits container">
          <ul>
            @foreach ($credits as $item)
                <li>{{$item['release_year'] . ' - '. $item['title'] }} <span class="text-low small">as {{ $item['character']}}</span></li>
            @endforeach
          </ul>
        </div>
      
     
        </div>
   

    
    </section>


@endsection


