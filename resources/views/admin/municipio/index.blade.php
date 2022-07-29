@extends('admin.index')

@section('content')
	
<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0"><a href="{{route('admin.municipios.create')}}" class="btn btn-info">
                                   + <i class="align-middle" data-feather="slack"></i> Municipio
                                    </a></h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
                                            <th class="d-none d-xl-table-cell">Id</th>
											<th>Image</th>
                                            <th>Nomes dos Munucipios</th>
                                            <th>Abreturas</th>
                                            <th>Districao</th>
                                            <th>Distritos</th>
											<th class="d-none d-xl-table-cell">created_at</th>
											<th class="d-none d-xl-table-cell">updated_at</th>
                                            <th class="d-none d-xl-table-cell text-center">Action</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach($datas as $municipio)
										<tr>
                                        
											<td>{{$municipio->id}}</td>
                                            <td><img src="{{asset('uploads/imagem/'.$municipio)}}" width="70" height="70" alt=""></td>
                                            <td>{{$municipio->name}}</td>
                                            <td>{{$municipio->slug}}</td>
                                            <td>{{$municipio->description}}</td>
                                            <td>{{$municipio->district->province->name}}:[{{$municipio->district->name}}]</td>
                                            <td>{{$municipio->created_at}}</td>
                                            <td>{{$municipio->updated_at}}</td>
                                            <div class=" text-center">

                                            <form action="{{route('admin.municipios.destroy',$municipio->id)}}" method="post">

                                            @csrf
                                            @method('delete')

                                            <td>
                                                    <a href="{{route('admin.municipios.edit',$municipio->id)}}" class="btn btn-primary"><i class="align-middle" data-feather="edit"></i></a></td>
                                                <td>
                                                    <button type="submit" class="btn btn-danger"><i class="align-middle" data-feather="trash-2"></i></td></button>
                                            </form>
                                                
                                                    
                                            </div>
										</tr>
                                        @endforeach
									</tbody>
								</table>
							</div>			
@endsection