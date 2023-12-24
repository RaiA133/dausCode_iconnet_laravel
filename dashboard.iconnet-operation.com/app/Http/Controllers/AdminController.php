<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::latest()->get();
        $auth = Auth::user();

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        
        return view("admin.index", [
          "user"=> $user,
          "title"=> 'Data Admin',
          "auth"=>$auth,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $title = "Data Admin";
      $auth = Auth::user();


        return view("admin.create", compact("title", "auth"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // return $request; 
      $auth = Auth::user();
        User::create($request->all());
      Alert::success('Success', 'User Berhasil di Tambahkan');
        return redirect()->route("admin.index", compact("auth"));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      $auth = Auth::user();
    
        $title = "Edit";
        $user = User::findOrFail($id);
        return view("admin.edit", compact("user","title", "auth"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $auth = Auth::user();
      User::findOrFail($id)->update($request->all());
      User::updated($request->all());
      Alert::success('Success', 'User Berhasil di Update');
      return redirect()->route("admin.index", compact("auth"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
      $user = User::findOrFail($id);
      $user->delete();
      Alert::success('Success', 'User Berhasil Dihapus');
      return redirect()->route('admin.index');
    }
}
