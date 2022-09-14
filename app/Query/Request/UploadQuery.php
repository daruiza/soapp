<?php

namespace App\Query\Request;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Query\Abstraction\IUploadQuery;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class UploadQuery implements IUploadQuery
{
    public function photo(Request $request)
    {
        try {
            if (!$request->hasFile('file')) {
                return response()->json(['message' => 'No se ha suministrado un Archivo!!!'], 402);
            }

            $validator = Validator::make($request->all(), [
                'file' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048'
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
                'store_image_path' => Storage::url($image_path),
                'name' => $request->file('file')->getClientOriginalName(),
                'extension' => $request->file('file')->getClientOriginalExtension(),
                'size' => $request->file('file')->getSize(),
                'mimes' => $request->file('file')->getMimeType(),
            ], 200);
            
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 402);
        }
    }
}
