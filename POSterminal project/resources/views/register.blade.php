@include('header') 
<link href="{{asset('css/login.css')}}" rel="stylesheet">


<div class="container singin">
    <div class="row">
        <div class="col-md-12">
       <!--      <div class="pr-wrap">
                <div class="pass-reset">
                    <label>
                        Enter the email you signed up with</label>
                    <input type="email" placeholder="Email" />
                    <input type="submit" value="Submit" class="pass-reset-submit btn btn-success btn-sm" />
                </div>
            </div>-
       -->
            <div class="wrap">
                <p class="form-title">
                    Register</p>
                {{ Form::open(array('url' =>'register', 'class' => 'login')) }}
                <input name="name" type="text" placeholder="Name" />
                <input name="email" type="text" placeholder="Email" />
                <input name="password" type="password" placeholder="Password" />
                <input name="submit" type="submit" value="Register" class="btn btn-success btn-sm" />
     <!--           <div class="remember-forgot">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" />
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 forgot-pass-content">
                            <a href="javascript:void(0)" class="forgot-pass">Forgot Password</a>
                        </div>
                    </div>
                </div>
     -->
               {{ Form::close() }}
            </div>
        </div>
    </div>
  
</div>


@include('scripts')