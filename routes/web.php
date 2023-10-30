<?php

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
    return view('welcome');
});


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'web'], function () {
    Route::group(['middleware' => 'auth'], function() {
        Route::group(['namespace' => 'Home'], function () {
            Route::resource('/home', '\App\Http\Controllers\Admin\Home\HomeController');
        });

        Route::group(['namespace' => 'Lang'], function () {
            Route::get('lang/{lang}', '\App\Http\Controllers\Admin\Lang\LangController@changeLang')->name('lang');
        });

        Route::group(['namespace' => 'User'], function () {
            Route::resource('/user', '\App\Http\Controllers\Admin\User\UserController');

            Route::get('/profile/{id}', '\App\Http\Controllers\Admin\User\UserController@profileUser')->Name('profile');

            Route::post('/set-permission','\App\Http\Controllers\Admin\User\UserController@setPermission' )->name('setPermission');
            Route::post('/user/deleteall', '\App\Http\Controllers\Admin\User\UserController@deleteAll')->name('user.delete_all');

            Route::get('/export/user', '\App\Http\Controllers\Admin\User\UserController@exportUsers')->name('export.users');

            Route::post('/user/profile/upload/{id}', '\App\Http\Controllers\Admin\User\UserController@updateAvatar')->name('profile.user');

        });
        Route::group(['namespace' => 'RolePermission'] , function () {
            Route::resource('/rolepermission', '\App\Http\Controllers\Admin\RolePermission\RolePermissionController');
        });
        Route::group(['namespace' => 'Banner', 'middleware' => 'web'], function () {
            Route::resource('banner', '\App\Http\Controllers\Admin\Banner\BannerController');
            Route::post('createBackup1', '\Tungnt\BackupManager\app\Http\Controllers\BackupHomeController@createBackup')->name('backup.create1');
        });
        Route::group(['namespace' => 'Log'], function () {
            Route::resource('/log', '\App\Http\Controllers\Admin\Log\LogController');
        });
        Route::group(['namespace' => 'Post'], function () {
            Route::resource('/post', '\App\Http\Controllers\Admin\Post\PostController');
        });
        Route::group(['namespace' => 'Post'], function () {
            Route::resource('/categorypost', '\App\Http\Controllers\Admin\Post\CategoryPostController');
        });
        Route::group(['namespace' => 'Post'], function () {
            Route::resource('/postcomment', '\App\Http\Controllers\Admin\Post\PostCommentController');
        });

        Route::group(['namespace' => 'Demo'], function () {
            Route::resource('/demo', '\App\Http\Controllers\Admin\Demo\DemoController');
        });
        Route::group(['namespace' => 'Configure'], function () {
            Route::resource('/configure', '\App\Http\Controllers\Admin\Configure\ConfigureController');
            Route::post('/configure/send','\App\Http\Controllers\Admin\Configure\ConfigureController@send')->name('configure.send');
        });

        Route::group(['namespace' => 'LangCustom'], function () {
            Route::resource('/langcustom', '\App\Http\Controllers\Admin\LangCustom\LangCustomController');
        });
        Route::group(['namespace' => 'Contact'], function () {
            Route::resource('/contact', '\App\Http\Controllers\Admin\Contact\ContactController');
        });
        Route::group(['namespace' => 'Redirect'], function () {
            Route::resource('redirect', '\App\Http\Controllers\Admin\Redirect\RedirectController');
            Route::post('/remove-redirect', '\App\Http\Controllers\Admin\Redirect\RedirectController@removeAll')->name('redirect.removeAll');
            Route::post('update-redirect', '\App\Http\Controllers\Admin\Redirect\RedirectController@upgrate')->name('upgrate');
        });
        Route::group(['namespace' => 'Seo'], function () {
            Route::resource('/seo', '\App\Http\Controllers\Admin\Seo\SeoController');
        });
        Route::group(['namespace' => 'Menu'], function () {
            Route::resource('/menu', '\App\Http\Controllers\Admin\Menu\MenuController');
        });
        Route::group(['namespace' => 'Helper'], function () {
            Route::post('/toggle-published/{table}/{id}', '\App\Http\Controllers\Admin\Helper\HelperController@togglePublished')->name('togglePublished');
            Route::resource('/coupon', '\App\Http\Controllers\Admin\Helper\CouponController');
            Route::post('/coupon/deleteall', '\App\Http\Controllers\Admin\Helper\CouponController@deleteAll')->name('coupon.delete_all');
        });
    });
});


Route::group(['namespace' => 'Admin'],  function () {
    Route::group(['namespace' => 'Auth', 'middleware' => 'log'], function () {
        Route::get('/admin/login', '\App\Http\Controllers\Admin\Auth\LoginController@showLoginForm')->name('login.get');
        Route::post('/admin/login', '\App\Http\Controllers\Admin\Auth\LoginController@login')->name('login.post');
        Route::post('/admin/logout', '\App\Http\Controllers\Admin\Auth\LoginController@logout')->name('logout.post');
        Route::get('/admin/register', '\App\Http\Controllers\Admin\Auth\RegisterController@showRegistrationForm')->name('register.get');
        Route::post('/admin/register', '\App\Http\Controllers\Admin\Auth\RegisterController@register')->name('register.post');
        Route::get('/admin/password/reset', '\App\Http\Controllers\Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/admin/password/email', '\App\Http\Controllers\Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('/admin/reset/{token}', '\App\Http\Controllers\Admin\Auth\ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/admin/reset', '\App\Http\Controllers\Admin\Auth\ResetPasswordController@reset')->name('password.update');
        Route::get('redirect/{driver}', '\App\Http\Controllers\Admin\Auth\LoginController@redirectToProvider')
            ->name('login.provider')
            ->where('driver', implode('|', config('auth.socialite.drivers')));
        Route::get('admin/login/{driver}/callback', '\App\Http\Controllers\Admin\Auth\LoginController@handleProviderCallback')
            ->name('login.callback')
            ->where('driver', implode('|', config('auth.socialite.drivers')));
    });

});

Route::get('/error', function () {
    return view('admin.errors.404');
})->name('404.error');
Route::get('kien-thuc-{slug}', '\App\Http\Controllers\Admin\Seo\SeoController@sitemapTest')->name('test.sitemap');
Route::get('/sitemapNew.xml', 'App\Http\Controllers\Admin\SiteMapGoogle\SitemapGoogleController@index')->name('sitemap.index');
Route::get('/sitemap/posts.xml', 'App\Http\Controllers\Admin\SiteMapGoogle\PostSitemapGoogleController@index')->name('sitemap.posts.index');
Route::get('/sitemap/posts/{letter}.xml', 'App\Http\Controllers\Admin\SiteMapGoogle\PostSitemapGoogleController@show')->name('sitemap.posts.show');

Route::get('/{any}', 'App\Http\Controllers\Admin\Redirect\RedirectController@redirect')->where('any', '.*');
