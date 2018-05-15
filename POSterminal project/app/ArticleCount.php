<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleCount extends Model
{
    protected $table = 'articleCount';
    
    protected $fillable = [
        'count', 'article_id', 'country_id',
    ];
    
    //one-to-many relathionship with table articles
    public function article()
    {
        return $this->belongsTo('App\Article', 'article_id', 'id');
    }
    
    //one-to-many relathionship with table countries
    public function country()
    {
        return $this->belongsTo('App\Country', 'country_id', 'id');
    }
     
}
