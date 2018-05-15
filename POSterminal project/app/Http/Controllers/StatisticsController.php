<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Article;
use App\Bill;
use App\Country;
use App\ArticleCount;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    /**
     * Preparing data for statistics view
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        $articles = Article::orderBy('name')->pluck('name', 'price')->all();
        
        //ten best-selling articles for every country
        $countriesArticle = array();
        foreach ($countries as $country) { 
            $countryArticleCount = $country->articlecounts; 
            $countryArticle = array();
            
            foreach($countryArticleCount as $count) {
                $countryArticle[$count->article->name] = $count->count;
                arsort($countryArticle); 
            }
            $countriesArticle[$country->name] = array_slice($countryArticle, 0, 10); 
        }
        
        //articles that are sold more than three times
        $threeArticles = ArticleCount::groupBy('article_id')->selectRaw('article_id, sum(count) as sum')->get();

        //articles that are not sold
        $nullArticles = DB::select('SELECT a1.name from articles as a1 left join article_bill as a2 on a1.id = a2.article_id where a2.article_id is null');

        return view('statistics', ['articles' => $articles, 'countriesArticle' => $countriesArticle, 'threeArticles' => $threeArticles, 'nullArticles' => $nullArticles]);
    }

    
    /**
     * Taking all bills that logged user made
     *
     * @return \Illuminate\Http\Response
     */
    public function mybills()
    {
        $user_id = Auth::id();
        $myBills = Bill::where('user_id', '=', $user_id)->get();
     
        $billsData = array();
        foreach($myBills as $bill){
            $pdv = $bill->country->pdv;
            $articles = $bill->articles;
            $articlesData = array();
            $articlesData['amount'] = 0;
            foreach($articles as $article){
                $articlesData[$article->price] = $article->name;
                $articlesData['amount'] += (int)$article->price;
                $billsData[$pdv.'_'.$bill->id] = $articlesData;
            }
        }
        
        return view('mybills', ['billsData' => $billsData]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
