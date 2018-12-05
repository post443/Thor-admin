<?php

namespace App\Http\Controllers\API\HHWQZZL;

use App\Models\HHWQZZL\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
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
     * @param Request $request
     * @param Question $question
     * @return array
     */
    public function create(Request $request,Question $question)
    {
        $res = $question::firstOrNew(['title'=>$request->title,'value'=>$request->value,'first'=>$request->first]);
        try{
            if ($res->exists) throw new \Exception('问题已经存在',401);
            if($res->save()) throw new \Exception('OK',200);
            else throw new \Exception('FIELD',400);
        }catch (\Exception $e){
            return [
                'code' => $e->getCode(),
                'msg' => $e->getMessage()
            ];
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HHWQZZL\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HHWQZZL\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HHWQZZL\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HHWQZZL\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
