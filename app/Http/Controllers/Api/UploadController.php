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

    /**
     * @OA\Get(
     *      path="/upload/downloadfile",
     *      operationId="download File",
     *      tags={"Upload"},
     *      summary="Download file by url",
     *      description="Download a File",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="path",
     *          description="File path",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="name",
     *          description="File name",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
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
    public function downloadFile(Request $request)
    {
        return $this->UploadQuery->downloadFile($request);
    }

    /**
     * @OA\Get(
     *      path="/upload/getfile",
     *      operationId="get File",
     *      tags={"Upload"},
     *      summary="Get file by url",
     *      description="Return a File",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="path",
     *          description="File path",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
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
    public function getFile(Request $request)
    {
        return $this->UploadQuery->getFile($request);
    }
}