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

Route::group(['prefix' => 'reportevidence'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\EvidenceController@index');
        Route::post('store', 'Api\EvidenceController@store');
        Route::post('arraystore', 'Api\EvidenceController@arrayStore');
        Route::put('update/{id}', 'Api\EvidenceController@update');
        Route::get('showbyevidenceid/{id}', 'Api\EvidenceController@showByEvidenceId');
        Route::get('showbyreportid/{id}', 'Api\EvidenceController@showByReportId');
        Route::delete('destroy/{id}', 'Api\EvidenceController@destroy');
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

Route::group(['prefix' => 'employeeevidence'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\EmployeeEvidenceController@index');
        Route::post('store', 'Api\EmployeeEvidenceController@store');
        Route::post('arraystore', 'Api\EmployeeEvidenceController@arrayStore');
        Route::put('update/{id}', 'Api\EmployeeEvidenceController@update');
        Route::get('showbyemployeeevidenceid/{id}', 'Api\EmployeeEvidenceController@showByEmployeeEvidenceId');
        Route::get('showbyempoyeereportid/{id}', 'Api\EmployeeEvidenceController@showByEmployeeReportId');
        Route::delete('destroy/{id}', 'Api\EmployeeEvidenceController@destroy');
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

Route::group(['prefix' => 'compromisersst'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\CompromiseRSSTController@index');
        Route::post('store', 'Api\CompromiseRSSTController@store');
        Route::put('update/{id}', 'Api\CompromiseRSSTController@update');
        Route::delete('destroy/{id}', 'Api\CompromiseRSSTController@destroy');
        Route::get('showbyreportid/{id}', 'Api\CompromiseRSSTController@showByReportId');
    });
});

Route::group(['prefix' => 'compromisersstevidence'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\CompromiseRSSTEvidenceController@index');
        Route::post('store', 'Api\CompromiseRSSTEvidenceController@store');
        Route::put('update/{id}', 'Api\CompromiseRSSTEvidenceController@update');
        Route::delete('destroy/{id}', 'Api\CompromiseRSSTEvidenceController@destroy');
        Route::get('showbycompromiseevidenceid/{id}', 'Api\CompromiseRSSTEvidenceController@showByCompromiseEvidenceId');
        Route::get('showbycompromiseid/{id}', 'Api\CompromiseRSSTEvidenceController@showByCompromiseId');
    });
});

Route::group(['prefix' => 'inspectionrsst'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\InspectionRSSTController@index');
        Route::post('store', 'Api\InspectionRSSTController@store');
        Route::put('update/{id}', 'Api\InspectionRSSTController@update');
        Route::delete('destroy/{id}', 'Api\InspectionRSSTController@destroy');
        Route::get('showbyreportid/{id}', 'Api\InspectionRSSTController@showByReportId');
    });
});

Route::group(['prefix' => 'inspectionrsstevidence'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('store', 'Api\InspectionRSSTEvidenceController@store');
        Route::put('update/{id}', 'Api\InspectionRSSTEvidenceController@update');
        Route::delete('destroy/{id}', 'Api\InspectionRSSTEvidenceController@destroy');
        Route::get('showbyinspectionevidenceid/{id}', 'Api\InspectionRSSTEvidenceController@showByInspectionEvidenceId');
        Route::get('showbyinspectionid/{id}', 'Api\InspectionRSSTEvidenceController@showByInspectionId');
    });
});

Route::group(['prefix' => 'correctiversst'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\CorrectiveMonitoringRSSTController@index');
        Route::post('store', 'Api\CorrectiveMonitoringRSSTController@store');
        Route::put('update/{id}', 'Api\CorrectiveMonitoringRSSTController@update');
        Route::delete('destroy/{id}', 'Api\CorrectiveMonitoringRSSTController@destroy');
        Route::get('showbyreportid/{id}', 'Api\CorrectiveMonitoringRSSTController@showByReportId');
    });
});

