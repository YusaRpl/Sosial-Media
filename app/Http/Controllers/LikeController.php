<?php

namespace App\Http\Controllers;

use App\Models\like;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class LikeController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $like = new like();
       
            $like->username = $request->username;
            $like->user_id = $request->user_id;
            $like->posting_id = $request->post_id;
            $like->value = $request->value;
            $parameter = like::where('user_id', $request->user_id)->where('posting_id', $request->post_id)->exists();
            if($parameter){
                like::where('user_id', $request->user_id)->where('posting_id', $request->post_id)->delete();
                return response()->json(
                    [
                        'sudah' => true,
                        'message' => 'Data inserted successfully'
                    ]
                    );
            }else{
                $like->save();
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'success'
                    ]
                    );
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(like $like)
    {
        //
    }
}
