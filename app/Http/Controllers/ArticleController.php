<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
   public function __construct(){
       return $this->middleware('auth')->except(['index','detail']);
   }
   
   public function index(){

    $data = Article::all();
    // $data = Article::latest()->paginate(5); 

       return view('articles.index',[
           "articles" => $data
       ]);
   }
   public function detail($id){
       $data = Article::find($id);
       return view('articles.detail',[
           "articles" => $data
       ]);
   }
   public function add(){
       $data = [
           ["id"=>1,"name"=>"News"],
           ["id"=>2,"name"=>"Tech"]
       ];
       return view('articles.add',[
           "categories" => $data
       ]);
   }
   public function create(){

        $validator = validator(request()->all(),[
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

       $article = new Article;
       $article->title = request()->title;
       $article->body = request()->body;
       $article->category_id = request()->category_id;
       $article->save();

       return redirect('/articles');

   }
   public function delete($id){
      
       $data = Article::find($id);
       $data->delete();

       return redirect('/articles')->with('info','Article deleted');
   }

   public function update($id){
       $d = Article::find($id);
       return view('articles.update',[
           "data" => $d
       ]);
   }
   public function updateSet($id){
       $validator = validator(request()->all(),[
           'title' => 'required',
           'body' => 'required'
            
       ]);
       if($validator->fails()){
           return back()->withErrors($validator);
       }

       $article = new Article;
       $article->where('id',$id)
               ->update([
                    'title'=> request()->title,
                    'body' => request()->body,
                   
                ]);


       return redirect('/articles')->with('update','Article Updated');
   }
}
