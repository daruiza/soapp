<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'Api\AuthController@login')->name('login');
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', 'Api\AuthController@logout');
        Route::get('user', 'Api\AuthController@user');
    });
});

Route::group(['prefix' => 'commerce'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\CommerceController@index');
        Route::post('store', 'Api\CommerceController@store');
        Route::put('update/{id}', 'Api\CommerceController@update');
        Route::get('showbycommerceid/{id}', 'Api\CommerceController@showByCommerceId');
        Route::get('showbyuserid/{id}', 'Api\CommerceController@showByUserId');
        Route::delete('destroy/{user_id}', 'Api\CommerceController@destroy');
    });
});

Route::group(['prefix' => 'user'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\UserController@index');
        Route::post('store', 'Api\UserController@store');
        Route::put('update', 'Api\UserController@update');
        Route::put('update/{user_id}', 'Api\UserController@updateById');
        Route::get('showbyuserid/{user_id}', 'Api\UserController@showByUserId');
        Route::get('showbyrolid/{rol_id}', 'Api\UserController@showByRolId');
        Route::delete('destroy/{user_id}', 'Api\UserController@destroy');
    });
});

Route::group(['prefix' => 'upload'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('photo', 'Api\UploadController@photo');
        Route::get('downloadfile', 'Api\UploadController@downloadFile');        
        Route::get('getfile', 'Api\UploadController@getFile');
    });
});

Route::group(['prefix' => 'rol'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\RolController@index');
    });
});

Route::group(['prefix' => 'generallist'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\GeneralListController@index');
        Route::get('showbyid/{id}', 'Api\GeneralListController@showById');
        Route::get('showbyname', 'Api\GeneralListController@showByName');
        Route::get('showbynamelist', 'Api\GeneralListController@showByNameList');        
        Route::post('store', 'Api\GeneralListController@store');
        Route::delete('destroy/{id}', 'Api\GeneralListController@destroy');
        Route::put('update/{id}', 'Api\GeneralListController@update');

    });
});

Route::group(['prefix' => 'employee'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\EmployeeController@index');
        Route::post('store', 'Api\EmployeeController@store');
        Route::put('update/{id}', 'Api\EmployeeController@update');
        Route::get('showbyemployeeid/{user_id}', 'Api\EmployeeController@showByEmployeeId');
        Route::delete('destroy/{id}', 'Api\EmployeeController@destroy');
    });
});

Route::group(['prefix' => 'report'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\ReportController@index');
        Route::post('store', 'Api\ReportController@store');
        Route::put('update/{id}', 'Api\ReportController@update');
        Route::get('showbyreportid/{id}', 'Api\ReportController@showByReportId');
        Route::delete('destroy/{id}', 'Api\ReportController@destroy');
    });
});

Route::group(['prefix' => 'employeereport'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\EmployeeReportController@index');
        Route::post('store', 'Api\EmployeeReportController@store');
        Route::put('update/{id}', 'Api\EmployeeReportController@update');
        Route::get('showbyemployeereportid/{id}', 'Api\EmployeeReportController@showByEmployeeReportId');
        Route::delete('destroy/{id}', 'Api\EmployeeReportController@destroy');
    });
});

Route::group(['prefix' => 'evidence'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\EvidenceController@index');
        Route::post('store', 'Api\EvidenceController@store');
        Route::post('arraystore', 'Api\EvidenceController@arrayStore');
        Route::put('update/{id}', 'Api\EvidenceController@update');
        Route::get('showbyevidenceid/{id}', 'Api\EvidenceController@showByEvidenceId');
        Route::get('showbyempoyeereportid/{id}', 'Api\EvidenceController@showByEmployeeReportId');
        Route::delete('destroy/{id}', 'Api\EvidenceController@destroy');
    });
});

