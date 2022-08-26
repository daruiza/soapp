<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="SOAPP Documentación",
 *      description="Salud Ocupacional APP",
 *      
 *      @OA\Contact(
 *          email="daruiza@gmail.com"
 *      ),
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="SOAPP API Server"
 * )
 *
 * @OA\Tag(
 *     name="Auth",
 *     description="API EndPoints of Auth"
 * ) 
 *   
 * @OA\SecuritySchemes(
 *     securityDefinition="bearer",
 *     type="apiKey",
 *     in="header",
 *     name="Authorization"
 * )
 * 
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
