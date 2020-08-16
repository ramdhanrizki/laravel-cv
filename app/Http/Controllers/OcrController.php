<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OcrController extends Controller
{
    public function analizeData(Request $request)
    {
        $url = env("AZ_ENDPOINT","")."vision/v3.0/ocr?language=unk&detectOrientation=true";
        $key = env("API_KEY1","");
        $img = $request->file('gambar');
        $imageName = time().'.'.$img->extension();  

        $request->file('gambar')->move(public_path('uploads'), $imageName);
       

        $response = Http::withHeaders([
                'Ocp-Apim-Subscription-Key' => $key,
            ])->post($url, [
                'url' => url('uploads')."/$imageName"
            ]);
        
        return response()->json([
            'status' => 200,
            'message' =>'success',
            'result' => $response->json()
        ]);
    }

    public function example(Request $request)
    {
        return view('implementasi');
    }
}
 