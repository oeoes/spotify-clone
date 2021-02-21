@extends('app.layouts.admin.parent')

@section('data-page', 'genre')

@section('modal')
<div class="sp--btn sp--btn-green btn--add modal__button sp__mid--center rounded__element size--3" data-target="#add__genre"><i class="sp-plus"></i></div>
<div id="add__genre" class="modal__container sp__mid--center hidden">
    <div class="modal__content">
        <div class="modal__close button__control"><i class="sp-cross"></i></div>
        <div class="modal__header mt-3">
            <div class="size--4 fw---600">Add Genre</div>
        </div>
        <div class="modal__body mt-2">
            <p class="size--3 fw--200">
            <form action="{{ route('admin.genres.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="sp__form--group">
                    <input name="name" type="text" class="sp__form--control-white" placeholder="Genres or Moods">
                </div>

                <div class="sp__form--group">
                    <select name="type" class="sp__form--control-white">
                        <option value="genre">Genre</option>
                        <option value="mood">Mood</option>
                    </select>
                </div>

                <div class="sp__form--group">
                    <textarea name="description" class="sp__form--control-white" name="" cols="5" rows="5" placeholder="Genre or mood description."></textarea>
                </div>

                <div class="sp__form--group">
                    <input name="cover" accept="image/*" type="file" class="hide__element">
                    <div class="sp__photo--frame m-auto color--grey sp__mid--center">
                        <img src="" alt="" class="hide__element img__responsive">
                        <span>Upload a photo</span>
                    </div>
                </div>
                </p>
        </div>
        <div class="modal__footer sp__top--center">
            <button class="sp--btn sp--btn-green rounded-pill px-4">CREATE</button>
            </form>
        </div>

    </div>
    <div class="modal__overlay"></div>
</div>
@endsection

@section('app-content')
<div class="app__header sp__column--bot">
    <div class="header__title size--5 fw--700 color--white sp__bot--left my-3">Genres & Moods</div>
    <div class="header__title--sticky size--4 fw--700 color--white sp__bot--left opacity__0">
        <span class="title__sticky--text hide__element--translate my-2">Genres & Moods</span>
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
            @forelse ($genres as $key => $genre)
            <div class="col-md-3 my-3">
                <div class="box margin__auto">
                    <div class="image__top">
                        <div class="hidden__element--wrapper image__top--hide sp__column--bot">
                            <div class="image__top--overlay sp__mid--center color--white text-center">
                            </div>
                            <div class="box__buttons--container sp__around--center">
                                <span class="sp--btn sp--btn-blue modal__button" data-target="#edit__genre{{$key}}"><i class="sp-edit"></i> EDIT</span>
                                <span class="sp--btn sp--btn-red modal__button" data-target="#delete__genre{{$key}}"><i class="sp-delete"></i> DELETE</span>
                            </div>
                        </div>
                        <img class="" src="{{ $genre->cover }}" alt="">
                    </div>
                    <div class="box__title">
                        <a class="size--2 fw--600 color--white" href="#">{{ $genre->name }}</a>
                        <p class="size--2 color--grey">{{ $genre->description }}</p>
                    </div>
                </div>
            </div>

            <div id="edit__genre{{$key}}" class="modal__container sp__mid--center hidden">
                <div class="modal__content">
                    <div class="modal__close button__control"><i class="sp-cross"></i></div>
                    <div class="modal__header mt-3">
                        <div class="size--4 fw---600">Add Genre</div>
                    </div>
                    <div class="modal__body mt-2">
                        <p class="size--3 fw--200">
                        <form action="{{ route('admin.genres.update', ['genre' => $genre->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="sp__form--group">
                                <input name="name" type="text" class="sp__form--control-white" placeholder="Genres or Moods" value="{{ $genre->name }}">
                            </div>

                            <div class="sp__form--group">
                                <select name="type" class="sp__form--control-white">
                                    <option <?php $genre->type === 'genre' ? print 'selected' : ''; ?> value="genre">Genre</option>
                                    <option <?php $genre->type === 'mood' ? print 'selected' : ''; ?> value="mood">Mood</option>
                                </select>
                            </div>

                            <div class="sp__form--group">
                                <textarea name="description" class="sp__form--control-white" name="" cols="5" rows="5" placeholder="Genre or mood description.">{{ $genre->description }}</textarea>
                            </div>

                            <div class="sp__form--group">
                                <input name="cover" accept="image/*" type="file" class="hide__element">
                                <div class="sp__photo--frame m-auto color--grey sp__mid--center">
                                    <img src="{{ $genre->cover }}" alt="" class="img__responsive">
                                    <span class="hide__element">Upload a photo</span>
                                </div>
                            </div>
                            </p>
                    </div>
                    <div class="modal__footer sp__top--center">
                        <button class="sp--btn sp--btn-green rounded-pill px-4">UPDATE</button>
                        </form>
                    </div>

                </div>
                <div class="modal__overlay"></div>
            </div>

            <div id="delete__genre{{$key}}" class="modal__container sp__mid--center hidden">
                <div class="modal__content">
                    <div class="modal__close button__control"><i class="sp-cross"></i></div>
                    <div class="modal__header mt-3">
                        <div class="size--4 fw---600">Delete Genre</div>
                    </div>
                    <div class="modal__body mt-2">
                        <div class="size--3 fw--200">
                            <form action="{{ route('admin.genres.delete', ['genre' => $genre->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                Are you sure to delete this genre?
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
            <div class="col-md-12 my-3">
                <div class="no__data size--5 color--grey sp__mid--center">
                    Genre Unavailable
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection