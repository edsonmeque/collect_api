@extends('admin.index')

@section('content')

						
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0"><a href="{{route('admin.users.create')}}" class="btn btn-info">
                                    <i class="align-middle" data-feather="user-plus"></i> 
                                    user</a></h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
                                            <th class="d-none d-xl-table-cell">Imagem</th>
											<th>Name</th>
											<th class="d-none d-xl-table-cell">Email</th>
											<th class="d-none d-xl-table-cell">Previlegios</th>
											<th>Tel</th>
                                            <th class="d-none d-md-table-cell">Tipo de Acesso</th>
											<th class="d-none d-md-table-cell">Status</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach($users as $user)
										<tr>
											<td>{{$user->image}}</td>
											<td class="d-none d-xl-table-cell">{{$user->name}}</td>
											<td class="d-none d-xl-table-cell">{{$user->email}}</td>
											<td>roles</td>
											<td class="d-none d-md-table-cell">{{$user->phone}}</td>
                                            <td class="d-none d-md-table-cell">{{$user->type_device}}</td>
                                            <td class="d-none d-md-table-cell">{{$user->status}}</td>
										</tr>
                                        @endforeach
									</tbody>
								</table>
							</div>
					
@endsection
