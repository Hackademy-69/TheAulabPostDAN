<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        $adminRequests = User::where('is_admin', NULL)->get();
        $revisorRequests = User::where('is_revisor', NULL)->get();
        $writerRequests = User::where('is_writer', NULL)->get();

        return view('admin.dashboard', compact('adminRequests', 'revisorRequests', 'writerRequests'));
    }

    public function make_user_admin(User $user){
        $user->is_admin = true;
        $user->save();

        return redirect()->route('admin.dashboard');
    }

    public function make_user_revisor(User $user){
        $user->is_revisor = true;
        $user->save();

        return redirect()->route('admin.dashboard');
    }

    public function make_user_writer(User $user){
        $user->is_writer = true;
        $user->save();

        return redirect()->route('admin.dashboard');
    }
}
