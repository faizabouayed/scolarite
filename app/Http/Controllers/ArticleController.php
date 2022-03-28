<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function articles(){
        echo "affichage des articles";
    }
    public function article($id){
        echo"affichage de l'article ".$id; 
    } 

    public function newArticle(){
        $newArticle=new Article();
        $newArticle->name="stylo";
        $newArticle->description="stylo a bille de haute qualité....";
        $newArticle->save();
    }
    public function listArticles(){
        $articles = Article::all();
       // print_r($article);
                return view('articles', ['ats'=>$articles]);

    }
   
   
}
