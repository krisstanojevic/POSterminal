@include('header') 

<div id='background'> 
    {{ Form::open(array('url' =>'logout')) }}
    <input name="submit" type="submit" value="Log Out" class="btn btn-success btn-sm" />
    <input name="submit" type="statistics" value="Statistics" class="btn btn-success btn-sm" onclick="window.location.href = 'statistics';"/>
    <input name="turnover" type="button" value="Total purchase turnover" class="btn btn-success btn-sm" onclick="window.location.href = 'turnoverChoose';"/>
    <input name="submit" type="buy" value="Buy" class="btn btn-success btn-sm" onclick="window.location.href = 'posTerminal';"/>
    <input name="mybills" type="button" value="My Bills" class="btn btn-success btn-sm" onclick="window.location.href = 'mybills';"/>
    <br><br>
    
    <p class="white"> Total purchase turnover: </p>
    <div>
        <?php if(!empty($countries)) { ?>
        <table id="statistics" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="count"> Country </th>
                    <th class="count"> Total amount (RSD) </th>
                    <th class="count"> PDV </th>
                    <th class="count"> Total amount with PDV (RSD) </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($countries as $name => $data) { ?>
                <tr>    
                    <td> {{ $name }} </td>
                    <td> {{ $data[1] }} </td>
                    <td> {{ $data[0] }} </td>
                    <td> {{ $data[1] * (100 + $data[0]) / 100 }} </td>     
                </tr>
                <?php } ?> 
            </tbody>
        </table>
        <?php }else{ ?>
                    <p class="white">There are no bills made in choosen period.</p>
                <?php } ?>
    </div>
    
    <br>
    
    
    {{ Form::close() }}
</div>

@include('scripts')