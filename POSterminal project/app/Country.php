<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    protected $fillable = [
        'name', 'pdv'
    ];

    //one-to-many relathionship with table bils
    public function bills()
    {
        return $this->hasMany('App\Bill');
    }
    
    //one-to-many relathionship with table articleCount
    public function articlecounts()
    {
        return $this->hasMany('App\ArticleCount','country_id', 'id');
    }
    
}
