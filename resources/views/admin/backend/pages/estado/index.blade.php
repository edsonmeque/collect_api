@extends('admin.backend.layouts.app')

@section('content')
	
<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0"><a href="{{route('estados.create')}}" class="btn btn-info">
                                   + <i class="align-middle" data-feather="compass"></i> Estado de Contentores
                                    </a></h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
                                            <th class="d-none d-xl-table-cell">Id</th>
											<th>Name</th>
											<th class="d-none d-xl-table-cell">created_at</th>
											<th class="d-none d-xl-table-cell">updated_at</th>
                                            <th class="d-none d-xl-table-cell text-center">Action</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach($datas as $estado)
										<tr>
											<td>{{$estado->id}}</td>
                                            <td>{{$estado->name}}</td>
                                            <td>{{$estado->created_at}}</td>
                                            <td>{{$estado->updated_at}}</td>
                                            <div class=" text-center">

                                            <form action="{{route('estados.destroy',$estado->id)}}" method="post">

                                            @csrf
                                            @method('delete')

                                            <td>
                                                    <a href="{{route('estados.edit',$estado->id)}}" class="btn btn-primary"><i class="align-middle" data-feather="edit"></i></a></td>
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