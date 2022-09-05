<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Carbon;

class TodoController extends Controller
{
    /**
     * Display to-do's
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $todos = Todo::orderBy('created_at', 'asc')->get();
        return view('todo.index', [
            'todos' => $todos
        ]);
    }

    /**
     * Create to-do
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        
    }

    /**
     * Store new to-do
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->completed = $request->completed;
        $todo->save();
        return redirect('/todos');
    }

    /**
     * Show
     *
     * @param  \App\Models\Todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo){
        
    }

    /**
     * Edit to-do
     *
     * @param  \App\Models\Todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo){
        //
    }

    /**
     * Update to-do
     *
     * @param  \Illuminate\Http\Request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $existingTodo = Todo::find($id);  

        if($existingTodo){
            $existingTodo->completed = $request->item["completed"] ? true : false; #check if it is true, if it is set it true 
            $existingTodo->completed_at = $request->item["completed"] ? Carbon::now() : null;
            $existingTodo->save();
            return redirect('/todos');
        } 
        return "Item not found";
    }

    /**
     * Delete to-do
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $existingTodo = Todo::find($id);

        if($existingTodo){
            $existingTodo->delete();
            return "Item deleted";
        }
        return "Item not found";
    }

    /**
     * Many to many user - to-do
     *
     */
    public function assign(Request $request){
        $todo = Todo::find($request->todo);
        $user = $request->users;
        $todo->users()->attach($user);
        return redirect('/todos');
    }

    /**
     * List to-do's
     *
     */
    public function todos(Request $request){
        $todos = $request->user()->todos;
        return view('todo.index', [
            'todos' => $todos
        ]);

    }
}
