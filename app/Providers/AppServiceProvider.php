<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Http\Controllers\Api\AuthController;
use App\Query\Abstraction\IAuthQuery;
use App\Query\Request\AuthQuery;

use App\Http\Controllers\Api\CommerceController;
use App\Query\Abstraction\ICommerceQuery;
use App\Query\Request\CommerceQuery;

use App\Http\Controllers\Api\UserController;
use App\Query\Abstraction\IUserQuery;
use App\Query\Request\UserQuery;

use App\Http\Controllers\Api\UploadController;
use App\Query\Abstraction\IUploadQuery;
use App\Query\Request\UploadQuery;

use App\Http\Controllers\Api\RolController;
use App\Query\Abstraction\IRolQuery;
use App\Query\Request\RolQuery;

use App\Http\Controllers\Api\EmployeeController;
use App\Query\Abstraction\IEmployeeQuery;
use App\Query\Request\EmployeeQuery;

use App\Http\Controllers\Api\GeneralListController;
use App\Query\Abstraction\IGeneralListQuery;
use App\Query\Request\GeneralListQuery;

use App\Http\Controllers\Api\ReportController;
use App\Query\Abstraction\IReportQuery;
use App\Query\Request\ReportQuery;

use App\Http\Controllers\Api\EvidenceController;
use App\Query\Abstraction\IEvidenceQuery;
use App\Query\Request\EvidenceQuery;

use App\Http\Controllers\Api\EmployeeReportController;
use App\Query\Abstraction\IEmployeeReportQuery;
use App\Query\Request\EmployeeReportQuery;

use App\Http\Controllers\Api\EmployeeEvidenceController;
use App\Query\Abstraction\IEmployeeEvidenceQuery;
use App\Query\Request\EmployeeEvidenceQuery;

use App\Http\Controllers\Api\TrainingsstController;
use App\Query\Abstraction\ITrainingsstQuery;
use App\Query\Request\TrainingsstQuery;

use App\Http\Controllers\Api\TrainingsstEvidenceController;
use App\Query\Abstraction\ITrainingsstEvidenceQuery;
use App\Query\Request\TrainingsstEvidenceQuery;

use App\Http\Controllers\Api\ActivityController;
use App\Query\Abstraction\IActivityQuery;
use App\Query\Request\ActivityQuery;

use App\Http\Controllers\Api\ActivityEvidenceController;
use App\Query\Abstraction\IActivityEvidenceQuery;
use App\Query\Request\ActivityEvidenceQuery;

use App\Query\Abstraction\ICompromiseQuery;
use App\Query\Request\CompromiseQuery;
use App\Http\Controllers\Api\CompromiseController;

use App\Query\Abstraction\ICompromiseEvidenceQuery;
use App\Query\Request\CompromiseEvidenceQuery;
use App\Http\Controllers\Api\CompromiseEvidenceController;

use App\Query\Abstraction\ICompromiseSSTQuery;
use App\Query\Request\CompromiseSSTQuery;
use App\Http\Controllers\Api\CompromiseSSTController;

use App\Query\Abstraction\ICompromiseSSTEvidenceQuery;
use App\Query\Request\CompromiseSSTEvidenceQuery;
use App\Http\Controllers\Api\CompromiseSSTEvidenceController;

use App\Query\Abstraction\ICompromiseRSSTQuery;
use App\Query\Request\CompromiseRSSTQuery;
use App\Http\Controllers\Api\CompromiseRSSTController;

use App\Query\Abstraction\ICompromiseRSSTEvidenceQuery;
use App\Query\Request\CompromiseRSSTEvidenceQuery;
use App\Http\Controllers\Api\CompromiseRSSTEvidenceController;

use App\Query\Abstraction\IInspectionRSSTQuery;
use App\Query\Request\InspectionRSSTQuery;
use App\Http\Controllers\Api\InspectionRSSTController;

use App\Query\Abstraction\IInspectionRSSTEvidenceQuery;
use App\Query\Request\InspectionRSSTEvidenceQuery;
use App\Http\Controllers\Api\InspectionRSSTEvidenceController;

use App\Query\Abstraction\ICorrectiveMonitoringRSSTQuery;
use App\Query\Request\CorrectiveMonitoringRSSTQuery;
use App\Http\Controllers\Api\CorrectiveMonitoringRSSTController;

use App\Query\Abstraction\ICorrectiveMonitoringRSSTEvidenceQuery;
use App\Query\Request\CorrectiveMonitoringRSSTEvidenceQuery;
use App\Http\Controllers\Api\CorrectiveMonitoringRSSTEvidenceController;

use App\Query\Abstraction\ISupportGroupActivityQuery;
use App\Query\Request\SupportGroupActivityQuery;
use App\Http\Controllers\Api\SupportGroupActivityController;

use App\Query\Abstraction\ISupportGroupActivityEvidenceQuery;
use App\Query\Request\SupportGroupActivityEvidenceQuery;
use App\Http\Controllers\Api\SupportGroupActivityEvidenceController;

