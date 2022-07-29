@extends('admin.backend.layouts.app1')

@section('content')
<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Bem vindo ,ao</h1>
							<p class="lead">
                            Sistema de Gestão de Residous Solidos Urbanos 
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
										<img src="{{asset('assets/img/avatars/avatar.jpg')}}" alt="Charles Hall" class="img-fluid rounded-circle" width="132" height="132" />
									</div>
									<form method="POST" action="{{ route('login') }}">
                                    @csrf
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input id="email"  class="form-control form-control-lg @error('email') is-invalid @enderror"  value="{{ old('email') }}"type="email" required name="email" placeholder="Enter your email" />
                                            @error('email')
                                              <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                              </span>
                                            @enderror
                                        </div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input id="password" class="form-control form-control-lg  @error('password') is-invalid @enderror" type="password" name="password" required placeholder="Enter your password" />
                                        @error('password')
                                              <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                              </span>
                                        @enderror
                                            <small>
            <a href="index.html">Forgot password?</a>
          </small>
										</div>
										<div>
											<label class="form-check">
            <input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked id="remember" {{ old('remember') ? 'checked' : '' }}>
            <span class="form-check-label">
              Remember me next time
            </span>
          </label>
										</div>
										<div class="text-center mt-3">
											<!-- <button type="submit" class="btn btn-lg btn-primary">Sign in</button> -->
                                            <button type="submit" class="btn btn-lg btn-primary">
                                            {{ __('Entrar') }}
                                            </button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>
@endsection
