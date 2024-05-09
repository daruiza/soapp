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

Route::group(['prefix' => 'complianceschedule'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\compliancescheduleController@index');
        Route::post('store', 'Api\compliancescheduleController@store');
        Route::put('update/{id}', 'Api\compliancescheduleController@update');
        Route::delete('destroy/{id}', 'Api\compliancescheduleController@destroy');
        Route::get('showbyreportid/{id}', 'Api\compliancescheduleController@showByReportId');
    });
});

Route::group(['prefix' => 'compliancescheduleevidence'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\compliancescheduleEvidenceController@index');
        Route::post('store', 'Api\compliancescheduleEvidenceController@store');
        Route::put('update/{id}', 'Api\compliancescheduleEvidenceController@update');
        Route::delete('destroy/{id}', 'Api\compliancescheduleEvidenceController@destroy');
        Route::get('showbycompliancescheduleevidenceid/{id}', 'Api\compliancescheduleEvidenceController@showBycompliancescheduleEvidenceId');
        Route::get('showbycompliancescheduleid/{id}', 'Api\compliancescheduleEvidenceController@showBycompliancescheduleId');
    });
});

Route::group(['prefix' => 'complianceschedulesst'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\compliancescheduleSSTController@index');
        Route::post('store', 'Api\compliancescheduleSSTController@store');
        Route::put('update/{id}', 'Api\compliancescheduleSSTController@update');
        Route::delete('destroy/{id}', 'Api\compliancescheduleSSTController@destroy');
        Route::get('showbyreportid/{id}', 'Api\compliancescheduleSSTController@showByReportId');
    });
});

Route::group(['prefix' => 'complianceschedulesstevidence'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\compliancescheduleSSTEvidenceController@index');
        Route::post('store', 'Api\compliancescheduleSSTEvidenceController@store');
        Route::put('update/{id}', 'Api\compliancescheduleSSTEvidenceController@update');
        Route::delete('destroy/{id}', 'Api\compliancescheduleSSTEvidenceController@destroy');
        Route::get('showbycompliancescheduleevidenceid/{id}', 'Api\compliancescheduleSSTEvidenceController@showBycompliancescheduleEvidenceId');
        Route::get('showbycompliancescheduleid/{id}', 'Api\compliancescheduleSSTEvidenceController@showBycompliancescheduleId');
    });
});

Route::group(['prefix' => 'complianceschedulersst'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\compliancescheduleRSSTController@index');
        Route::post('store', 'Api\compliancescheduleRSSTController@store');
        Route::put('update/{id}', 'Api\compliancescheduleRSSTController@update');
        Route::delete('destroy/{id}', 'Api\compliancescheduleRSSTController@destroy');
        Route::get('showbyreportid/{id}', 'Api\compliancescheduleRSSTController@showByReportId');
    });
});

Route::group(['prefix' => 'complianceschedulersstevidence'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\compliancescheduleRSSTEvidenceController@index');
        Route::post('store', 'Api\compliancescheduleRSSTEvidenceController@store');
        Route::put('update/{id}', 'Api\compliancescheduleRSSTEvidenceController@update');
        Route::delete('destroy/{id}', 'Api\compliancescheduleRSSTEvidenceController@destroy');
        Route::get('showbycompliancescheduleevidenceid/{id}', 'Api\compliancescheduleRSSTEvidenceController@showBycompliancescheduleEvidenceId');
        Route::get('showbycompliancescheduleid/{id}', 'Api\compliancescheduleRSSTEvidenceController@showBycompliancescheduleId');
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

Route::group(['prefix' => 'complianceschedule'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\ComplianceScheduleController@index');
        Route::post('store', 'Api\ComplianceScheduleController@store');
        Route::put('update/{id}', 'Api\ComplianceScheduleController@update');
        Route::delete('destroy/{id}', 'Api\ComplianceScheduleController@destroy');
        Route::get('showbyreportid/{id}', 'Api\ComplianceScheduleController@showByReportId');
    });
});

Route::group(['prefix' => 'compliancescheduleevidence'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\ComplianceScheduleEvidenceController@index');
        Route::post('store', 'Api\ComplianceScheduleEvidenceController@store');
        Route::put('update/{id}', 'Api\ComplianceScheduleEvidenceController@update');
        Route::delete('destroy/{id}', 'Api\ComplianceScheduleEvidenceController@destroy');
        Route::get('showbycompliancescheduleevidenceid/{id}', 'Api\ComplianceScheduleEvidenceController@showByComplianceScheduleEvidenceId');
        Route::get('showbycompliancescheduleid/{id}', 'Api\ComplianceScheduleEvidenceController@showByComplianceScheduleId');
    });
});

