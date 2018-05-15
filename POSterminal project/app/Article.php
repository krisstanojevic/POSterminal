<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    protected $fillable = [
        'name', 'price',
    ];

    //one-to-many relathionship with table articleCount
    public function articlecounts()
    {
        return $this->hasMany('App\ArticleCount');
    }
    
    //many-to-many relathionship with table bills
    public function bills()
    {
        return $this->belongsToMany('App\Bill', 'article_bill', 'article_id', 'bill_id');
    }
    
}
