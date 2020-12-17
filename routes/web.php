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


//Route::get('my-captcha', 'front\FrontController@myCaptcha')->name('myCaptcha');

Route::get('my', function (){
    return event(new \App\Events\UserActivation(\App\User::find(1)));
    return 'done';

});

Route::get('/user/active/email/{token}', 'front\FrontController@activation')->name('activation.account');
Route::get('refresh_captcha', 'front\FrontController@refreshCaptcha')->name('refresh_captcha');




Route::get('/', 'front\FrontController@register')->name('register');
Route::any('captcha-test', function()
{
    if (Request::getMethod() == 'POST')
    {
        $rules = ['captcha' => 'required|captcha'];
        $validator = Validator::make(request()->all(), $rules);
        if ($validator->fails())
        {
            echo '<p style="color: #ff0000;">Incorrect!</p>';
        }
        else
        {
            echo '<p style="color: #00ff30;">Matched :)</p>';
        }
    }

    $form = '<form method="post" action="captcha-test">';
    $form .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
    $form .= '<p>' . captcha_img() . '</p>';
    $form .= '<p><input type="text" name="captcha"></p>';
    $form .= '<p><button type="submit" name="check">Check</button></p>';
    $form .= '</form>';
    return $form;
});
Route::get('/form', 'front\FrontController@form')->name('form');
Route::get('/register1', 'front\FrontController@register')->name('register');
Route::post('/register1/store', 'front\FrontController@storeRegister')->name('register.store');
Route::get('/dashboard', 'front\FrontController@dashboard');
Route::get('/dashboard/login', 'front\FrontController@dashboardLogin');
Route::get('/', 'front\FrontController@index');
Route::get('/main', 'front\FrontController@main');
Route::get('/goSDL-master/www/sdl.php', function() {
    $path = base_path().'/public';
    return require_once($path . '/goSDL-master/www/sdl.php');
})->name('front');
Route::get('/vision', 'front\FrontController@vision')->name('vision');
Route::get('/aboutUs', 'front\FrontController@about')->name('about');
Route::get('/cooperation', 'front\FrontController@cooperation')->name('cooperation');
Route::get('/service/{news}/service', 'front\FrontController@service')->name('service');
/// open this link in your browser pleasae
Route::get('/info' , function(){
    phpinfo();
});
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::group(['namespace' => 'Admin', 'middleware ' => ['auth:web'], 'prefix' => 'admin'],function () {

    $this->resource('news', 'PostController');
    $this->resource('video', 'VideoController');
    $this->resource('service', 'ServiceController');

    $this->resource('users', 'UserController');
    $this->resource('tags','TagController');
    $this->resource('slogan','SloganController');
    $this->resource('categories', 'CategoryController');


    $this->get('panel','AdminController@index')->name('dashboard');
    $this->get('panel','AdminController@index')->name('dashboard');
    $this->resource('roles', 'RoleController');
    $this->resource('permissions', 'PermissionController');
    $this->resource('level', 'LevelManageController');
    $this->resource('field', 'FieldController');

    $this->get('/newsletter','NewsletterController@index')->name('newsletter.index');
    $this->delete('/newsletter/{newsletter}','NewsletterController@destroy')->name('newsletter.destroy');
});
Route::post('/news/{news}/comments', 'Admin\CommentController@store')->name('comment.store');
$this->post('/newsletter/store','Admin\NewsletterController@store')->name('newsletter.store');
Route::get('/comments', 'Admin\CommentController@show')->name('comments.all');
Route::get('/allvideo', 'Front\FrontController@showvideos')->name('videos.all');
Route::get('/news/{news}/all', 'Admin\CommentController@showcomment')->name('comment.show');
Route::patch('/news/{news}/update', 'Admin\CommentController@update')->name('comment.update');

Route::get('/contact','front\FrontController@showContact')->name('contact');
Route::get('/aboutUs/{news}','front\FrontController@aboutUs')->name('about');
Route::get('/showcontact','front\FrontController@allcontact')->name('contact.all');
Route::post('/storeContact','front\FrontController@storeContact')->name('contact.store');
Route::get('/category/get-category-list','Admin\AdminController@categoryList')->name('category.list');
Route::get('/newscategory/edit', 'Admin\CategoryController@categoryEdit')->name('newscat.edit');
Route::get('/news/{news}','front\FrontController@showNews')->name('news.show');
Route::get('/tag/{tag}', 'front\FrontController@showposttag')->name('tagss.show');
Route::get('/search', 'front\FrontController@search')->name('news.search');
Route::get('/allnews', 'front\FrontController@allnews')->name('allnews');
Route::get('/articles', 'front\FrontController@articles')->name('articles');
Route::get('/showcat/{showcat}', 'front\FrontController@category')->name('newscategory.show');
Route::get('/newscat/{category}','front\FrontController@showcat')->name('shows');
Route::get('/user/{user}', 'front\FrontController@newsname')->name('news.name');
Route::get('/collaboration', 'Admin\CollaborationController@index');
Route::get('/collaboration/create', 'Admin\CollaborationController@create')->name('collaboration.store');
Route::get('/collaboration/create/request', 'Admin\CollaborationController@request')->name('collaboration.request');
Route::group(['namespace' => 'Auth'], function () {
    // Authentication Routes...
    $this->get('login', 'LoginController@showLoginForm')->name('login');
    $this->post('login', 'LoginController@login');
    $this->get('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    $this->get('register', 'RegisterController@showRegistrationForm')->name('register');
    $this->post('register', 'RegisterController@register');

    // Password Reset Routes...
    $this->get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $this->post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    $this->get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    $this->post('password/reset', 'ResetPasswordController@reset');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('404',['as'=>'404','uses'=>'ErrorHandlerController@errorCode404']);

Route::get('405',['as'=>'405','uses'=>'ErrorHandlerController@errorCode405']);
