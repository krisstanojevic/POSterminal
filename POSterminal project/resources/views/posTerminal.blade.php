@include('header') 

<div id='background'> 
    {{ Form::open(array('url' =>'posTerminalShop')) }}
    <input name="logout" type="button" value="Log Out" class="btn btn-success btn-sm" onclick="window.location.href = 'logout';"/>
    <input name="turnover" type="button" value="Total purchase turnover" class="btn btn-success btn-sm" onclick="window.location.href = 'turnoverChoose';"/>
    <input name="statistics" type="button" value="Statistics" class="btn btn-success btn-sm" onclick="window.location.href = 'statistics';"/>
    <input name="mybills" type="button" value="My Bills" class="btn btn-success btn-sm" onclick="window.location.href = 'mybills';"/>
    <br><br>
    @if(isset($message))<p class='white'> {{$message}} </p> @endif
    <br>
    <div class='white'>
            <p> Choose country </p> 
            <select id="countries" name="countries">
                <option disabled="disabled" selected="selected">Select an option.</option>
               <?php foreach($countries as $country){  ?>
                <option value="{{$country->id}}">{{$country->name}}</option>
               <?php } ?>
            </select>
    </div>
    
    <div>
        <table id="POSarticles" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Article</th>
                    <th>Price (RSD)</th>
                    <th class="choose">Choose</th>
                </tr>
            </thead>
            <tbody>
                <tbody>
                <?php foreach($articles as $article) { ?>
                    <tr>
                        <td> {{$article->name}} </td>
                        <td> {{ $article->price}} </td>
                        <td> <input name="articleCheck[]" type="checkbox" value="{{$article->id}}_{{$article->price}}"> </td>
                    </tr>
                <?php } ?>
                </tbody>
            </tbody>
            <br>
        </table>
        <input name="posTerminalShop" type="submit" value="Shop!" class="btn btn-success btn-sm posTerminalShop" />
    </div>
    
    {{ Form::close() }}
</div>

@include('scripts')