Route::group(['prefix' => 'correctivemonitoringrsstevidence'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\CorrectiveMonitoringRSSTEvidenceController@index');
        Route::post('store', 'Api\CorrectiveMonitoringRSSTEvidenceController@store');
        Route::put('update/{id}', 'Api\CorrectiveMonitoringRSSTEvidenceController@update');
        Route::delete('destroy/{id}', 'Api\CorrectiveMonitoringRSSTEvidenceController@destroy');
        Route::get('showbycorrectivemonitoringevidenceid/{id}', 'Api\CorrectiveMonitoringRSSTEvidenceController@showByCorrectiveMonitoringEvidenceId');
        Route::get('showbycorrectivemonitoringid/{id}', 'Api\CorrectiveMonitoringRSSTEvidenceController@showByCorrectiveMonitoringId');
    });
});

Route::group(['prefix' => 'supportgroupactivitiy'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\SupportGroupActivityController@index');
        Route::post('store', 'Api\SupportGroupActivityController@store');
        Route::put('update/{id}', 'Api\SupportGroupActivityController@update');
        Route::delete('destroy/{id}', 'Api\SupportGroupActivityController@destroy');
        Route::get('showbyreportid/{id}', 'Api\SupportGroupActivityController@showByReportId');
    });
});

Route::group(['prefix' => 'supportgroupactivitiyevidence'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\SupportGroupActivityEvidenceController@index');
        Route::post('store', 'Api\SupportGroupActivityEvidenceController@store');
        Route::put('update/{id}', 'Api\SupportGroupActivityEvidenceController@update');
        Route::delete('destroy/{id}', 'Api\SupportGroupActivityEvidenceController@destroy');
        Route::get('showbysupportgroupactivityevidenceid/{id}', 'Api\SupportGroupActivityEvidenceController@showBySupportGroupActivityEvidenceId');
        Route::get('showbysupportgroupactivityid/{id}', 'Api\SupportGroupActivityEvidenceController@showBySupportGroupActivityId');
    });
});

Route::group(['prefix' => 'workmanagement'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\WorkManagementController@index');
        Route::post('store', 'Api\WorkManagementController@store');
        Route::put('update/{id}', 'Api\WorkManagementController@update');
        Route::delete('destroy/{id}', 'Api\WorkManagementController@destroy');
        Route::get('showbyreportid/{id}', 'Api\WorkManagementController@showByReportId');
    });
});

Route::group(['prefix' => 'workmanagementevidence'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\WorkManagementEvidenceController@index');
        Route::post('store', 'Api\WorkManagementEvidenceController@store');
        Route::put('update/{id}', 'Api\WorkManagementEvidenceController@update');
        Route::delete('destroy/{id}', 'Api\WorkManagementEvidenceController@destroy');
        Route::get('showbyworkmanagementevidenceid/{id}', 'Api\WorkManagementEvidenceController@showByWorkManagementEvidenceId');
        Route::get('showbyworkmanagementid/{id}', 'Api\WorkManagementEvidenceController@showByWorkManagementId');
    });
});

Route::group(['prefix' => 'equipementmaintenance'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\EquipementMaintenanceController@index');
        Route::post('store', 'Api\EquipementMaintenanceController@store');
        Route::put('update/{id}', 'Api\EquipementMaintenanceController@update');
        Route::delete('destroy/{id}', 'Api\EquipementMaintenanceController@destroy');
        Route::get('showbyreportid/{id}', 'Api\EquipementMaintenanceController@showByReportId');
    });
});

Route::group(['prefix' => 'equipementmaintenanceevidence'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\EquipementMaintenanceEvidenceController@index');
        Route::post('store', 'Api\EquipementMaintenanceEvidenceController@store');
        Route::put('update/{id}', 'Api\EquipementMaintenanceEvidenceController@update');
        Route::delete('destroy/{id}', 'Api\EquipementMaintenanceEvidenceController@destroy');
        Route::get('showbyequipementmaintenanceevidenceid/{id}', 'Api\EquipementMaintenanceEvidenceController@showByEquipementMaintenanceEvidenceId');
        Route::get('showbyequipementmaintenanceid/{id}', 'Api\EquipementMaintenanceEvidenceController@showByEquipementMaintenanceId');
    });
});

