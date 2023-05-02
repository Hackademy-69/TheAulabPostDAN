<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
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

    public function editTag(Request $request, Tag $tag){
        $request->validate([
            'name' => 'required|unique:tags',
        ]);
        $tag->update([
            'name' => strtolower($request->name),
        ]);

        return redirect(route('admin.dashboard'))->with('message' , 'Hai corretamente aggiornato il tag');
    }

    public function deleteTag(Tag $tag){
        foreach($tag->articles as $article){
            $article->tags()->detach($tag);
        }
        $tag->delete();

        return redirect(route('admin.dashboard'))->with('message' , 'Hai corretamente eliminato il tag');
        
    }

    public function editCategory(Request $request, Category $category){
        $request->validate([
            'name' => 'required|unique:categories',
        ]);
        $category->update([
            'name' => strtolower($request->name),
        ]);

        return redirect(route('admin.dashboard'))->with('message' , 'Hai corretamente aggiornato la categoria');
    }

    public function deleteCategory(Category $category){
        
        $category->delete();

        return redirect(route('admin.dashboard'))->with('message' , 'Hai corretamente eliminato la categoria');
        
    }

    public function storeCategory(Request $request){
        Category::create([
            'name' => strtolower($request->name),
        ]);

        return redirect(route('admin.dashboard'))->with('message' , 'hai corretamente inserito una nuova categoria');
    }

}
