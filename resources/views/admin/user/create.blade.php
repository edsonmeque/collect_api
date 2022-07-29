@extends('admin.index')

@section('content')
<div class="row">
						<div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Input</h5>
								</div>
								<div class="card-body">
									<input type="text" class="form-control" placeholder="Input">
								</div>
							</div>

							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Textarea</h5>
								</div>
								<div class="card-body">
									<textarea class="form-control" rows="2" placeholder="Textarea"></textarea>
								</div>
							</div>

							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Checkboxes</h5>
								</div>
								<div class="card-body">
									<div>
										<label class="form-check">
            <input class="form-check-input" type="checkbox" value="">
            <span class="form-check-label">
              Option one is this and that&mdash;be sure to include why it's great
            </span>
          </label>
					
									</div>
								</div>
							</div>

						</div>
					


						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded me-1" /> <span class="text-dark"></span>
              </a>
							<div class="dropdown-menu dropdown-menu-end">
                                @if(auth()->user()->isAdmin)
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="user"></i> Admin</a>
								@endif
								<div class="dropdown-divider"></div>
                            

                                <a class="dropdown-item" href="#"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="#" method="POST" class="d-none">
                                        @csrf
                                    </form>
							</div>
                            
						</li>
@endsection