<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\UrlShortener;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UrlShortenerController extends Controller
{

    public function index()
    {

        return view('home');
    }


    public function generateUrlShort(Request $request): String
    {

        $toUrl = $request->all(); 
        $url = $toUrl["to_url"];      
        $nsfw = $toUrl["nsfw"];

        $validate =  Validator::make($toUrl, [
            'to_url' => ['required', 'url' ],

        ]);

        if($validate->fails()){

            $data = [
                'status'=>'error',
                'code'=>404,
                'msg'=> 'Url not valid',
                'errors'=>$validate->errors()
            ];

            Session::flash('error', __('URL NOT VALID')); 
            return response()->json($data, $data['code']);
        }
      
        $ramdonKey = Str::random(6);

        while (UrlShortener::where(['url_key' => $ramdonKey])->exists()) {
            $ramdonKey = Str::random(6);
        }

        $urlShort = UrlShortener::where(['to_url'=>$url ])->exists();
        

        if($urlShort){
            $visits = UrlShortener::orderBy('id','desc')->limit(1)->get();

            UrlShortener::create([
                'to_url' => $url,
                'url_key' => $ramdonKey,
                'nsfw' => $nsfw,
                'visited' => $visits[0]->visited + 1 
            ]); 

        }else{
              UrlShortener::create([
                'to_url' => $url,
                'url_key' => $ramdonKey,
                'nsfw' => $nsfw,
                'visited' => 1
            ]); 
        }

        


        $result = app()->make('url')->to($ramdonKey);

        return redirect('home')->with('message', $result);

    } 

   

    public function getViewShortPage(){
        
        $visits = UrlShortener::orderBy('visited','desc')->limit(100)->paginate(5);
        
    
           return view('stats', compact('visits'));
    
        }

    
    
}
