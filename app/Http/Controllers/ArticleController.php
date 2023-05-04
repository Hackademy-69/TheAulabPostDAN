<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class ArticleController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        return view('article.create');
    }

    
    public function store(Request $request)
    {
        

        

        $article = Auth::user()->articles()->create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'img' => $request->file('img')->store('public/img'),
            'category_id' => $request->category_id
        ]);
        
        $tags = explode(', ', $request->tags);

        foreach ($tags as $tag) {
            $newTag = Tag::updateOrCreate([
                'name' => $tag,
            ]);
            
            $article->tags()->attach($newTag);
        }
        
        return redirect()->route('home')->with("message", "Articolo caricato correttamente");
    }

    
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|min:5|unique:articles,title,' . $article->id,
            'subtitle' => 'required|min:5|unique:articles,subtitle,' . $article->id,
            'body' => 'required|min:10',
            'image' => 'image',
            'category' => 'required',
            'tags' => 'required',
        ]);

        $article->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'category_id' => $request->category
        ]);

        if($request->image){
            storage::delete($article->image);
            $article->update([
                'image' => $request->file('image')->store('public/images'),
            ]);
        }

        $tags = explode(' , ', $request->tags);
        $newTags = [];

        foreach($tags as $tag){
            $newTag = Tag::updateOrCreate([
                'name' => $tag,
            ]);
            $newTags[] = $newTag->id;
        }

        $article->tags()->sync($newTags);

        return redirect(route('writer.dashboard'))->with('message', 'Hai correttamente aggiornato l\'articolo scelto');
    }

    
    public function destroy(Article $article)
    {
        foreach($article->tags as $tag){
            $article->tags()->detach($tag);
        }

        $article->delete();

        return redirect(route('writer.dashboard'))->with('message', 'hai correttamente cancellato l\'articolo scelto');
    }

    public function articles_by_category(Category $category){
        $articles = Article::where('category_id', $category->id)->where('is_accepted', true)->orderBy('created_at', 'DESC')->get();


        return view('article.category', compact('articles', 'category'));
    }

    public function articleSearch(Request $request){
        $query = $request->input('query');
        $articles = Article::search($query)->where('is_accepted', true)->orderBy('created_at', 'desc')->get();

        return view('article.search-index', compact('articles', 'query'));
    }
}
