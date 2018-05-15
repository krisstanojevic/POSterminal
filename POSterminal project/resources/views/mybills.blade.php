@include('header') 

<div id='background'> 
    {{ Form::open(array('url' =>'mybills')) }}
    <input name="logout" type="button" value="Log Out" class="btn btn-success btn-sm" onclick="window.location.href = 'logout';"/>
    <input name="turnover" type="button" value="Total purchase turnover" class="btn btn-success btn-sm" onclick="window.location.href = 'turnoverChoose';"/>
    <input name="statistics" type="button" value="Statistics" class="btn btn-success btn-sm" onclick="window.location.href = 'statistics';"/>
    <input name="buy" type="button" value="Buy" class="btn btn-success btn-sm" onclick="window.location.href = 'posTerminal';"/>
    <br><br><br>

    
    <div>
        <p class="white"> All my bills:</p>
        <?php foreach(array_reverse($billsData) as $pdvid => $articles) { ?>
        <table id="POSarticles" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Article</th>
                    <th>Price (RSD)</th>
                </tr>
            </thead>
            <tbody>
                <tbody>
                <?php foreach($articles as $price => $name) { if($price != 'amount'){ ?>
                    <tr>
                        <td> {{ $name}} </td>
                        <td> {{ $price}} </td>
                    </tr>
                <?php } }?>
                    <tr style="border-top: 6px solid black;border-bottom: 6px solid black;">
                        <th> +PDV </th>
                        <th> {{substr($pdvid, 0, strpos($pdvid, '_'))}} % </th>
                    </tr>
                    <tr>
                        <td> Amount (with PDV in RSD) </td>
                        <td> {{$articles['amount'] * (100 + substr($pdvid, 0, strpos($pdvid, '_'))) / 100}} </td>
                    </tr>
                </tbody>
            </tbody>
            <br>
        </table>
        <?php } ?>
        
    </div>
    
    {{ Form::close() }}
</div>

@include('scripts')