<div class="position-relative" x-data="{isOpen:true}" @click.away="isOpen=false">
    <form class="d-flex input-group">
        <input wire:model.live='search' @focus="isOpen=true" @keydown.escape.window="isOpen=false" type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
            aria-describedby="search-addon" />
        <span class="input-group-text border-0" id="search-addon">
            <i class="fas fa-search"></i>
        </span>
    </form>
    @if (strlen($search) > 1)
        <div class="search-drop" x-show="isOpen">
            <ul class="">
                @if (count($searchResults) > 0)
                @foreach ($searchResults as $item)
                @if ($loop->index < 6)
                    <li>
                        <a class="dropdown-item" href="{{ url('movies/' . $item['id']) }}">
                         <img src="https://image.tmdb.org/t/p/w500/{{ $item['poster_path'] }}" width="30" height="30" class="me-2" alt=" {{ $item['title'] }}">   {{ $item['title'] }}
                        </a>
                    </li>
                @endif
            @endforeach
                @else
                <li>
                    <a class="dropdown-item" >No Results for '{{ $search }}'</a>
                </li>
                @endif
             


            </ul>
        </div>
    @endif


    <style>
        .search-drop {
            position: absolute;
            width: 100%;
            z-index: 100;

        }

        .search-drop ul {
            background: rgb(90, 90, 90);
            list-style: none;
            padding: 0;
        }

        .search-drop ul li a {
            text-wrap: wrap;
            padding: 10px 10px;
            border-bottom: 1px solid grey
        }
    </style>
</div>
