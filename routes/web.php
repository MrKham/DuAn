<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('test', function (){
	return \Hash::make('123456789');
});
Route::group(['middleware' => 'blacklist'], function () {

    Auth::routes();
    Route::get('logout', array('uses' => 'Auth\LoginController@logout'));
    Route::get('/errors/503', function () {
        return view('errors.503');
    });
    Route::get('/login', function () {
        return redirect('/');
    });
    Route::get('active/{id}', 'Backend\UserController@active');

    /**
     * Social Login
     */
    Route::group(['namespace' => 'Frontend'], function () {
        Route::get('facebook-redirect', 'SocialAuthController@redirectFb');
        Route::get('facebook-callback', 'SocialAuthController@callbackFb');
        Route::get('google-redirect', 'SocialAuthController@redirectGG');
        Route::get('google-callback', 'SocialAuthController@callbackGG');
    });


    Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
        Route::post('login', 'AuthController@postLogin');
    });

    /**
     * Frontend
     */
    Route::group(['namespace' => 'Frontend'], function () {
        Route::get('', 'HomeController@index')->name('home');
        Route::get('notifi-contribute', function (){
            return redirect(url('/user/profile/'.\Auth::user()->id))->with('contribute', 'active');
        });
        Route::get('ve-chung-toi', 'HomeController@aboutWe')->name('ve-chung-toi');
        Route::get('user/profile/{id}', 'UserController@profile');
        Route::PUT('user/profile/edit/{user}', 'UserController@editProfile');
        Route::get('tin-tuc', 'HomeController@listPost');
        Route::get('tin-tuc/{id}', 'HomeController@showPost')->name('post_detail');
        Route::get('tags/{tag}', 'HomeController@showPostByTag')->name('tag');
        Route::get('search/the-loai', 'CategoryController@searchTech');
        Route::get('the-loai/{id}/{time}/{condition}', 'CategoryController@listTech');
        // Route::get('du-an-chi-tiet/{slug}', 'HomeController@showProject')->name('project_detail');
        Route::get('prnasia', 'HomeController@prnasia');

        //Thanh toán
        Route::get('contribute/{slug}', 'PaymentController@contribute')->name('project_contribute');
        Route::post('contribute', 'PaymentController@postContribute');
        Route::get('ket-qua-giao-dich-abcxyzdm4fundstart123/{slug}', 'PaymentController@paymentFinish')->name('payment_finish');
        Route::get('payment-success/{slug}', 'PaymentController@paymentSuccess')->name('payment_success');

        Route::get('du-an/{slug_project}', 'HomeController@showProject')->name('project_detail');
        Route::group(['middleware' => 'auth'], function () {
            Route::resource('du-an', 'ProjectController');
            Route::post('preview-du-an', 'ProjectController@previewDuAn');

            //role project_mod
            Route::group(['middleware' => 'dprole:project_mod'], function () {
                Route::post('duyet-du-an', 'ProjectController@duyetDuAn');
            });
        });
        Route::get('main-search/{type}', 'HomeController@mainSearch');
        Route::resource('discover', 'DiscoverController');

        //cms
        foreach (\App\Classes\Helper::$cms_type as $data) {
            Route::get($data['value'], 'HomeController@aboutType');
            Route::get($data['value'].'/{slug}', 'HomeController@aboutTypeDetail');
        }
    });

    /**
     * Ajax Backend
     */
    Route::group(['prefix' => 'ajax', 'namespace' => 'Ajax\Backend'], function () {
        Route::post('login', 'UserController@login');
        Route::post('register', 'UserController@register');

        //role project_mod
        Route::group(['middleware' => 'dprole:post_mod'], function () {
            Route::resource('post', 'PostController');
        });

        //role project_mod
        Route::group(['middleware' => 'dprole:project_mod'], function () {
            Route::resource('project', 'ProjectController');
        });

        //role admin
        Route::group(['middleware' => 'dprole:admin'], function () {
            Route::resource('user', 'UserController');
            Route::resource('category', 'CategoryController');
            Route::resource('backer', 'BackerController');
            Route::resource('blacklist', 'BlacklistController');
            Route::resource('cms', 'CmsController');

            Route::post('send-mail-refund-all-transaction-in-project', 'PaymentController@sendMailRefundAllTransactionInProject');
            Route::get('refund-all-transaction-in-project/{id}', 'PaymentController@refundAllTransactionInProject');
            Route::put('refund-one-transaction-in-project/{id}', 'PaymentController@refundOneTransactionInProject');
            Route::post('mark-refund-all-transaction-in-project', 'PaymentController@markRefundAllTransactionInProject');
            // Route::post('mark-refund-one-transaction-in-project/{id}', 'PaymentController@markRefundOneTransactionInProject');
        });

    });

    /**
     * Ajax Frontend
     */
    Route::group(['prefix' => 'ajax', 'namespace' => 'Ajax\Frontend'], function () {
        Route::get('viewmore_post', 'FrontendController@viewmorePost');
        Route::get('viewmore_tech/{id}/{time}/{condition}', 'FrontendController@viewmoreTech');
        Route::get('searchmore_tech/{key}', 'FrontendController@searchMoreTech');
        Route::get('discovermore', 'FrontendController@discoverMore');
        Route::post('subcribe', 'FrontendController@subcribe');
        Route::resource('update', 'UpdateController');
        Route::resource('reward', 'RewardController');
        Route::get('check-contribute/{reward_id}', 'FrontendController@checkContribute');

        Route::group(['middleware' => 'auth'], function () {
            Route::resource('project.like', 'ProjectLikeController');
            Route::post('upload-file/{project_id}', 'FrontendController@uploadFileToProject');
            Route::get('get-file/{project_id}', 'FrontendController@getFileProject');
            Route::post('delete-file/{project_id}', 'FrontendController@deleteFileProject');
            Route::get('notification', 'FrontendController@notification');
            Route::get('change-notifi-status', 'FrontendController@changeStatus');
        });
    });

    /**
     * Backend
     */
    Route::group(['middleware' => 'auth'], function () {
        Route::group(['namespace' => 'Backend'], function () {
            //role admin
            Route::group(['middleware' => 'dprole:admin'], function () {
                Route::group(['prefix' => 'admin'], function () {
                    Route::resource('cms', 'CmsController');
                    Route::resource('backer', 'BackerController');
                });
                
                Route::resource('user', 'UserController');
                Route::resource('blacklists', 'BlackListController');
                Route::get('export-users', 'UserController@export')->name('export_users');
                Route::resource('category', 'CategoryController');
                Route::get('export-subcribers', 'SubcriberController@export')->name('export_subcribers');
                Route::get('export_backers/{project_id}', 'BackerController@export');
            });

            //role post_mod
            Route::group(['middleware' => ['dprole:post_mod']], function () {
                Route::resource('post', 'PostController');
                Route::get('post/{id}/change-slide-status', 'PostController@changeSlideStatus');
            });

            //role project_mod
            Route::group(['prefix' => 'admin', 'middleware' => ['dprole:project_mod']], function () {
                Route::resource('project', 'ProjectController');
                Route::post('project/{id}/put-to-online', 'ProjectController@putToOnline');
                Route::post('project/{id}/send-to-draft', 'ProjectController@sendToDraft');
                Route::post('project/{id}/send-to-approved', 'ProjectController@sendToApproved');
                Route::post('project/{id}/change-slide-status', 'ProjectController@changeSlideStatus');
                Route::post('project/{id}/change-edit-form-status', 'ProjectController@changeEditFormStatus');
                Route::post('project/{id}/focus', 'ProjectController@focus');
                Route::get('export-projects', 'ProjectController@export')->name('export_projects');
            });

        });
    });
});

Route::group(['namespace' => 'Frontend'], function () {
    // Route::get('category_convert', 'PaymentController@category_convert');
    // Route::get('project_convert', 'PaymentController@project_convert');
    // Route::get('reward_convert', 'PaymentController@reward_convert');
    // Route::get('backer_convert', 'PaymentController@backer_convert');
    // Route::get('user_convert', 'PaymentController@user_convert');
    // Route::get('subcriber_convert', 'PaymentController@subcriber_convert');
    // Route::get('update_convert', 'PaymentController@update_convert');
    // Route::get('post_convert', 'PaymentController@post_convert');
});
