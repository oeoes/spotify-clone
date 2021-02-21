@extends('app.layouts.parent')

@section('data-page', 'home')

@section('app-content')

<div class="app__header sp__bot--left">
    <div class="header__title size--5 fw--700 color--white sp__bot--left my-3">Home</div>
    <div class="header__title--sticky size--4 fw--700 color--white sp__bot--left opacity__0">
        <span class="title__sticky--text hide__element--translate my-2">Home</span>
    </div>
</div>

<div class="body__content--container">
    <!-- Mood -->
    <div class="content__section">
        <div class="content__section--title size--3 fw--600 color--white sp__between">
            <div>
                {{$mood->name}}
                <small class="content__section--subtitle size--2 fw--400 color--grey">{{ $mood->description }}</small>
            </div>
            <div class="button__slide--content">
                <span class="button__left"><i class="sp-left"></i></span>
                <span class="button__right"><i class="sp-right"></i></span>
            </div>
        </div>

        <div class="content__section--body">
            @forelse ($mood->playlists as $playlist)
            @php
            $isLoved = \App\Models\Library::where(['type' => 'playlist', 'model_id' => $playlist->id, 'user_id' => auth()->user()->id])->first();
            @endphp
            <div class="box mx-2">
                <div class="image__top">
                    <div class="hidden__element--wrapper image__top--hide">
                        <div class="box__buttons--container sp__around--center">
                            @if ($isLoved)
                            <span class="box__btn--love" data-type="playlist" data-id="{{ $playlist->id }}"><i class="sp-love-fill"></i></span>
                            @else
                            <span class="box__btn--love" data-type="playlist" data-id="{{ $playlist->id }}"><i class="sp-love"></i></span>
                            @endif

                            <span class="box__btn--play" data-type="playlist" data-url="{{ route('app.audio.playlist', ['playlist' => $playlist->id]) }}"><i class="sp-play-circle"></i> <i class="sp-pause-circle"></i></span>
                            <span class="sp__dropdown">
                                <span class="box__btn--more" data-toggle="dropdown" data-toggle="dropdown"><i class="sp-ellipsis-h"></i></span>
                                <span class="sp__dropdown--content hide__element">
                                    <a href="#">Go to Playlist Radio</a>
                                    <div class="sp__divider"></div>
                                    <a href="#">Save to Your Library</a>
                                </span>
                            </span>
                        </div>
                        <a href="{{ route('app.playlists.view', ['playlist' => $playlist->id]) }}" class="image__top--overlay">

                        </a>
                    </div>
                    <img src="{{ $playlist->cover }}" alt="">
                </div>
                <div class="box__title"><a class="size--2 fw--600 color--white" href="{{ route('app.playlists.view', ['playlist' => $playlist->id]) }}">{{ $playlist->title }}</a></div>
                <p class="size--2 fw--400 color--grey">
                    {{ $playlist->description }}
                </p>
            </div>
            @empty
            @endforelse
        </div>
    </div>

    <!-- popular playlist -->
    <div class="content__section">
        <div class="content__section--title size--3 fw--600 color--white sp__between">
            <div>
                Popular Playlist
            </div>
            <div class="button__slide--content">
                <span class="button__left"><i class="sp-left"></i></span>
                <span class="button__right"><i class="sp-right"></i></span>
            </div>
        </div>

        <div class="content__section--body">
            @foreach($playlists as $playlist)
            @php
            $isLoved = \App\Models\Library::where(['type' => 'playlist', 'model_id' => $playlist->id, 'user_id' => auth()->user()->id])->first();
            @endphp
            <div class="box mx-2">
                <div class="image__top">
                    <div class="hidden__element--wrapper image__top--hide">
                        <div class="box__buttons--container sp__around--center">
                            @if ($isLoved)
                            <span class="box__btn--love" data-type="playlist" data-id="{{ $playlist->id }}"><i class="sp-love-fill"></i></span>
                            @else
                            <span class="box__btn--love" data-type="playlist" data-id="{{ $playlist->id }}"><i class="sp-love"></i></span>
                            @endif
                            
                            <span class="box__btn--play"><i class="sp-play-circle"></i> <i class="sp-pause-circle"></i></span>
                            <span class="sp__dropdown">
                                <span class="box__btn--more" data-toggle="dropdown" data-toggle="dropdown"><i class="sp-ellipsis-h"></i></span>
                                <span class="sp__dropdown--content hide__element">
                                    <a href="#">Go to Playlist Radio</a>
                                    <div class="sp__divider"></div>
                                    <a href="#">Save to Your Library</a>
                                </span>
                            </span>
                        </div>
                        <a href="{{ route('app.playlists.view', ['playlist' => $playlist->id]) }}" class="image__top--overlay">

                        </a>
                    </div>
                    <img src="{{ $playlist->cover }}" alt="">
                </div>
                <div class="box__title"><a class="size--2 fw--600 color--white" href="{{ route('app.playlists.view', ['playlist' => $playlist->id]) }}">{{ $playlist->title }}</a></div>
                <p class="size--2 fw--400 color--grey">
                    {{ $playlist->description }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection