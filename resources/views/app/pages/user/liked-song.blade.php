@extends('app.layouts.parent')

@section('app-content')

<div class="app__header sp__column--bot">
    <div class="header__title size--5 fw--700 color--white sp__bot--left my-3">Liked Songs</div>
    <div class="px-45">
        <div class="sp--btn sp--btn-green sp--radius me-2 px-5">PLAY</div>
    </div>
    <div class="header__title--sticky size--4 fw--700 color--white sp__column--bot opacity__0">
        <div class="title__sticky--text hide__element--translate sp__between mb-3">
            <div>Liked Songs</div>
            <div class="sp--btn sp--btn-green sp--radius me-2 px-5">PLAY</div>
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
            <div class="col-2 sp__th"><i class="sp-calendar size--3"></i></div>
            <div class="col-1 sp__th"></div>
        </div>
        @forelse ($liked_songs as $song)
        @php
        $current_song = $song->model::find($song->model_id);
        @endphp

        <div class="row sp__tr">
            <div class="col-1 sp__td">
                <span class="audio__control" data-url="{{ route('app.audio.song', ['song' => $current_song->id]) }}">
                    <i class="sp-play-circle size--4"></i>
                </span>
            </div>
            <div class="col-1 sp__td"><span class="box__btn--love" data-type="song" data-id="{{ $current_song->id }}"><i class="sp-love-fill"></i></span></div>
            <div class="col-3 sp__td">{{ $current_song->title }}</div>
            <div class="col-3 sp__td">

                @foreach($current_song->singers as $key => $singer)
                @if (count($current_song->singers) === 1)
                <a href="{{ route('app.artists.view', ['artist' => $singer->id]) }}" class="custom__link">{{$singer->full_name}}</a>
                @elseif ($key === count($current_song->singers)-1)
                <a href="{{ route('app.artists.view', ['artist' => $singer->id]) }}" class="custom__link">{{$singer->full_name}}. </a>
                @else
                <a href="{{ route('app.artists.view', ['artist' => $singer->id]) }}" class="custom__link">{{$singer->full_name}}, </a>
                @endif
                @endforeach
            </div>
            <div class="col-2 sp__td"><a href="{{ route('app.albums.view', ['album' => $current_song->collection->id]) }}" class="custom__link">{{ $current_song->collection->title }}</a></div>
            <div class="col-1 sp__td">2020-11-02</div>
            <div class="col-1 sp__td sp__mid--right">
                <div class="sp__dropdown">
                    <div data-toggle="dropdown"><i class="sp-ellipsis-h"></i></div>
                    <span class="sp__dropdown--content hide__element">
                        <a href="">Add to Queue</a>
                        <a href="">Go to Song Radio</a>
                        <div class="sp__divider"></div>
                        <!-- <a href="">Go to Artist</a> -->
                        @if (count($current_song->singers) > 1)
                        <span class="sp__sub--dropdown">
                            <a href="#">
                                <div class="row">
                                    <div class="col-10">Go To Artist</div>
                                    <div class="col-2 sp__mid--left"><i class="sp-right"></i></div>
                                </div>
                            </a>
                            <div class="sp__sub--dropdown--content">
                                @foreach($current_song->singers as $artist)
                                <a href="{{ route('app.artists.view', ['artist' => $artist->id]) }}">{{ $artist->full_name }}</a>
                                @endforeach
                            </div>
                        </span>
                        @else
                        <a href="{{ route('app.artists.view', ['artist' => $current_song->singers[0]->id]) }}">Go to Artist</a>
                        @endif
                        <a href="{{ route('app.albums.view', ['album' => $current_song->collection->id]) }}">Go to Album</a>
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