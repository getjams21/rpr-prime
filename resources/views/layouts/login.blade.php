<div class="row-fluid" >
	<div class="item bg">
		<img src="components/images/projects/bg-img-2.png" >
		<div class="well" style="padding-top:60px;">
			<div class="caption-bg">
				<div class="container-fluid">
				<div class="col-md-6 col-md-offset-3">
				<div class="well well-bg">
					<center><i class="logo"><img src="components/images/logo/rpr-logo-sm.png" height="125" width="125" class="img-rounded img-responsive"></i>
					<hr class="style-fade">
					<h3><font color="white">Login to your account</font></h3></center>
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
						{{ csrf_field() }}

					<div class="container-fluid">
					<div class="col-md-8 col-md-offset-2">
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
						 <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                         <div class="form-group">
                            <center><div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> <font color="white">Remember Me</font>
                                </label>
                            </div></center>
                         </div>
						<center>
							<div class="form-group">
								{{ Form::Submit('Sign in',['class'=>'btn btn-success square','style'=>'width:50%;']) }}
							</div>
							<a class="btn btn-link" href="{{ url('/password/reset') }}"><font color="white">Forgot Your Password?</font></a>
						</center>
					</div>
					</div>
					</form>
				</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>