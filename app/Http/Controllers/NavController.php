<?php

namespace App\Http\Controllers;

use App\Models\Nav;
use Illuminate\Http\Request;

class NavController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function store(Request $request)
    {
        $nav = new Nav;
        $nav->title = $request->title;
        $nav->url = $request->url;
        $nav->note = $request->note;
        $nav->auth = $request->auth;
        if($request->follow){
            $nav->follow = $request->follow;
            $nav->follow_time = $request->follow_time;
            $nav->follow_period = $request->follow_period;
        }
        
        if($nav->save()){
            $response = [
                'code' => 200,
                'msg' => 'OK',
                'data' => null
            ];
        }else{
            $response['code'] = 400;
            $response['msg'] = 'FIELD';
        }
        return $response;
    }
}
