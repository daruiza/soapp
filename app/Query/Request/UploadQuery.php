<?php

namespace App\Query\Request;

use Illuminate\Http\Request;
use App\Query\Abstraction\IUploadQuery;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

use App\Enums\FileTypeEnum;

class UploadQuery implements IUploadQuery
{
    public function photo(Request $request)
    {
        try {
            if (!$request->hasFile('file')) {
                return response()->json(['message' => 'No se ha suministrado un Archivo!!!'], 402);
            }

            $validator = Validator::make($request->all(), [
                'file' => 'required|mimes:docx,xlsx,zip,tif,txt,csv,ppt,potx,jpeg,png,jpg,gif,svg,pdf|max:20480'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "message" => "Fallo la Validación",
                    'errors' => $validator->errors()
                ], 500);
            }

            // $image_path = $request->file('file')->store($request->input('folder') ?? '', 'public');
            $image_path = $request->file('file')->store($request->input('folder') ?? '', 's3');

            return response()->json([
                'image_path' => $image_path,
                'storage_image_path' => Storage::url($image_path),
                'name' => $request->file('file')->getClientOriginalName(),
                'extension' => $request->file('file')->getClientOriginalExtension(),
                'size' => $request->file('file')->getSize(),
                'mimes' => $request->file('file')->getMimeType(),
                'message' => $request->file('file')->getClientOriginalName().' se ha cargado correctamente',
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 402);
        }
    }

    public function downloadFile(Request $request) {
        try{
            if (!$request->input('path')) {
                return response()->json(['message' => 'No se ha suministrado una ruta de Archivo!!!'], 402);
            }
            $headers = array(
                'Content-Description: File Transfer',
                'Content-Type: application/octet-stream',
                'Content-Disposition: attachment; filename="' . $request->input('name') ?? 'name' . '"',
            );           

            $respuesta = response(Storage::disk('s3')->get($request->input('path')), 200, $headers);
            $respuesta->header("Content-Description", 'File Transfer');
            $respuesta->header(
                "Content-Type", 
                FileTypeEnum::type(pathinfo($request->input('path'),PATHINFO_EXTENSION))            
            );
            $respuesta->header("Content-Disposition", 'attachment; filename="'.$request->input('name') ?? 'name'.'"');
                        
            // return response(Storage::disk('s3')->get($request->input('path')), 200, $headers);
            // return response()->download(public_path($request->input('path')), $request->input('name') ?? 'name', $headers);
            return $respuesta;           
            
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 402);
        }
    }

    public function getFile(Request $request){
        try{
            if (!$request->input('path')) {
                return response()->json(['message' => 'No se ha suministrado una ruta de Archivo!!!'], 402);
            }
            $headers = array(
                'Content-Description: File Transfer',
                'Content-Type: application/octet-stream',
                );            
            // return response()->file(public_path($request->input('path')), $headers);
            return response()->file(Storage::disk('s3')->get($request->input('path')), $headers);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 402);
        }
    }

    public static function deleteFile(Request $request) {
        try{
            if (!$request->input('path')) {
                return response()->json(['message' => 'No se ha suministrado una ruta de Archivo!!!'], 402);
            }                 

            if(Storage::disk('s3')->exists($request->input('path'))){
                return response(Storage::disk('s3')->delete($request->input('path')));                
            } else {
                Log::notice('Borrar Archivo fallo: '.$request->input('path'));
            }

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 402);
        }
    }

    public static function deleteDirectory(Request $request) {
        try{
            if (!$request->input('path')) {
                return response()->json(['message' => 'No se ha suministrado una ruta de Directorio!!!'], 402);
            }

            if(Storage::disk('s3')->exists($request->input('path'))){
                return response(Storage::disk('s3')->deleteDirectory($request->input('path')));                
            } else {
                Log::notice('Borrar directorio fallo: '.$request->input('path'));
            }

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 402);
        }
    }

}
