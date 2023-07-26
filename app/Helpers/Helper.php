<?php

namespace App\Helpers;

class Helper
{
    public static function uploadFiles($request, $file, $driver, $folder )
    {
        $url = null;

        if ($request->hasFile($file) && $request->file($file)->isValid()) {          
            $name = date("YmdHis") . uniqid() . '-' . $request->file($file)->getClientOriginalName(); 
            $fileName = "{$name}";            
            $url = $request->$file->storeAs($folder, $fileName, $driver);
        }

        return $fileName;
    }
}