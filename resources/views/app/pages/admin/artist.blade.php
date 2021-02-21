@extends('app.layouts.admin.parent')

@section('data-page', 'artist')

@section('modal')
<div class="sp--btn sp--btn-green btn--add modal__button sp__mid--center rounded__element size--3" data-target="#add__artist"><i class="sp-plus"></i></div>
<div id="add__artist" class="modal__container sp__mid--center hidden">
    <div class="modal__content">
        <div class="modal__close button__control"><i class="sp-cross"></i></div>
        <div class="modal__header mt-3">
            <div class="size--4 fw---600">Add Artist</div>
        </div>
        <div class="modal__body mt-2">
            <div class="size--3 fw--200">
                <form action="{{ route('admin.artists.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="sp__form--group">
                        <input name="full_name" type="text" class="sp__form--control-white" placeholder="Full Name">
                    </div>

                    <div class="sp__form--group">
                        <textarea name="bio" class="sp__form--control-white" name="" cols="5" rows="5" placeholder="Write a bit description about the artist."></textarea>
                    </div>

                    <div class="sp__form--group">
                        <input name="profile_picture" accept="image/*" type="file" class="hide__element">
                        <div class="sp__photo--frame m-auto color--grey sp__mid--center">
                            <img src="" alt="" class="hide__element img__responsive">
                            <span>Upload a photo</span>
                        </div>
                    </div>

                    <div class="sp__form--group">
                        <input name="profile_banner" accept="image/*" type="file" class="hide__element">
                        <div class="sp__banner--frame m-auto color--grey sp__mid--center">
                            <img src="" alt="" class="hide__element img__responsive">
                            <span>Upload a banner</span>
                        </div>
                    </div>
            </div>
        </div>
        <div class="modal__footer sp__top--center">
            <button type="submit" class="sp--btn sp--btn-green rounded-pill px-4">CREATE</button>
        </div>
        </form>

    </div>
    <div class="modal__overlay"></div>
</div>
@endsection

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

        </div>
        <div class="row">
            @forelse ($artists as $key => $artist)
            <div class="col-md-3 my-3">
                <div class="box margin__auto">
                    <div class="image__top">
                        <div class="hidden__element--wrapper image__top--hide">
                            <div class="box__buttons--container sp__around--center">
                                <span class="sp--btn sp--btn-blue modal__button" data-target="#edit__artist{{$key}}"><i class="sp-edit"></i> EDIT</span>
                                <span class="sp--btn sp--btn-red modal__button" data-target="#delete__artist{{$key}}"><i class="sp-delete"></i> DELETE</span>
                            </div>
                            <a href="{{ route('admin.artists.view', ['artist' => $artist->id]) }}" class="image__top--overlay sp__around--center rounded__element"></a>
                        </div>
                        <img class="rounded__element" src="{{ $artist->profile_picture }}" alt="">
                    </div>
                    <div class="box__title text-center"><a class="size--2 fw--600 color--white" href="{{ route('admin.artists.view', ['artist' => $artist->id]) }}">{{ $artist->full_name }}</a></div>
                </div>
            </div>

            <div id="edit__artist{{$key}}" class="modal__container sp__mid--center hidden">
                <div class="modal__content">
                    <div class="modal__close button__control"><i class="sp-cross"></i></div>
                    <div class="modal__header mt-3">
                        <div class="size--4 fw---600">Add Artist</div>
                    </div>
                    <div class="modal__body mt-2">
                        <div class="size--3 fw--200">
                            <form action="{{ route('admin.artists.update', ['artist' => $artist->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="sp__form--group">
                                    <input name="full_name" type="text" class="sp__form--control-white" placeholder="Full Name" value="{{$artist->full_name}}">
                                </div>

                                <div class="sp__form--group">
                                    <textarea name="bio" class="sp__form--control-white" name="" cols="5" rows="5" placeholder="Write a bit description about the artist.">{{ $artist->bio }}</textarea>
                                </div>

                                <div class="sp__form--group">
                                    <input name="profile_picture" accept="image/*" type="file" class="hide__element">
                                    <div class="sp__photo--frame m-auto color--grey sp__mid--center">
                                        <img src="{{ $artist->profile_picture }}" alt="" class="img__responsive">
                                        <span class="hide__element">Upload a photo</span>
                                    </div>
                                </div>

                                <div class="sp__form--group">
                                    <input name="profile_banner" accept="image/*" type="file" class="hide__element">
                                    <div class="sp__banner--frame m-auto color--grey sp__mid--center">
                                        <img src="{{ $artist->profile_banner }}" alt="" class="img__responsive">
                                        <span class="hide__element">Upload a banner</span>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="modal__footer sp__top--center">
                        <button type="submit" class="sp--btn sp--btn-green rounded-pill px-4">CREATE</button>
                    </div>
                    </form>

                </div>
                <div class="modal__overlay"></div>
            </div>
            <div id="delete__artist{{$key}}" class="modal__container sp__mid--center hidden">
                <div class="modal__content">
                    <div class="modal__close button__control"><i class="sp-cross"></i></div>
                    <div class="modal__header mt-3">
                        <div class="size--4 fw---600">Delete Artist</div>
                    </div>
                    <div class="modal__body mt-2">
                        <div class="size--3 fw--200">
                            <form action="{{ route('admin.artists.delete', ['artist' => $artist->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                Are you sure to delete this artist?
                        </div>
                    </div>
                    <div class="modal__footer sp__top--center">
                        <button type="submit" class="sp--btn sp--btn-red rounded-pill px-4">ABSOLUTELY</button>
                    </div>
                    </form>

                </div>
                <div class="modal__overlay"></div>
            </div>
            @empty
            <div class="no__data size--5 color--grey sp__mid--center">
                No Artist.
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection