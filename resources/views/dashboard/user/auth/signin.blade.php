@extends('dashboard.layouts.master2')
@section('css')
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
	<style>
		.loginForm {display: none};
	</style>
@endsection
@section('content')
		<!-- Page -->
		<div class="page">
			<div class="container-fluid">
				<div class="row no-gutter">
					<!-- The image half -->
					<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
						<div class="row wd-100p mx-auto text-center">
							<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
								<img src="{{URL::asset('dashboard/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
							</div>
						</div>
					</div>
					<!-- The content half -->
					<div class="col-md-6 col-lg-6 col-xl-5">
						<div class="login d-flex align-items-center py-2">
							<!-- Demo content-->
							<div class="container p-0">
								<div class="row">
									<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
										<div class="card-sigin">
											<div class="mb-5 d-flex"> <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('dashboard/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1></div>
											<div class="card-sigin">
												<div class="main-signup-header">
													<h2>{{trans('dashboard/login.welcome') }}</h2>
													@if ($errors->any())
    													<div class="alert alert-danger">
        													<ul>
            													@foreach ($errors->all() as $error)
                													<li>{{ $error }}</li>
           													 @endforeach
        													</ul>
    													</div>
													@endif
													
													<div class="form-group">
														<select class="form-control" id="loginSelect">
															<option value="" disabled selected>{{trans('dashboard/login.select') }}</option>
															<option value="user">{{trans('dashboard/login.user') }}</option>
															<option value="admin">{{trans('dashboard/login.admin') }}</option>
														</select>													
													</div>
                                                    {{-- User Form --}}
													<div class="loginForm" id="user">
														{{-- <h5 class="font-weight-semibold mb-4">الدخول كمستخدم</h5> --}}
														<form method="POST" action="{{ route('login.user') }}">
																@csrf
																<div class="form-group">
																	<label>{{trans('dashboard/login.e-mail') }}</label> <input name="email" id="email" class="form-control" placeholder="{{trans('dashboard/login.enter').' '.trans('dashboard/login.e-mail')}}" type="email" value="{{old('email')}}" required autofocus>
																</div>
																<div class="form-group">
																	<label>{{trans('dashboard/login.password')}}</label> 
																	<input class="form-control" placeholder="{{trans('dashboard/login.enter').' '.trans('dashboard/login.password')}}"                             
																		type="password"
																		name="password"
																		required />
																</div><button type="submit" class="btn btn-main-primary btn-block">{{ trans('dashboard/login.signIn') }}</button>
																<div class="row row-xs">
																	<div class="col-sm-6">
																		<button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>
																	</div>
																	<div class="col-sm-6 mg-t-10 mg-sm-t-0">
																		<button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button>
																	</div>
																</div>
															</form>
														<div class="main-signin-footer mt-5">
															<p><a href="">{{ trans('dashboard/login.forget').' '.trans('dashboard/login.password').' '.trans('dashboard/login.questionMark') }}</a></p>
															<p>{{ trans('dashboard/login.dontHave').' '.trans('dashboard/login.account').' '.trans('dashboard/login.questionMark').' ' }} <a href="{{ url('/' . $page='signup') }}">{{ trans('dashboard/login.create').' '.trans('dashboard/login.account')}}</a></p>
														</div>
													</div>
													{{-- Admin Form --}}
													<div class="loginForm" id="admin">
														{{-- <h5 class="font-weight-semibold mb-4">الدخول كادمن</h5> --}}
														<form method="POST" action="{{ route('login.admin') }}">
															@csrf
															<div class="form-group">
																<label>{{trans('dashboard/login.e-mail') }}</label> <input name="email" id="email" class="form-control" placeholder="{{trans('dashboard/login.enter').' '.trans('dashboard/login.e-mail')}}" type="email" value="{{old('email')}}" required autofocus>
															</div>
															<div class="form-group">
																<label>{{trans('dashboard/login.password')}}</label> 
																<input class="form-control" placeholder="{{trans('dashboard/login.enter').' '.trans('dashboard/login.password')}}"                             
																	type="password"
																	name="password"
																	required />
															</div><button type="submit" class="btn btn-main-primary btn-block">{{ trans('dashboard/login.signIn') }}</button>
															<div class="row row-xs">
																<div class="col-sm-6">
																	<button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>
																</div>
																<div class="col-sm-6 mg-t-10 mg-sm-t-0">
																	<button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button>
																</div>
															</div>
														</form>
														<div class="main-signin-footer mt-5">
															<p><a href="">{{ trans('dashboard/login.forget').' '.trans('dashboard/login.password').' '.trans('dashboard/login.questionMark') }}</a></p>
															<p>{{ trans('dashboard/login.dontHave').' '.trans('dashboard/login.account').' '.trans('dashboard/login.questionMark').' ' }} <a href="{{ url('/' . $page='signup') }}">{{ trans('dashboard/login.create').' '.trans('dashboard/login.account')}}</a></p>
														</div>
													</div>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div><!-- End -->
						</div>
					</div><!-- End -->
				</div>
			</div>
		</div>
		<!-- End Page -->
@endsection
@section('js')
<script>
	$("#loginSelect").change(function() {
		let myId = $(this).val();
		$(".loginForm").each(function () {
			myId === $(this).attr("id") ? $(this).show() : $(this).hide();
		})
	
	})
</script>
@endsection