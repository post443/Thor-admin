<?php

namespace App\Http\Controllers\API\HHWQZZL;

use App\Models\HHWQZZL\Word;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * 创建新词条
     * @param Request $request
     * @param Word $word
     * @return array
     */
    public function create(Request $request,Word $word)
    {
        $res = $word::firstOrNew(['title'=>$request->title]);
        if($res->exists){
            $response = [
                'code' => 401,
                'msg' => '词条已存在'
            ];
        }else{
            if($res->save()){
                $response = [
                    'code' => 200,
                    'msg' => 'ok'
                ];
            }else{
                $response = [
                    'code' => 400,
                    'msg' => 'FIELD'
                ];
            }
        }
        return $response;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HHWQZZL\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function show(Word $word)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HHWQZZL\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function edit(Word $word)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HHWQZZL\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Word $word)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HHWQZZL\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function destroy(Word $word)
    {
        //
    }
}
