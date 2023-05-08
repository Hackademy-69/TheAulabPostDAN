<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Mail\RequestRoleMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function home(){
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'DESC')->take(6)->get();

        return view('welcome', compact('articles'));
    }

    public function careers(){
        return view('careers');
    }

    public function about(){
        return view('about');
    }

    public function careers_submit(Request $request){
        $user = Auth::user();

        $role = $request->role;
        $email = $request->email;
        $presentation = $request->presentation;

        $requestMail = new RequestRoleMail(compact('role', 'email', 'presentation'));

        Mail::to('admin@theaulabpost.it')->send($requestMail);

        switch($role){
            case 'admin':
                $user->is_admin = NULL;
                break;
            case 'revisor':
                $user->is_revisor = NULL;
                break;
            case 'writer':
                $user->is_writer = NULL;
                break;
        }

        $user->update();

        return redirect()->route('home')->with('message', 'Grazie per aver inviato la tua candidatura');
    }

}
