<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class UserController extends Controller
{
    public function index(){
        return User::latest()->get();
    }

    public function store(Request $request){   
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'type' => 'required',
        ]);

        return User::create([
           'name' => $request['name'],
           'email' => $request['email'],
           'password' => Hash::make($request['password']),
           'type' => $request['type'],
        ]);
    }

    public function show($id){
        
    }

    public function update(Request $request, $id){   
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'type' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json([
         'message' => 'User deleted'
        ]);
    }



}
