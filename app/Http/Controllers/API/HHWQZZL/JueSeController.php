<?php

namespace App\Http\Controllers\API\HHWQZZL;

use App\Models\HHWQZZL\JueSe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JueSeController extends Controller
{
    /**
     * 获取人物列表
     * @param JueSe $jueSe
     * @return mixed
     */
    public function index(JueSe $jueSe)
    {
        return [
            'code' => 200,
            'msg' => 'OK',
            'data' => $jueSe->all(['id','name'])
        ];
    }

    /**
     * 创建新角色
     * @param Request $request
     * @param JueSe $jueSe
     * @return array
     */
    public function create(Request $request,JueSe $jueSe)
    {
        $res = $jueSe::firstOrNew(['name'=>$request->name]);
        if($res->exists){
            $response = [
                'code' => 401,
                'msg' => '角色已存在'
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
     * @param  \App\Models\HHWQZZL\JueSe  $jueSe
     * @return \Illuminate\Http\Response
     */
    public function show(JueSe $jueSe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HHWQZZL\JueSe  $jueSe
     * @return \Illuminate\Http\Response
     */
    public function edit(JueSe $jueSe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HHWQZZL\JueSe  $jueSe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JueSe $jueSe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HHWQZZL\JueSe  $jueSe
     * @return \Illuminate\Http\Response
     */
    public function destroy(JueSe $jueSe)
    {
        //
    }
}
