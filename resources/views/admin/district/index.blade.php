@extends('admin.index')

@section('content')
	
<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0"><a href="{{route('admin.districts.create')}}" class="btn btn-info">
                                   + <i class="align-middle" data-feather="grid"></i> Distrito
                                    </a></h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
                                            <th class="d-none d-xl-table-cell">Id</th>
											<th>Distritos</th>
                                            <th>Provincia</th>
                                            <th>Paises</th>
											<th class="d-none d-xl-table-cell">created_at</th>
											<th class="d-none d-xl-table-cell">updated_at</th>
                                            <th class="d-none d-xl-table-cell text-center">Action</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach($datas as $district)
										<tr>
											<td>{{$district->id}}</td>
                                            <td>{{$district->name}}</td>
                                            <td>{{$district->province->name}}</td>
                                            <td>{{$district->province->country->name}}</td>
                                            <td>{{$district->created_at}}</td>
                                            <td>{{$district->updated_at}}</td>
                                            <div class=" text-center">

                                            <form action="{{route('admin.districts.destroy',$district->id)}}" method="post">

                                            @csrf
                                            @method('delete')

                                            <td>
                                                    <a href="{{route('admin.districts.edit',$district->id)}}" class="btn btn-primary"><i class="align-middle" data-feather="edit"></i></a></td>
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