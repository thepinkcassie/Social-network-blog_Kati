<?php

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
    return view('welcome');
});

Route::get('/add', function () {
    return \App\User::first()->add_friend(11);
});

Route::get('/accept', function () {
    return \App\User::find(11)->accept_friend(10);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'],function(){

///// PAGES ROUTE /////
    Route::get('/page/create', [
    'uses'=>'PagesController@create',
    'as'=>'page.create'
  ]);

    Route::post('/page/store', [
    'uses'=>'PagesController@store',
    'as'=>'page.store'
  ]);

    Route::get('/page/delete/{id}', [
    'uses'=>'PagesController@destroy',
    'as'=>'page.delete'
  ]);

    Route::get('/pages/trashed', [
    'uses'=>'PagesController@trashed',
    'as'=>'pages.trashed'
  ]);

   Route::get('/pages/kill{id}', [
    'uses'=>'PagesController@kill',
    'as'=>'page.kill'
  ]);

   Route::get('/pages/restore{id}', [
    'uses'=>'PagesController@restore',
    'as'=>'page.restore'
  ]);

   Route::get('/pages/edit{id}', [
    'uses'=>'PagesController@edit',
    'as'=>'page.edit'
  ]);

   Route::post('/page/update/{id}',[
       'uses'=>'PagesController@update',
       'as'=>'page.update'
   ]);

     Route::get('/pages', [
         'uses' =>'PagesController@index',
         'as' => 'pages'
  ]);
  

///// TITLES ROUTE /////

    Route::get('/titles',[
       'uses'=>'TitlesController@index',
       'as'=>'titles'
  ]);

    Route::get('/title/create',[
       'uses'=>'TitlesController@create',
       'as'=>'title.create'
 ]);

    Route::post('/title/store', [
       'uses'=>'TitlesController@store',
       'as'=>'title.store'
  ]);

    Route::get('/title/edit/{id}',[
       'uses'=>'TitlesController@edit',
       'as'=>'title.edit'
  ]);

    Route::post('/title/update/{id}',[
       'uses'=>'TitlesController@update',
       'as'=>'title.update'
  ]);

    Route::get('/title/delete/{id}',[
       'uses'=>'TitlesController@destroy',
       'as'=>'title.delete'
  ]);

///// TAGS ROUTE /////
     Route::get('/tags', [
       'uses'=>'TagsController@index',
        'as'=>'tags'
  ]);

     Route::get('/tag/create', [
       'uses'=>'TagsController@create',
        'as'=>'tag.create'
  ]);

     Route::get('/tag/edit/{id}', [
       'uses'=>'TagsController@edit',
        'as'=>'tag.edit'
  ]);

     Route::post('/tag/store', [
       'uses'=>'TagsController@store',
        'as'=>'tag.store'
  ]);

     Route::post('/tag/update/{id}', [
       'uses'=>'TagsController@update',
        'as'=>'tag.update'
  ]);

     Route::get('/tag/delete/{id}', [
       'uses'=>'TagsController@destroy',
        'as'=>'tag.delete'
  ]);

///// GENRES ROUTE /////
     Route::get('/genres', [
       'uses'=>'GenresController@index',
        'as'=>'genres'
  ]);

     Route::get('/genre/create', [
       'uses'=>'GenresController@create',
        'as'=>'genre.create'
  ]);

     Route::get('/genre/edit/{id}', [
       'uses'=>'GenresController@edit',
        'as'=>'genre.edit'
  ]);

     Route::post('/genre/store', [
       'uses'=>'GenresController@store',
        'as'=>'genre.store'
  ]);

     Route::post('/genre/update/{id}', [
       'uses'=>'GenresController@update',
        'as'=>'genre.update'
  ]);

     Route::get('/genre/delete/{id}', [
       'uses'=>'GenresController@destroy',
        'as'=>'genre.delete'
  ]);

///// PROFILES ROUTE /////
     Route::get('/profile/{slug}', [
       'uses'=>'ProfilesController@index',
        'as'=> 'profile'
   ]);

    Route::get('/profile/edit/profile', [
        'uses'=> 'ProfilesController@edit',
        'as' => 'profile.edit'
    ]);

    Route::post('/profile/update/profile', [
        'uses'=> 'ProfilesController@update',
        'as' => 'profile.update'
    ]);

    Route::get('/profile/delete/{id}', [
       'uses'=>'ProfilesController@destroy',
        'as'=>'profile.delete'
  ]);
  

    ///// FRIENDSHIP ROUTE /////
   Route::get('/check_relationship_status/{id}', [
        'uses' => 'FriendshipsController@check',
        'as' => 'check'
    ]);

    Route::get('/add_friend/{id}', [
        'uses' => 'FriendshipsController@add_friend',
        'as' => 'add_friend'
    ]);

    Route::get('/accept_friend/{id}', [
        'uses' => 'FriendshipsController@accept_friend',
        'as' => 'accept_friend'
    ]);

    ///// NOTIFICATION ROUTE /////
    Route::get('get_unread', function(){
      return Auth::user()->unreadNotifications;
    });

    Route::get('/test', function(){
      $notifications=Auth::user()->unreadNotifications;
      foreach($notifications as $notification){
        dd($notification->data['user']['name']);
      }
    });

    Route::get('/notifications', [
        'uses' => 'HomeController@notifications',
        'as' => 'notifications'
    ]);

    ///// POSTS N FEED  ROUTE /////
    Route::post('/create/post', [
      'uses'=> 'PostsController@store'
    ]);

    Route::get('/feed', [
      'uses'=> 'FeedsController@feed',
      'as'=>'feed'
    ]);
    
    
  ///// LIKE AND UNLIKE ROUTE
    Route::get('/get_auth_user_data', function(){
      return Auth::user();
    });

    Route::get('/like/{id}', [
      'uses' => 'LikesController@like'
    ]);
    
    Route::get('/unlike/{id}', [
      'uses' => 'LikesController@unlike'
    ]);

    ////// SEARCH ROUTE ////

    Route::get('/search', function () {
    return view('search');
});

    ///// LIBRARY ROUTE /////
    
    Route::get('/library',[
      'uses'=>'LibraryController@index',
      'as'=>'index'
    ]);

    Route::get('/{slug}',[
      'uses' => 'LibraryController@singlePage',
      'as' => 'page.single'
    ]);

    Route::get('/genre/{id}', [
      'uses' => 'ProfilesController@genre', 
      'as' => 'genre.single'
    ]);
    

});
