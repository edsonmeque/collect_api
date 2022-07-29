@extends('admin.index')

@section('content')
<main class="content">
				<div class="container-fluid p-0">
					<div class="row">
						<div class="col-md-4 col-xl-3">
							<div class="card mb-3">
								<div class="card-header">
									<h5 class="card-title mb-0">Detalhe de Perfil</h5>
								</div>
								<div class="card-body text-center">
                            
									<img src="{{asset('assets/img/avatar-4.jpg')}}" alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="128" height="128" />
									<h5 class="card-title mb-0">{{$data->name}}</h5>
									<div class="text-muted mb-2">Privilégio: 
                                        @if($data->role_id==2) 
                                             Secretario
                                        @elseif($data->role_id==1) 
                                             Admin
                                        @else
                                        
                                        Usuário Normal 
                                        @endif</div>
								</div>
							</div>
						</div>

						<div class="col-md-8 col-xl-9">
							<div class="card">
								<div class="card-header">

									<h5 class="card-title mb-0">Outros Detalhes</h5>
								</div>
								<div class="card-body h-100">

									<div class="d-flex align-items-start">
										E-mail: {{$data->email}}
									</div>
									<hr />
                                    <div class="d-flex align-items-start">
										Telefone :{{$data->phone}}
									</div>
                                    <hr />
                                    <div class="d-flex align-items-start">
                                    Data de Criação: {{$data->created_at}}                         |                  Data de Atualização : {{$data->updated_at}}
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>
					
@endsection