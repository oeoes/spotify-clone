@extends('app.layouts.parent')

@section('data-page', 'playlist')

@section('app-content')

<div class="app__header sp__bot--left">
    <div class="playlist__sticky--header-container">
        <div class="playlist__sticky--content hide__element--translate">
            <div class="row">
                <div class="col-9 sp__top--left">
                    <img class="playlist__thumbnail--img" src="{{ $playlist->cover }}" alt="">
                    <div class="size--4 fw--600 mx-3">
                        {{ $playlist->title }}
                    </div>
                </div>
                <div class="col-3 sp__mid--right">
                    <div class="sp--btn sp--btn-green sp--radius me-2 px-5">PLAY</div>
                    @if ($playlist->user_id !== auth()->user()->id)
                    <div class="sp--btn sp--btn-transparent sp--radius me-2"><i class="sp-love"></i></div>
                    @endif
                    <div class="sp__dropdown">
                        <div class="sp--btn sp--btn-transparent sp--radius me-2" data-toggle="dropdown"><i class="sp-ellipsis-h"></i></div>
                        <span class="sp__dropdown--content hide__element">
                            <a href="">Go to Playlist Radio</a>
                            <div class="sp__divider"></div>
                            <a href="">Remove from your Library</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="playlist__header--container sp__column--bot">

        <div class="row g-3 mx-45">
            <div class="col-3">
                <img class="img__responsive" src="{{ $playlist->cover }}" alt="">
            </div>
            <div class="col-9 sp__column--bot">
                <div class="playlist__detail">
                    <div class="size--2 fw--200 color--white ls--1">PLAYLIST</div>
                    <div class="size--5 fw--700 color--white">{{ $playlist->title }}</div>
                    <p class="size--2 fw--300 color--grey">
                        {{ $playlist->description }}
                    </p>
                    <p class="size--2 fw--300 color--grey">Created by <a href="" class="custom__link">{{ $playlist->user->name }}</a> ・ {{ count($playlist->songs) }} songs, 4 hr 32 min</p>
                    <div class="sp__between">
                        <div class="sp__top--left">
                            <div class="sp--btn sp--btn-green sp--radius me-2 px-5">PLAY</div>
                            @if ($playlist->user_id !== auth()->user()->id)
                            <div class="sp--btn sp--btn-transparent sp--radius me-2"><i class="sp-love"></i></div>
                            @endif
                            <div class="sp__dropdown">
                                <div class="sp--btn sp--btn-transparent sp--radius me-2" data-toggle="dropdown"><i class="sp-ellipsis-h"></i></div>
                                <span class="sp__dropdown--content hide__element">
                                    <a href="">Go to Playlist Radio</a>
                                    <div class="sp__divider"></div>
                                    <a href="">Remove from your Library</a>
                                </span>
                            </div>
                        </div>
                        <div>
                            <div class="size--2 fw--200 color--grey ls--1 text-right">FOLLOWERS</div>
                            <div class="size--2 fw--200 color--grey ls--1 text-right">372,28</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- List of songs -->
<div class="song__list--container">
    <div class="row mx-45 sp__table sp__bot--bordered sp__hovered">
        <div class="row sp__tr">
            <div class="col-1 sp__th"></div>
            <div class="col-1 sp__th"></div>
            <div class="col-3 sp__th">TITLE</div>
            <div class="col-3 sp__th">ARTIST</div>
            <div class="col-2 sp__th">ALBUM</div>
            <div class="col-1 sp__th"><i class="sp-calendar size--3"></i></div>
            <div class="col-1 sp__th"></div>
        </div>
        @forelse($playlist->songs as $song)
        <div class="row sp__tr">
            <div class="col-1 sp__td"><i class="sp-play-circle size--4"></i></div>
            @if (in_array($song->id, $liked_songs))
            <div class="col-1 sp__td"><span class="box__btn--love" data-type="song" data-id="{{ $song->id }}"><i class="sp-love-fill"></i></span></div>
            @else
            <div class="col-1 sp__td"><span class="box__btn--love" data-type="song" data-id="{{ $song->id }}"><i class="sp-love"></i></span></div>
            @endif
            <div class="col-3 sp__td">{{ $song->title }}</div>
            <div class="col-3 sp__td">
                @foreach($song->singers as $key => $singer)
                @if (count($song->singers) === 1)
                <a href="{{ route('app.artists.view', ['artist' => $singer->id]) }}" class="custom__link">{{$singer->full_name}}</a>
                @elseif ($key === count($song->singers)-1)
                <a href="{{ route('app.artists.view', ['artist' => $singer->id]) }}" class="custom__link">{{$singer->full_name}}. </a>
                @else
                <a href="{{ route('app.artists.view', ['artist' => $singer->id]) }}" class="custom__link">{{$singer->full_name}}, </a>
                @endif
                @endforeach
            </div>
            <div class="col-2 sp__td"><a href="{{ route('app.albums.view', ['album' => $song->collection->id]) }}" class="custom__link">{{ $song->collection->title }}</a></div>
            <div class="col-1 sp__td">2020-11-02</div>
            <div class="col-1 sp__td sp__mid--right">
                <div class="sp__dropdown">
                    <div data-toggle="dropdown"><i class="sp-ellipsis-h"></i></div>
                    <span class="sp__dropdown--content hide__element">
                        <a href="">Add to Queue</a>
                        <a href="">Go to Song Radio</a>
                        <div class="sp__divider"></div>
                        <!-- <a href="">Go to Artist</a> -->
                        @if (count($song->singers) > 1)
                        <span class="sp__sub--dropdown">
                            <a href="#">
                                <div class="row">
                                    <div class="col-10">Go To Artist</div>
                                    <div class="col-2 sp__mid--left"><i class="sp-right"></i></div>
                                </div>
                            </a>
                            <div class="sp__sub--dropdown--content">
                                @foreach($song->singers as $artist)
                                <a href="{{ route('app.artists.view', ['artist' => $artist->id]) }}">{{ $artist->full_name }}</a>
                                @endforeach
                            </div>
                        </span>
                        @else
                        <a href="{{ route('app.artists.view', ['artist' => $song->singers[0]->id]) }}">Go to Artist</a>
                        @endif
                        <a href="{{ route('app.albums.view', ['album' => $song->collection->id]) }}">Go to Album</a>
                        <div class="sp__divider"></div>
                        <a href="">Add to your Liked Song</a>
                        <span class="sp__sub--dropdown">
                            <a href="">
                                <div class="row">
                                    <div class="col-10">Add to Playlist</div>
                                    <div class="col-2 sp__mid--left"><i class="sp-right"></i></div>
                                </div>
                            </a>
                            <div class="sp__sub--dropdown--content">
                                <a href="">New Playlist</a>
                                <div class="sp__divider"></div>
                                <a href="">My Playlist#01</a>
                            </div>
                        </span>
                        <div class="sp__divider"></div>
                        <a href="javascript:void(0)">Remove from this Playlist</a>
                    </span>
                </div>
            </div>
        </div>
        @empty
        <div class="row sp__tr">
            <div class="col-12 sp__td">
                <div class="no__data size--4 color--grey sp__mid--center">
                    Playlist is empty.
                </div>
            </div>
        </div>
        @endforelse
    </div>
</div>

@endsection