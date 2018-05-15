<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';

    protected $fillable = [
        'amount', 'user_id', 'country_id',
    ];

    
    //one-to-many relathionship with table users
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    //one-to-many relathionship with table countries
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
    
    //many-to-many relathionship with table articles
    public function articles()
    {
        return $this->belongsToMany('App\Article', 'article_bill', 'bill_id', 'article_id');
    }
    
}
