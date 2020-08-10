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


// Home Page Route:
// Show Home Page
Route::get('/', 'HomeController\HomeController@showHomePage')->name('home.page');
Route::get('/news','HomeController\NewsController@index')->name('home.news');
//Route::get('/news-page-home','HomeController\NewsController@showNewsPage')->name('home-news-page');

Route::get('/details/new/{slug}', 'HomeController\HomeController@details')->name('details.new');

Route::get('/files','HomeController\FilesController@index')->name('home.files');
Route::get('/details/file/{slug}', 'HomeController\FilesController@details')->name('details.file');
//Route::get('/download/{file}' , 'HomeController\FilesController@download')->name('downloadfile');
Route::get('/download/{file}' , 'HomeController\FilesController@download');

Route::get('/aboutus','HomeController\AboutUsController@index')->name('home.aboutus');
Route::post('/cotactus/store','HomeController\AboutUsController@store')->name('home.contactus.store');
Route::get('/home/secretariat/show','HomeController\SecretariatController@index')->name('home.secretariat.show');
Route::post('/home/secretariat/store','HomeController\SecretariatController@store')->name('home.secretariat.store');
//Route::get('questions', function () {
//    return view('UI.Questions.questions');
//})->name('home.questions');
Route::get('/questions','HomeController\QuestionController@index')->name('home.questions');


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// User Panel Route:
// Show User Panel
Route::group(['namespace' => 'Panel\UserControllers','middleware' => ['auth:web','checkUser'] ,'prefix' => 'user'], function () {

    Route::get('panel', 'PanelController@showUserPanel')->name('user.panel');
    Route::get('edit', 'PanelController@edit')->name('user.edit');
    Route::get('edit/ajax/{id}',array('as'=>'myform.ajax','uses'=>'PanelController@myformAjax'));
    Route::post('update/{user}',"PanelController@update")->name('user.update');
// Show User Course
    Route::get('courses', 'RegisterCourseController@index')->name('user.courses');
    Route::post('register/courses', 'RegisterCourseController@register')->name('user.register.courses');
    Route::get('delete/courses/{registerCourse}', 'RegisterCourseController@delete')->name('user.delete.courses');
    Route::post('course/pending/{course}','RegisterCourseController@pay_by_zarinpal')->name('pending');
    Route::get('payment/zarinpal/callback','RegisterCourseController@zarinpalCallback')->name('payment.zarinpal.callback');
// Show Idea Register
    Route::get('idea', 'UserIdeaController@index')->name('idea.show');

    Route::get('idea/create', 'UserIdeaController@create')->name('idea.create');
    Route::post('idea/add', 'UserIdeaController@store')->name('idea.store');
    Route::get('idea/edit/{idea}', 'UserIdeaController@edit')->name('idea.edit');
    Route::post('idea/update/{idea}', 'UserIdeaController@update')->name('idea.update');
    Route::get('idea/delete/{idea}', 'UserIdeaController@delete')->name('idea.delete');



});
// Show Edit Idea
//Route::get('/idea-edit','Panel\UserControllers\UserIdeaController@showEditIdea')->name('idea-edit');


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// Admin Panel Route:
// Show Admin Panel
Route::group(['namespace' => 'Panel\AdminController','middleware' => ['auth:web','checkAdmin'], 'prefix' => 'admin'], function () {
    Route::get('panel', 'PanelController@index')->name('admin.panel');
    Route::get('edit', 'PanelController@edit')->name('admin.edit');
    Route::get('edit/ajax/{id}',array('as'=>'myform.ajax','uses'=>'PanelController@myformAjax'));
    Route::post('update/{user}',"PanelController@update")->name('admin.update');

    Route::get('/news', 'NewsController@index')->name('news.show');
    Route::get('/news/create', 'NewsController@create')->name('news.create');
    Route::post('/news/add', 'NewsController@store')->name('news.store');

    // Show News Page
//  Route::get('/news/page','NewsController@showNewsPage')->name('news.page');
    // Show Edit News
    Route::get('/news/edit/{news}', 'NewsController@edit')->name('news.edit');
    Route::post('/news/update/{news}', 'NewsController@update')->name('news.update');
    Route::get('/news/delete/{news}', 'NewsController@delete')->name('news.delete');
    Route::get('/news/{news}/active', 'NewsController@active');
    Route::get('/news/{news}/unactive', 'NewsController@unactive');
    //courses route
    Route::get('/courses','CoursesController@index')->name('courses.show');
    Route::get('/courses/create', 'CoursesController@create')->name('courses.create');
    Route::post('/courses/add', 'CoursesController@store')->name('courses.store');
    Route::get('/courses/edit/{course}', 'CoursesController@edit')->name('courses.edit');
    Route::post('/courses/update/{course}', 'CoursesController@update')->name('courses.update');
    Route::get('/courses/delete/{course}', 'CoursesController@delete')->name('courses.delete');
    //states route
    Route::get('/states','StateController@index')->name('states.show');
    Route::get('/states/create', 'StateController@create')->name('states.create');
    Route::post('/states/add', 'StateController@store')->name('states.store');
    Route::get('/states/edit/{state}', 'StateController@edit')->name('states.edit');
    Route::post('/states/update/{state}', 'StateController@update')->name('states.update');
    Route::get('/states/delete/{state}', 'StateController@delete')->name('states.delete');
    //cities route
    Route::get('/cities','CitiesController@index')->name('cities.show');
    Route::get('/cities/create', 'CitiesController@create')->name('cities.create');
    Route::post('/cities/add', 'CitiesController@store')->name('cities.store');
    Route::get('/cities/edit/{city}', 'CitiesController@edit')->name('cities.edit');
    Route::post('/cities/update/{city}', 'CitiesController@update')->name('cities.update');
    Route::get('/cities/delete/{city}', 'CitiesController@delete')->name('cities.delete');
    //users route
    Route::get('/users-list', 'UsersController@index')->name('users.list');
    Route::get('/users/details/{user}', 'UsersController@showUserDetails')->name('user.details');
    Route::get('/users/delete/{user}', 'UsersController@delete')->name('user.delete');
    //idea route
    Route::get('/users/ideas', 'UserIdeaController@index')->name('users.ideas');
    Route::get('/users/ideas/delete/{idea}', 'UserIdeaController@delete')->name('users.ideas.delete');
    //change view
    Route::get('/change/view', 'HomeViewController@showChangeView')->name('change-view');
    //user_register_course
    Route::get('/users/register/course','RegisterCourseController@index')->name('users.register.course');
    Route::get('/users/register/course/delete/{registerCourse}','RegisterCourseController@delete')->name('users.register.course.delete');
    //fields route
    Route::get('/fields','FieldsController@index')->name('fields.show');
    Route::get('/fields/create', 'FieldsController@create')->name('fields.create');
    Route::post('/fields/add', 'FieldsController@store')->name('fields.store');
    Route::get('/fields/edit/{field}', 'FieldsController@edit')->name('fields.edit');
    Route::post('/fields/update/{field}', 'FieldsController@update')->name('fields.update');
    Route::get('/fields/delete/{field}', 'FieldsController@delete')->name('fields.delete');

    //sliders
    Route::get('/sliders/show', 'SlidersController@showSliders')->name('sliders.show'); /* New */
    Route::post('/sliders/add','SlidersController@store')->name('sliders.store');
    Route::post('/sliders/update/{slider}','SlidersController@update')->name('sliders.update');
    Route::get('/sliders/delete/{slider}','SlidersController@delete')->name('sliders.delete');


    // Show Events Sliders
    Route::get('/eventsslider/show', 'EventsController@showEventsSliders')->name('events.show'); /* New */
    Route::post('/eventsslider/add','EventsController@store')->name('events.store');
    Route::post('/eventsslider/update/{event}','EventsController@update')->name('events.update');
    Route::get('/eventsslider/delete/{event}','EventsController@delete')->name('events.delete');


    // Show Organizers Sliders
    Route::get('/speakersslider/show', 'SpeakersController@showSpeakersSliders')->name('speakers.show'); /* New */
    Route::post('/speakersslider/add','SpeakersController@store')->name('speakers.store');
    Route::post('/speakersslider/update/{speaker}','SpeakersController@update')->name('speakers.update');
    Route::get('/speakersslider/delete/{speaker}','SpeakersController@delete')->name('speakers.delete');




    // Show Committee Sliders
    Route::get('/committeessliders/show', 'CommitteesController@showCommitteeSliders')->name('committees.show');
    Route::post('/committeesslider/add','CommitteesController@store')->name('committees.store');
    Route::post('/committeesslider/update/{committee}','CommitteesController@update')->name('committees.update');
    Route::get('/committeesslider/delete/{committee}','CommitteesController@delete')->name('committees.delete');

    // show tizer
    Route::get('tizer','TizerController@showTizer')->name('tizer.show');
    Route::post('tizer/update/{tizer}','TizerController@update')->name('tizer.update');
    Route::get('/tizer/delete/{tizer}','TizerController@delete')->name('tizer.delete');

    Route::post('tizer/poster/update/{poster}','PosterController@update')->name('poster.update');
    Route::get('/tizer/poster/delete/{poster}','PosterController@delete')->name('poster.delete');

//file route
    Route::get('file','FilesController@index')->name('files.show');
    Route::get('file/create','FilesController@create')->name('file.create');
    Route::post('file/add','FilesController@store')->name('file.store');
    Route::get('file/edit/{file}','FilesController@edit')->name('file.edit');
    Route::post('file/update/{file}','FilesController@update')->name('file.update');
    Route::get('file/delete/{file}','FilesController@delete')->name('file.delete');
    Route::get('/file/{file}/active', 'FilesController@active');
    Route::get('/file/{file}/unactive', 'FilesController@unactive');
//route contactUs
    Route::get('/aboutus','AboutUsController@index')->name('aboutus.show');
    Route::post('/aboutus/update/{aboutUs}','AboutUsController@update')->name('aboutus.update');
//route question
    Route::get('questions/create','QuestionsController@create')->name('panel.questions.create');
    Route::post('questions/add','QuestionsController@store')->name('panel.questions.store');
    Route::get('questions/show','QuestionsController@show')->name('panel.questions.show');
    Route::post('questions/update/{question}','QuestionsController@update')->name('panel.questions.update');
    Route::get('question/delete/{question}','QuestionsController@delete')->name('panel.questions.delete');
});




//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
//Route::get('register',array('as'=>'myform','uses'=>'Auth\RegisterController@myform'));
Route::get('register/ajax/{id}',array('as'=>'myform.ajax','uses'=>'Auth\RegisterController@myformAjax'));
//verify route
Route::get('/verify','VerifyController@getVerify')->name('getVerify');
Route::post('/verify','VerifyController@postVerify')->name('verify');
Route::get('/reverify/{user}', 'Auth\LoginController@reauthenticated')->name('reverify');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


/* New */

// Show Pictures Gallety Page Home
Route::get('/home/gallery', function (){
    return view('UI.PicturesGallery.picgallery');
})->name('home.gallery');



/* Startup 6 : */
/* New */

// Show Verify Code Page
Route::get('register/verify', function () {
    return view('UI.Auth.verify');
});

// Show Introduction Page (معرفی)
Route::get('introduction', 'HomeController\IntroductionController@showIntroductionPage')->name('home.introduction');

// Show Questions Page



// Show Questions Page Panel

