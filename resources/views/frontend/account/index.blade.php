@extends('frontend.layout.default')
@section('contenu')
<section class="my_account_area pt--80 pb--55 bg--white">
			
			<div class="container">
			<hr>
			<div class="row">
				<h6>Identifiez_vous</h6>
				</div>
				<hr>
				<div class="row">
				
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
						<div class="card">
                <div class="card-header"><h3>{{ __('Login') }}</h3></div>
							
							<form action="{{ route('seconnecter') }}">
								<div class="account__form">
									<div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
									<div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
									 <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
						<div class="form-group row mb-0">
						<div class="col-md-8 offset-md-4">
						<button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
								
						@if (Route::has('password.request'))
                                    <a class="forget_pass" href="{{ route('password.request') }}">
												{{ __('	 oublier votre mot de passe?') }}
                                    </a>
                                @endif
								</div>
								</div>	
								</div>
							</form>
						</div>
					</div>
					</div>
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Register</h3>
							<form action="#">
								<div class="account__form">
									<div class="input__box">
										<label>Email address <span>*</span></label>
										<input type="email">
									</div>
									<div class="input__box">
										<label>Password<span>*</span></label>
										<input type="password">
									</div>
									<div class="form__btn">
										<button>Register</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		@endsection