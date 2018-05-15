@include('header') 

<div id='background'> 
    {{ Form::open(array('url' =>'logout')) }}
    <input name="logout" type="submit" value="Log Out" class="btn btn-success btn-sm" />
    <input name="turnover" type="button" value="Total purchase turnover" class="btn btn-success btn-sm" onclick="window.location.href = 'turnoverChoose';"/>
    <input name="buy" type="button" value="Buy" class="btn btn-success btn-sm" onclick="window.location.href = 'posTerminal';"/>
    <input name="mybills" type="button" value="My Bills" class="btn btn-success btn-sm" onclick="window.location.href = 'mybills';"/>
    
    <br><br>
    
    <p class="white"> Ten best-selling articles in different countries: </p>
    <div>
        <table id="statistics" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th></th>
                    <?php $i = 0; while($i < 10){ ?>
                        <th class="count"> {{ ++$i }} </th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($countriesArticle as $country => $articles) { ?>
                <tr>
                    <th> {{ $country }} </th>
                    <?php foreach($articles as $name => $num){ ?>
                        <td> <?php if($num != null) {echo $name.' ('. $num .')';} else { echo '';} ?>
                        </td>
                        <?php }?> 
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
    <br>
    
    <p class="white"> Articles that have more than three sales: </p>
    <div>
        <table id="statistics" class="table table-striped table-bordered" cellspacing="0" width="100%" style="width: 50%;">
            <thead>
                <tr>
                    <th class="count"> Articles </th>
                    <th class="count"> Number of sold articles </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($threeArticles as $article) { 
                    if($article->sum > 3){ ?>
                <tr>    
                    <td> <?php echo $article->article->name; ?> </td>
                    <td> <?php echo $article->sum; ?> </td>
                </tr>
                <?php } } ?>
            </tbody>
        </table>
    </div>
    
    <br>
    
    <p class="white"> No articles of this type was sold: </p>
    <div>
        <?php if(!empty($nullArticles)) { ?>
        <table id="statistics" class="table table-striped table-bordered" cellspacing="0" width="100%" style="width: 30%; ">
            <thead>
                <tr>    
                <?php foreach($nullArticles as $article) { ?>
                    <td> <?php echo $article->name; ?> </td>
                <?php } ?>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
        <?php } else { ?>
            <p class="white"> All articles are sold at least one time. </p>
        <?php } ?>
    </div>
    
    
    {{ Form::close() }}
</div>

@include('scripts')