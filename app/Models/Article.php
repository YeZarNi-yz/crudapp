<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
  use HasFactory;

  protected static function booted()
  {
    static::creating(function ($article) {
      if (empty($article->article_tokens)) {
        $article->article_tokens = Str::random(10); // Generates a 10-character random string
      }
    });
  }
}
