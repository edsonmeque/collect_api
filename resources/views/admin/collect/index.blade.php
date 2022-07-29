@extends('admin.index')

@section('content')
	
<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0"><a href="{{route('admin.collects.create')}}" class="btn btn-info">
                                   + <i class="align-middle" data-feather="package"></i> Província
                                    </a></h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
                                            <th class="d-none d-xl-table-cell">Id</th>
											<th>Users</th>
											<th>Numero</th>
                                            <th>Serial</th>
											<th>Apelido</th>
											<th>Distrito</th>
											<th>Municipios</th>
											<th>Siglas</th>
											<th>Provincia</th>
											<th>Cituacao</th>
											<th class="d-none d-xl-table-cell">Data</th>
											
                                            
										</tr>
									</thead>
									<tbody>
                                    @foreach($datas as $collect)
										<tr>
											<td>{{$collect->id}}</td>
											<td>{{$collect->user->name}}<br />[{{$collect->user->email}}]</td>
                                            <td>{{$collect->container->number}}</td>
                                            <td>{{$collect->container->serial}}</td>
											<td>{{$collect->container->tags}}</td>
											<td>{{$collect->container->district->name}}</td>
											<td>{{$collect->container->district->municipio->name}}</td>
											<td>{{$collect->container->district->municipio->slug}}</td>
											<td>{{$collect->container->district->province->name}}</td>
											<td>
                                                @if($collect->status_id == 6)
                                                <span class="badge bg-danger">Coletado</span>
                                                @elseif($collect->status_id == 4)
                                                <span class="badge bg-success">Alocado</span>
                                                @else
                                                <span class="badge bg-danger">Nao existe Nenhuma opcao valida</span>
                                                @endif
                                            </td>
                                            <td>{{$collect->created_at}}</td>
                                            
                                            
										</tr>
                                        @endforeach
									</tbody>
								</table>
							</div>			
@endsection