<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Auth;


class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
       $todos = Todo::where(['user_id' => Auth::id(), 'status' => 0] )->get();
       $done_todos = Todo::where(['user_id' => Auth::id(), 'status' => 1])->get();
       $data['todos'] = $todos;
       $data['done_todos'] = $done_todos;
       return view('todo.index', $data );
    }

    public function new() {
        return view('todo.new');
    }

    public function save(Request $request) {
        $todo = new Todo;
        $todo->title = $request['todo'];
        $todo->status = 0;
        $todo->user_id = Auth::id();
        $todo->created_at = date('Y-m-d H:i:s');
        $todo->updated_at = date('Y-m-d H:i:s');
        $todo->save();
        return redirect('/');
    }

    public function edit($id = null) {
        $todo = Todo::where('id', $id)->first();
        $data['todo'] = $todo;
        return view('todo.edit', $data);
    }

    public function update(Request $request, $id = null) {
        $todo = Todo::where('id', $id)->first();
        $todo->title = $request['todo'];
        $todo->updated_at = date('Y-m-d H:i:s');
        $todo->update();
        return redirect('/');
    }

    // public function done($id = null) {
    //     $todo = Todo::get($id);
    //     $todo->status = 1;
    //     $todo->save();
    //     return redirect('/');
    // }

    // public function undone($id = null) {
    //     $todo = Todo::get($id);
    //     $todo->status = 0;
    //     $todo->save();
    //     return redirect('/');
    // }

    public function switch_status($id) {
        $todo = Todo::where('id', $id)->first();
        if ($todo->status == 1) {
            $todo->status = 0;
        }else {
            $todo->status = 1;
        }
        $todo->save();
        return redirect('/');
    }

    public function delete($id = null) {
        $todo = Todo::where('id', $id)->first();
        $todo->delete();
        return redirect('/');
    }

}