Route::group(['prefix' => 'trainingsst'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\TrainingsstController@index');
        Route::post('store', 'Api\TrainingsstController@store');
        Route::put('update/{id}', 'Api\TrainingsstController@update');
        Route::delete('destroy/{id}', 'Api\TrainingsstController@destroy');
        Route::get('showbyreportid/{id}', 'Api\TrainingsstController@showByReportId');
    });
});

Route::group(['prefix' => 'trainingsstevidence'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\TrainingsstEvidenceController@index');
        Route::post('store', 'Api\TrainingsstEvidenceController@store');
        Route::put('update/{id}', 'Api\TrainingsstEvidenceController@update');
        Route::delete('destroy/{id}', 'Api\TrainingsstEvidenceController@destroy');
        Route::get('showbytrainingsstevidenceid/{id}', 'Api\TrainingsstEvidenceController@showByTrainingsstEvidenceId');
        Route::get('showbytrainingsstid/{id}', 'Api\TrainingsstEvidenceController@showByTrainigsstId');
    });
});

Route::group(['prefix' => 'activity'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\ActivityController@index');
        Route::post('store', 'Api\ActivityController@store');
        Route::put('update/{id}', 'Api\ActivityController@update');
        Route::delete('destroy/{id}', 'Api\ActivityController@destroy');
        Route::get('showbyreportid/{id}', 'Api\ActivityController@showByReportId');
    });
});

Route::group(['prefix' => 'activityevidence'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\ActivityEvidenceController@index');
        Route::post('store', 'Api\ActivityEvidenceController@store');
        Route::put('update/{id}', 'Api\ActivityEvidenceController@update');
        Route::delete('destroy/{id}', 'Api\ActivityEvidenceController@destroy');
        Route::get('showbyactivityevidenceid/{id}', 'Api\ActivityEvidenceController@showByActivityEvidenceId');
        Route::get('showbyactivityid/{id}', 'Api\ActivityEvidenceController@showByActivityId');
    });
});

Route::group(['prefix' => 'compromise'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\CompromiseController@index');
        Route::post('store', 'Api\CompromiseController@store');
        Route::put('update/{id}', 'Api\CompromiseController@update');
        Route::delete('destroy/{id}', 'Api\CompromiseController@destroy');
        Route::get('showbyreportid/{id}', 'Api\CompromiseController@showByReportId');
    });
});

Route::group(['prefix' => 'compromiseevidence'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\CompromiseEvidenceController@index');
        Route::post('store', 'Api\CompromiseEvidenceController@store');
        Route::put('update/{id}', 'Api\CompromiseEvidenceController@update');
        Route::delete('destroy/{id}', 'Api\CompromiseEvidenceController@destroy');
        Route::get('showbycompromiseevidenceid/{id}', 'Api\CompromiseEvidenceController@showByCompromiseEvidenceId');
        Route::get('showbycompromiseid/{id}', 'Api\CompromiseEvidenceController@showByCompromiseId');
    });
});

Route::group(['prefix' => 'compromisesst'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\CompromiseSSTController@index');
        Route::post('store', 'Api\CompromiseSSTController@store');
        Route::put('update/{id}', 'Api\CompromiseSSTController@update');
        Route::delete('destroy/{id}', 'Api\CompromiseSSTController@destroy');
        Route::get('showbyreportid/{id}', 'Api\CompromiseSSTController@showByReportId');
    });
});

Route::group(['prefix' => 'compromisesstevidence'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\CompromiseSSTEvidenceController@index');
        Route::post('store', 'Api\CompromiseSSTEvidenceController@store');
        Route::put('update/{id}', 'Api\CompromiseSSTEvidenceController@update');
        Route::delete('destroy/{id}', 'Api\CompromiseSSTEvidenceController@destroy');
        Route::get('showbycompromiseevidenceid/{id}', 'Api\CompromiseSSTEvidenceController@showByCompromiseEvidenceId');
        Route::get('showbycompromiseid/{id}', 'Api\CompromiseSSTEvidenceController@showByCompromiseId');
    });
});

