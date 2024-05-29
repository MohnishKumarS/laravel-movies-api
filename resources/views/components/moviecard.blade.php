<div class="col">
    <div class="card h-100">
        <a href="{{url('movies/'.$movie['id'])}}">
            <img src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}" class="card-img-top"
            alt="Hollywood Sign on The Hill" />
        </a>
        <div class="card-body ">
            <h5 class="card-title ">{{ $movie['title'] }}</h5>
            <p class="card-text mb-0 small">
                <i class="fa-solid fa-star text-warning"></i> {{ floor($movie['vote_average'] * 10) }}% |
                {{ Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}
            </p>
            <p class="card-text small">
                @php
                    $gen = array_map(function ($id) use ($genres) {
                        return isset($genres[$id]) ? $genres[$id] : '';
                        // return $genres['12'];
                    }, $movie['genre_ids']);
                    echo implode(', ', $gen);
                @endphp

            </p>
        </div>
    </div>
</div>

