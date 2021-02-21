<?php

use App\Http\Controllers\SpotifyClone\Admin\AdminAppController;
use App\Http\Controllers\SpotifyClone\Admin\AlbumOfArtistController;
use App\Http\Controllers\SpotifyClone\Admin\ArtistController;
use App\Http\Controllers\SpotifyClone\Admin\AuthController;
use App\Http\Controllers\SpotifyClone\Admin\GenreController;
use App\Http\Controllers\SpotifyClone\Admin\PlaylistController;
use App\Http\Controllers\SpotifyClone\Admin\SingerOfSongController;
use App\Http\Controllers\SpotifyClone\Admin\SongOfAlbumController;
use App\Http\Controllers\SpotifyClone\Admin\SongOfPlaylistController;
use App\Http\Controllers\SpotifyClone\User\AlbumController;
use App\Http\Controllers\SpotifyClone\User\ArtistController as UserArtistController;
use App\Http\Controllers\SpotifyClone\User\AudioController;
use App\Http\Controllers\SpotifyClone\User\AuthController as UserAuthController;
use App\Http\Controllers\SpotifyClone\User\LibraryController;
use App\Http\Controllers\SpotifyClone\User\PlaylistController as UserPlaylistController;
use App\Http\Controllers\SpotifyClone\User\UserAppController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return UserAppController::class;
    // return redirect()->route('app.user.home');
});

Route::prefix('app')->name('app.')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/', [UserAppController::class, 'home'])->name('user.home');
        Route::get('/browses', [UserAppController::class, 'browses'])->name('user.browses');
        Route::get('/albums', [UserAppController::class, 'albums'])->name('user.albums');
        Route::get('/artists', [UserAppController::class, 'artists'])->name('user.artists');
        Route::get('/liked-songs', [UserAppController::class, 'likedSongs'])->name('user.liked-songs');

        Route::get('/playlists/{playlist}', [UserPlaylistController::class, 'view'])->name('playlists.view');
        Route::post('/playlists', [UserPlaylistController::class, 'store'])->name('playlists.store');

        Route::get('/artists/{artist}', [UserArtistController::class, 'view'])->name('artists.view');

        Route::get('/albums/{album}', [AlbumController::class, 'view'])->name('albums.view');

        // library
        Route::get('/libraries/{type}/{model_id}', [LibraryController::class, 'storeToLibrary'])->name('libraries.storeToLibrary');

        // queue
        Route::get('/queues', [UserAppController::class, 'queue'])->name('user.queue');

        // audio
        Route::get('audio/song/{song}', [AudioController::class, 'playSong'])->name('audio.song');
        Route::get('audio/collection/{collection}', [AudioController::class, 'playCollection'])->name('audio.collection');
        Route::get('audio/playlist/{playlist}', [AudioController::class, 'playPlaylist'])->name('audio.playlist');
    });
    Route::get('/login', [UserAuthController::class, 'index'])->name('auth.login');
    Route::post('/login', [UserAuthController::class, 'login'])->name('auth.login-validate');
    Route::post('/signup', [UserAuthController::class, 'signup'])->name('auth.signup');
    Route::get('/logout', [UserAuthController::class, 'logout'])->name('auth.logout');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('admin')->group(function () {
        Route::get('/artists', [ArtistController::class, 'index'])->name('artists.index');
        Route::get('/artists/{artist}', [ArtistController::class, 'view'])->name('artists.view');
        Route::post('/artists', [ArtistController::class, 'store'])->name('artists.store');
        Route::put('/artists/{artist}', [ArtistController::class, 'update'])->name('artists.update');
        Route::delete('/artists/{artist}', [ArtistController::class, 'delete'])->name('artists.delete');
    
        Route::get('/artists/album/{album}', [AlbumOfArtistController::class, 'view'])->name('artists.album.view');
        Route::post('/artists/album', [AlbumOfArtistController::class, 'store'])->name('artists.album.store');
        Route::put('/artists/album/{album}', [AlbumOfArtistController::class, 'update'])->name('artists.album.update');
        Route::delete('/artists/album/{album}', [AlbumOfArtistController::class, 'delete'])->name('artists.album.delete');
    
        Route::post('/artist/album/songs', [SongOfAlbumController::class, 'store'])->name('artist.album.songs.store');
        Route::delete('/artist/album/songs/{song}', [SongOfAlbumController::class, 'delete'])->name('artist.album.songs.delete');
    
        Route::post('/artist/album/singers', [SingerOfSongController::class, 'store'])->name('artist.album.singers.store');
        Route::delete('/artist/album/singers/{singer}', [SingerOfSongController::class, 'delete'])->name('artist.album.singers.delete');
    
        Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');
        Route::post('/genres', [GenreController::class, 'store'])->name('genres.store');
        Route::put('/genres/{genre}', [GenreController::class, 'update'])->name('genres.update');
        Route::delete('/genres/{genre}', [GenreController::class, 'delete'])->name('genres.delete');
    
        Route::get('/playlists', [PlaylistController::class, 'index'])->name('playlists.index');
        Route::post('/playlists', [PlaylistController::class, 'store'])->name('playlists.store');
        Route::get('/playlists/{playlist}', [PlaylistController::class, 'view'])->name('playlists.view');
        Route::put('/playlists/{playlist}', [PlaylistController::class, 'update'])->name('playlists.update');
        Route::delete('/playlists/{playlist}', [PlaylistController::class, 'delete'])->name('playlists.delete');
    
        Route::post('/playlist/songs', [SongOfPlaylistController::class, 'store'])->name('playlist.songs.store');
        Route::delete('/playlist/songs/{song}', [SongOfPlaylistController::class, 'delete'])->name('playlist.songs.delete');
    });

    Route::get('/login', [AuthController::class, 'index'])->name('auth.login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login-validate');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});
