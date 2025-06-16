<?php

namespace App\Http\Controllers\Article;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
  public function index()
  {

    $data = Article::all();
    return view('articles.index', [
      'articles' => $data
    ]);
  }

  public function detail($id)
  {
    return "Controller - Article Detail - $id";
  }
}