use App\Query\Abstraction\IWorkManagementQuery;
use App\Query\Request\WorkManagementQuery;
use App\Http\Controllers\Api\WorkManagementController;

use App\Query\Abstraction\IWorkManagementEvidenceQuery;
use App\Query\Request\WorkManagementEvidenceQuery;
use App\Http\Controllers\Api\WorkManagementEvidenceController;

use App\Query\Abstraction\IEquipementMaintenanceQuery;
use App\Query\Request\EquipementMaintenanceQuery;
use App\Http\Controllers\Api\EquipementMaintenanceController;

use App\Query\Abstraction\IEquipementMaintenanceEvidenceQuery;
use App\Query\Request\EquipementMaintenanceEvidenceQuery;
use App\Http\Controllers\Api\EquipementMaintenanceEvidenceController;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IAuthQuery::class, AuthQuery::class);
        $this->app->make(AuthController::class);

        $this->app->bind(ICommerceQuery::class, CommerceQuery::class);
        $this->app->make(CommerceController::class);

        $this->app->bind(IUserQuery::class, UserQuery::class);
        $this->app->make(UserController::class);

        $this->app->bind(IUploadQuery::class, UploadQuery::class);
        $this->app->make(UploadController::class);

        $this->app->bind(IRolQuery::class, RolQuery::class);
        $this->app->make(RolController::class);

        $this->app->bind(IGeneralListQuery::class, GeneralListQuery::class);
        $this->app->make(GeneralListController::class);

        $this->app->bind(IEmployeeQuery::class, EmployeeQuery::class);
        $this->app->make(EmployeeController::class);

        $this->app->bind(IReportQuery::class, ReportQuery::class);
        $this->app->make(ReportController::class);

        $this->app->bind(IEvidenceQuery::class, EvidenceQuery::class);
        $this->app->make(EvidenceController::class);

        $this->app->bind(IEmployeeReportQuery::class, EmployeeReportQuery::class);
        $this->app->make(EmployeeReportController::class);

        $this->app->bind(IEmployeeEvidenceQuery::class, EmployeeEvidenceQuery::class);
        $this->app->make(EmployeeEvidenceController::class);

        $this->app->bind(ITrainingsstQuery::class, TrainingsstQuery::class);
        $this->app->make(TrainingsstController::class);

        $this->app->bind(ITrainingsstEvidenceQuery::class, TrainingsstEvidenceQuery::class);
        $this->app->make(TrainingsstEvidenceController::class);

        $this->app->bind(IActivityQuery::class, ActivityQuery::class);
        $this->app->make(ActivityController::class);

        $this->app->bind(IActivityEvidenceQuery::class, ActivityEvidenceQuery::class);
        $this->app->make(ActivityEvidenceController::class);

        $this->app->bind(ICompromiseQuery::class, CompromiseQuery::class);
        $this->app->make(CompromiseController::class);

        $this->app->bind(ICompromiseEvidenceQuery::class, CompromiseEvidenceQuery::class);
        $this->app->make(CompromiseEvidenceController::class);

        $this->app->bind(ICompromiseSSTQuery::class, CompromiseSSTQuery::class);
        $this->app->make(CompromiseSSTController::class);

        $this->app->bind(ICompromiseSSTEvidenceQuery::class, CompromiseSSTEvidenceQuery::class);
        $this->app->make(CompromiseSSTEvidenceController::class);

        $this->app->bind(ICompromiseRSSTQuery::class, CompromiseRSSTQuery::class);
        $this->app->make(CompromiseRSSTController::class);

        $this->app->bind(ICompromiseRSSTEvidenceQuery::class, CompromiseRSSTEvidenceQuery::class);
        $this->app->make(CompromiseRSSTEvidenceController::class);

        $this->app->bind(IInspectionRSSTQuery::class, InspectionRSSTQuery::class);
        $this->app->make(InspectionRSSTController::class);

        $this->app->bind(IInspectionRSSTEvidenceQuery::class, InspectionRSSTEvidenceQuery::class);
        $this->app->make(InspectionRSSTEvidenceController::class);

        $this->app->bind(ICorrectiveMonitoringRSSTQuery::class, CorrectiveMonitoringRSSTQuery::class);
        $this->app->make(CorrectiveMonitoringRSSTController::class);

        $this->app->bind(ICorrectiveMonitoringRSSTEvidenceQuery::class, CorrectiveMonitoringRSSTEvidenceQuery::class);
        $this->app->make(CorrectiveMonitoringRSSTEvidenceController::class);

        $this->app->bind(ISupportGroupActivityQuery::class, SupportGroupActivityQuery::class);
        $this->app->make(SupportGroupActivityController::class);

        $this->app->bind(ISupportGroupActivityEvidenceQuery::class, SupportGroupActivityEvidenceQuery::class);
        $this->app->make(SupportGroupActivityEvidenceController::class);

        $this->app->bind(IWorkManagementQuery::class, WorkManagementQuery::class);
        $this->app->make(WorkManagementController::class);

        $this->app->bind(IWorkManagementEvidenceQuery::class, WorkManagementEvidenceQuery::class);
        $this->app->make(WorkManagementEvidenceController::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
