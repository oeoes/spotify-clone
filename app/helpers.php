<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('fileUpload')) {
    function uploadPublicFile($request, $req_file, $dir, $file_name)
    {
        $path = $request->file($req_file)->storePubliclyAs($dir, $file_name, 'public');
        return $path;
    }
}

if (!function_exists('removeUploadedFile')) {
    function removeUploadedFile($path = array())
    {
        Storage::disk('public')->delete($path);
    }
}

if (!function_exists('extractUrl')) {
    function extractUrl($url, $start_index)
    {
        $result_url = implode('/', array_slice(explode('/', $url), $start_index));
        return $result_url;
    }
}

if (!function_exists('returnResponse')) {
    function returnResponse($status, $code, $message, $data = null, $headers = [])
    {
        return response()->json([
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'data' => $data
        ], $code)->withHeaders($headers);
    }
}
