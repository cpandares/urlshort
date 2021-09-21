<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\UrlShortener;
use Illuminate\Support\Facades\Validator;

class UrlShortenerController extends Controller
{

    public function index(){
        
        return view('home');
    }


    public function generateUrlShort(Request $request):String {
        
        $toUrl = $request->all(); //Array

        $validate =  Validator::make($toUrl,[
            'to_url' => ['required', 'string', 'max:255'],
           
        ]);

        $url = $toUrl["to_url"];


        $ramdonKey = Str::random(6);

        while(UrlShortener::where(['url_key'=>$ramdonKey])->exists()){
            $ramdonKey = Str::random(6);
        } 

      
            $save =  UrlShortener::create([
                'to_url'=>$url,
                'url_key'=>$ramdonKey
            ]);
        
        
        $result = app()->make('url')->to($ramdonKey);


        return redirect('home')->with('message', $result);
    } 

    


}
