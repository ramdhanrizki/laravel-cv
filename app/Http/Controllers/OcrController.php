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
        // dd($imageName);
        $request->file('gambar')->move(public_path('uploads'), $imageName);
        // dd(base_url());
        // dd($img);
        // // dd(base64_encode($img), 'image/jpeg');
        // $response = Http::asForm()->withHeaders([
        //     'Ocp-Apim-Subscription-Key' => $key,
        //     'Content-Type'=> 'application/octet-stream'
        // ])
        // ->withBody(
        //     base64_encode(file_get_contents($img)), 'image/jpeg'
        // )->post($url);

        // $response = Http::asForm()->withHeaders([
        //     'Ocp-Apim-Subscription-Key' => $key,
        //     'Content-Type'=> 'application/octet-stream'
        // ])
        // ->attach($img)
        // // ->attach(base64_encode(file_get_contents($img)), 'image/jpeg')
        // ->post($url);
        dd(url('uploads')."/$imageName");


        $response = Http::withHeaders([
                'Ocp-Apim-Subscription-Key' => $key,
            ])->post($url, [
                'url' => url('uploads')."/$imageName"
            ]);
        
        dd($response->getBody()->getContents());
        $response->throw();
        dd($response);
        return response()->json($response);
        // dd($response);  
    }
}
 