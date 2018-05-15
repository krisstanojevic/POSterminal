@include('header') 

<div id='background'> 
    {{ Form::open(array('url' =>'turnover')) }}
    <p class="white"> Select the period in which you want to see total purchase turnover for countries: </p>
    <br>
    <input type="date" name="from"/>
    <input type="date" name="to"/>
    <input name="submit" type="submit" value="Calculate" class="btn btn-success btn-sm" />
    
    <br><br>
    
    
    {{ Form::close() }}
</div>

@include('scripts')