<?php

namespace App\Http\Controllers\general;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageUpload;
use Illuminate\Support\Str;

class generalController extends Controller
{

    public function uploadImage(ImageUpload $request)
    {

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = Str::random(32). '.' . $file->getClientOriginalExtension();;
            $file->storeAs('public/images/'.$request->path,$fileName,['disk' => 'local']);

            return response()->json(['status' => 'success', 'fileName' =>'storage/images/'.$request->path.'/'.$fileName]);
        }

        return response()->json(['status' => 'error', 'message' => 'File not found.'], 400);
    }

}
