<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Torann\LaravelMetaTags\Facades\MetaTag;
use App\Categories;
use App\Articles;
use DB;




class HomeController extends Controller
{
    private $categories;
    private $mini_post; 

    public function __construct()
    {
        $this->categories = Categories::all();
        $this->mini_post  = DB::table('articles')
            ->join('categories', 'categories.id', '=', 'articles.categories_id')
            ->select('articles.images','articles.title','articles.created_at','articles.alt', 'categories.icon')
            ->orderBy('articles.id','DESC')
            ->limit(4)
            ->get();
    }

    public function index()
    {
        $categories = $this->categories;
        $articles = DB::table('articles')
            ->join('categories', 'categories.id', '=', 'articles.categories_id')
            ->select('articles.*', 'categories.category_name','categories.icon')
            ->orderBy('articles.id','DESC')
            ->simplePaginate(4);
        
        $mini_post = $this->mini_post;
       
        MetaTag::set('title', 'DUMET CMS - Home');

        return view('frontend/content-page.home', compact('articles','categories','mini_post'));
    }

    public function pageByCategory($id)
    {
        $categories = $this->categories;

        $page_categories = DB::table('articles')
            ->join('categories', 'categories.id', '=', 'articles.categories_id')
            ->select('articles.*', 'categories.category_name','categories.icon')
            ->where('categories.category_name','=',str_replace('-',' ',$id))
            ->orderBy('articles.id','DESC')
            ->simplePaginate(4);

        $mini_post = $this->mini_post;

        MetaTag::set('title', 'DUMET CMS - '.str_replace('-',' ',$id));
        MetaTag::set('description', 'Ini adalah halaman website kategori');

        return view('frontend/content-page.page-category', compact('page_categories','mini_post','categories'));
    }

    public function search(Request $request)
    {
        $keyword  = $request->get('keyword');
       
        $articles_search = DB::table('articles')
            ->join('categories', 'categories.id', '=', 'articles.categories_id')
            ->select('articles.*', 'categories.category_name','categories.icon')
            ->where('articles.title','like','%'.$keyword.'%')
            ->orWhere('articles.news','like','%'.$keyword.'%')
            ->orWhere('articles.alt','like','%'.$keyword.'%')
            ->orWhere('categories.category_name','like','%'.$keyword.'%')
            ->orderBy('articles.id','DESC')
            ->simplePaginate(4);
          //dd($articles_search);       
        $articles_search->appends($request->only('keyword'));

        $mini_post = $this->mini_post;
        $categories = $this->categories;

        MetaTag::set('title', 'DUMET CMS - Halaman Pencarian');
        MetaTag::set('description', 'Ini adalah halaman website Pencarian');

        return view('frontend/content-page.page-search', compact('articles_search','mini_post','categories','keyword'));


    }

    
}
