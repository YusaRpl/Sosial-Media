<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;

class commentControllser extends Controller
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
        $comment = new comment();

        $comment->user_id = $request->user_id;
        $comment->posting_id = $request->post_id;
        $comment->comment = $request->comment;
        $comment->posting_type = $request->post_type;
        $comment->save();
        return response()->json(
            [
                'sudah' => true,
                'message' => 'Data inserted successfully'
            ]
            );
    }

    public function replyStore(Request $request)
    {
        $comment = new comment();

        $comment->user_id = $request->user_id;
        $comment->posting_id = $request->post_id;
        $comment->comment = $request->comment;
        $comment->parent_id = $request->parent_id;
        $comment->posting_type = $request->post_type;
        $comment->save();
        return response()->json(
            [
                'sudah' => true,
                'message' => 'Data inserted successfully'
            ]
            );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(comment $comment)
    {
        //
    }
}
