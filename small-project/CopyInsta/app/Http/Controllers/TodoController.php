<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = DB::table('todos')->get();
        return view('todo', ['collection'=>$collection]);
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
        $data = [];
        $newTodo = [
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ];
        array_push($data, $newTodo);
        DB::table('todos')->insert($data);
        return redirect('/todo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('todos')->where('id', $id)->get();
        if (count($data) == 1) {
            return view('show', ['title' => $data[0]->title, 'content' => $data[0]->content, 'id' => $data[0]->id]);
        } else {
            return view('show');
        }        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newTodo = [
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ];
        $affected = DB::table('todos')->where('id', $id)->update($newTodo);
        return redirect('show/' . $id);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('todos')->where('id', $id)->delete();
        return redirect('/todo');
    }
}
