<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Carbon;

class ItemController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     return Item::orderBy('created_at', 'desc')->get();
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $newItem = new Item;
    //     $newItem->name = $request->item['name'];
    //     $newItem->save();

    //     return $newItem;
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     $existingItem = Item::find($id);  

    //     if($existingItem){
    //         $existingItem->completed = $request->item["completed"] ? true : false; #check if it is true, if it is set it true 
    //         $existingItem->completed_at = $request->item["completed"] ? Carbon::now() : null;
    //         $existingItem->save();

    //         return $existingItem;

    //     } 
    //     return "Item not found";
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     $existingItem = Item::find($id);
    //     if($existingItem){
    //        $existingItem->delete();
    //        return "Item deleted";
    // }
    // return "Item not found";
    // }

    //----------------------------------------------------------------
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * User's tasks.
     *
     * @param  Request  
     * @return Response
     */
    public function index(Request $request){
        $tasks = $request->user()->tasks()->get();
        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    /**
     * New task.
     *
     * @param  Request  
     * @return Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);
        return redirect('/tasks');
    }

    /**
     * Delete task
     *
     * @param  Request  
     * @param  Task  
     * @return Response
     */
    public function destroy(Request $request, Item $task){
        $task->delete();
        return redirect('/tasks');
    }
}
