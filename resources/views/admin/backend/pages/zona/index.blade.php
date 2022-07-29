@extends('admin.backend.layouts.app')

@section('content')
	
<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0"><a href="{{route('zonas.create')}}" class="btn btn-info">
                                   + <i class="align-middle" data-feather="corner-right-down"></i> Zona
                                    </a></h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
                                            <th class="d-none d-xl-table-cell">Id</th>
											<th>Name</th>
                                            <th>Bairros</th>
											<th class="d-none d-xl-table-cell">created_at</th>
											<th class="d-none d-xl-table-cell">updated_at</th>
                                            <th class="d-none d-xl-table-cell text-center">Action</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach($datas as $zona)
										<tr>
											<td>{{$zona->id}}</td>
                                            <td>{{$zona->name}}</td>
                                            <td>{{$zona->bairro_key->name}}</td>
                                            <td>{{$zona->created_at}}</td>
                                            <td>{{$zona->updated_at}}</td>
                                            <div class=" text-center">

                                            <form action="{{route('zonas.destroy',$zona->id)}}" method="post">

                                            @csrf
                                            @method('delete')

                                            <td>
                                                    <a href="{{route('zonas.edit',$zona->id)}}" class="btn btn-primary"><i class="align-middle" data-feather="edit"></i></a></td>
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