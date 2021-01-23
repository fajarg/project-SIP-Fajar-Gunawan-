<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function data(){
        $users = DB::table('users')->paginate(5);

        return view('user.data', ['users' => $users]);   
    }

    public function add(){
        return view('user.add');
    }

    public function addProcess(Request $request){
        DB::table('users')->insert(
            [
            'role_id' => $request->roleid, 
            'name' =>  $request->nama,
            'username' =>  $request->usernama,
            'email' =>  $request->email,
            'password' =>  Hash::make($request->password),
            'created_at' =>  $request->create,
            'updated_at' =>  $request->update,
            ]
        );
        return redirect('user')->with('status', 'Data was added');
    }

    public function edit($id) {
        $users = DB::table('users')->where('id', $id)->first();
        // dd($users);
        return view('user/edit', compact('users'));
    }

    public function editProcess(Request $request, $id){
        DB::table('users')->where('id', $id)
        ->update([
            'role_id' => $request->roleid, 
            'name' =>  $request->nama,
            'username' =>  $request->usernama,
            'email' =>  $request->email,
            'password' => $request->password,
            'created_at' =>  $request->create,
            'updated_at' =>  $request->update,
        ]);
        return redirect('user')->with('status', 'Data was edited');
    }

    public function delete($id) {
        DB::table('users')->where('id', $id)->delete();

        return redirect('user')->with('status', 'Data was deleted');
    }

    public function detail($id) {
        $users = DB::table('users')->where('id', $id)->first();
        // dd($users);
        return view('user/detail', compact('users'));
    }
}
