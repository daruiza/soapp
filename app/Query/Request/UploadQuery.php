<?php

namespace App\Query\Request;

use Illuminate\Http\Request;
use App\Query\Abstraction\IUploadQuery;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UploadQuery implements IUploadQuery
{
    public function photo(Request $request)
    {
        try {
            if (!$request->hasFile('file')) {
                return response()->json(['message' => 'No se ha suministrado un Archivo!!!'], 402);
            }

            $validator = Validator::make($request->all(), [
                'file' => 'required|mimes:docx,xlsx,zip,tif,txt,csv,ppt,jpeg,png,jpg,gif,svg,pdf|max:20480'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "message" => "Fallo la Validación",
                    'errors' => $validator->errors()
                ], 500);
            }

            $image_path = $request->file('file')->store($request->input('folder') ?? '', 'public');

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

    public function downloadFile(Request $request){
        try{
            if (!$request->input('path')) {
                return response()->json(['message' => 'No se ha suministrado una ruta de Archivo!!!'], 402);
            }
            $headers = array(
                'Content-Description: File Transfer',
                'Content-Type: application/octet-stream',
                'Content-Disposition: attachment; filename="' . $request->input('name') ?? 'name' . '"',
                );
            return response()->download(public_path($request->input('path')), $request->input('name') ?? 'name', $headers);
            //return response()->file(public_path($request->input('path')));
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
            return response()->file(public_path($request->input('path')), $headers);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 402);
        }
    }
}
