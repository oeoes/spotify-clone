@extends('app.layouts.parent')

@section('app-content')

<div class="app__header sp__column--bot">
    <div class="header__title size--5 fw--700 color--white sp__bot--left my-3">Artist</div>
    <div class="header__title--sticky size--4 fw--700 color--white sp__bot--left opacity__0">
        <span class="title__sticky--text hide__element--translate my-2">Artist</span>
    </div>
</div>

<div class="body__content--container">
    <div class="content__section">
        <div class="content__section--title size--3 fw--600 color--white sp__between">
            <!-- <div>
                                Mood
                                <small class="content__section--subtitle size--2 fw--400 color--grey">Playlists to match your mood</small>
                            </div> -->
        </div>
        <div class="row">
            @forelse ($artists as $artist)
            <div class="col-md-3 my-3">
                <div class="box margin__auto">
                    <div class="image__top">
                        <div class="hidden__element--wrapper image__top--hide">
                            <div class="box__buttons--container sp__around--center">
                                <span class="box__btn--play"><i class="sp-play-circle"></i> <i class="sp-pause-circle"></i></span>
                            </div>
                            <a href="{{ route('app.artists.view', ['artist' => $artist->id]) }}" class="image__top--overlay sp__around--center rounded__element"></a>
                        </div>
                        <img class="rounded__element" src="{{ $artist->profile_picture }}" alt="">
                    </div>
                    <div class="box__title text-center"><a class="size--2 fw--600 color--white" href="{{ route('app.artists.view', ['artist' => $artist->id]) }}">{{ $artist->full_name }}</a></div>
                </div>
            </div>
            @empty
            <div class="col-md-12">
                <div class="no__data sp__mid--center size--4 color--grey">Browse some artist please </div>
            </div>
            @endforelse
        </div>
    </div>
</div>

@endsection