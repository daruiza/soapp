<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Query\Abstraction\IUploadQuery;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    private $UploadQuery;

    public function __construct(IUploadQuery $UploadQuery)
    {
        $this->UploadQuery = $UploadQuery;        
    }

    /**
     * @OA\Post(
     *      path="/upload/photo",
     *      operationId="push User Photo",
     *      tags={"Upload"},
     *      summary="Get User Photo url",
     *      description="Return Url Photo",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(ref="#/components/schemas/Upload")
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      )
     *     )
     */
    public function photo(Request $request)
    {
        return $this->UploadQuery->photo($request);
    }

    

}