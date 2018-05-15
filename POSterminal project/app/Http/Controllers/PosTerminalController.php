<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Bill;
use App\ArticleCount;
use Illuminate\Support\Facades\Auth;
use App\Country;

class PosTerminalController extends Controller
{
    /**
     * Data preparation and redirect to shop page (posTerminal)
     */
    public function index()
    {
        $countries = Country::all();
        $articles = Article::orderBy('name')->get();
        return view('posTerminal', ['articles' => $articles, 'countries' => $countries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Create new bill
     */
    public function createBill($amount, $country, $articlesID)
    {
        $bill = new Bill;
        $bill->amount = $amount;
        $bill->user_id = Auth::id();
        $bill->country_id = $country;
        $bill->save();
        //taking that inserted bill id
        $id = $bill->id;
        //insert rows in relation table article_bill
        Bill::findOrFail($id)->articles()->sync($articlesID);
    }
    
    /**
     * Update tabe articleCount
     */
    public function updateArticleCount($country, $articlesID)
    {
        //increment count or adding new rows to table articleCount
        //(for statistics) after bill is made
        $articlesCount = ArticleCount::where('country_id', '=', $country)->get();
        
        //if some choosen articles for choosen country is in table articleCount,
        //just increment count
        if($articlesCount != null){
            foreach ($articlesCount as $articleCount)
            {   
                //increment for articles that are in table articleCount
                //for choosen country
                if(in_array($articleCount->article_id, $articlesID)) {  
                    ArticleCount::where('country_id', $country)
                            ->where('article_id', $articleCount->article_id)
                            ->increment('count');
                    //deleting that article from our temporary array
                    $key = array_search($articleCount->article_id, $articlesID);
                    unset($articlesID[ $key ]);
                }
            }
            //if there are more articles that are not in table articleCount
            //for choosen country, add new row
            foreach($articlesID as $artID)
            {
                $newArticleCount = new ArticleCount;
                $newArticleCount->article_id = $artID;
                $newArticleCount->country_id = $country;
                $newArticleCount->count = 1;
                $newArticleCount->save();
            }
            
        } else {
            //if there are not any of choosen articles in table articleCount
            //for choosen country, add them all
            foreach($articlesID as $artID)
            {
                $newArticleCount = new ArticleCount;
                $newArticleCount->article_id = $artID;
                $newArticleCount->country_id = $country;
                $newArticleCount->count = 1;
                $newArticleCount->save();
            }
        }
    }


    /**
     * Store created bill in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     */
    public function store(Request $request)
    {
        //check if country and some articles are choosen
        $country = $request->get('countries');
        $articles = $request->get('articleCheck');
        
        $allCountries = Country::all();
        $allArticles = Article::orderBy('name')->get();
            
        if($country == null || $articles == null)
        {
            $message = 'YOU MUST CHOOSE COUNTRY AND AT LEAST ONE ARTICLE!';
            return view('posTerminal', ['articles' => $allArticles, 'countries' => $allCountries, 'message' => $message]);
        }
       
        //country and articles are choosen
        $amount = 0;
        $articlesID = array();
        foreach ($articles as $article)
        {
            //choosen article has this format: id_price
            $amount = $amount + (int)substr($article, strpos($article, '_') + 1, strlen($article));
            $articlesID[] = (int)substr($article, 0, strpos($article, '_'));
        }

        //create new bill
        $this->createBill($amount, $country, $articlesID);
        //update articleCount table for statistics
        $this->updateArticleCount($country, $articlesID);
        
        $message = 'SUCCESSFULLY MADE BILL!';
        return view('posTerminal', ['articles' => $allArticles, 'countries' => $allCountries, 'message' => $message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
