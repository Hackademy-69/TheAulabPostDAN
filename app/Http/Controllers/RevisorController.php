<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function revisor_dashboard(){
        $articles = Article::where('is_accepted', false)->get();

        return view('revisor.dashboard', compact('articles'));
    }

    public function article_detail(Article $article){
        return view('revisor.article-detail', compact('article'));
    }

    public function accept_article(Article $article){
        $article->is_accepted = true;
        $article->save();

        return redirect()->route('revisor.dashboard');
    }

    public function reject_article(Article $article){
        $article->is_accepted = false;
        $article->save();

        return redirect()->route('revisor.dashboard');
    }
}
