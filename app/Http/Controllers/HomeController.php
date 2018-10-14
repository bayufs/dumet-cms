<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Torann\LaravelMetaTags\Facades\MetaTag;
use App\Categories;
use DB;




class HomeController extends Controller
{
    private $categories;

    public function __construct()
    {
        $this->categories = Categories::all();
    }

    public function index()
    {
        $categories = $this->categories;
        $articles = DB::table('articles')
            ->join('categories', 'categories.id', '=', 'articles.categories_id')
            ->select('articles.*', 'categories.category_name','categories.icon')
            ->orderBy('articles.id','DESC')
            ->simplePaginate(4);

        $mini_post = DB::table('articles')
            ->join('categories', 'categories.id', '=', 'articles.categories_id')
            ->select('articles.images','articles.title','articles.created_at','articles.alt', 'categories.icon')
            ->orderBy('articles.id','DESC')
            ->limit(4)
            ->get();

     
        
        // Section description
        MetaTag::set('title', 'DUMET CMS - Home');

        return view('frontend/content-page.home', compact('articles','categories','mini_post'));
    }

    public function pageByCategory($id)
    {
        $categories = $this->categories;

        $mini_post = DB::table('articles')
            ->join('categories', 'categories.id', '=', 'articles.categories_id')
            ->select('articles.images','articles.title','articles.created_at','articles.alt', 'categories.icon')
            ->orderBy('articles.id','DESC')
            ->limit(4)
            ->get();

        $page_categories = DB::table('articles')
            ->join('categories', 'categories.id', '=', 'articles.categories_id')
            ->select('articles.*', 'categories.category_name','categories.icon')
            ->where('categories.category_name','=',str_replace('-',' ',$id))
            ->orderBy('articles.id','DESC')
            ->simplePaginate(4);
        

       

        MetaTag::set('title', 'DUMET CMS - '.str_replace('-',' ',$id));

        return view('frontend.content-page.page-category', compact('page_categories','mini_post','categories'));
    }

    
}
