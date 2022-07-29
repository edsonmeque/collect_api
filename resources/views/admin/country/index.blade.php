@extends('admin.index')

@section('content')
	
<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0"><a href="{{route('admin.countries.create')}}" class="btn btn-info">
                                   + <i class="align-middle" data-feather="flag"></i> Pais
                                    </a></h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
                                            <th class="d-none d-xl-table-cell">Id</th>
											<th>Páis</th>
                                            <th>Capital</th>
											<th class="d-none d-xl-table-cell">created_at</th>
											<th class="d-none d-xl-table-cell">updated_at</th>
                                            <th class="d-none d-xl-table-cell text-center">Action</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach($datas as $country)
										<tr>
											<td>{{$country->id}}</td>
                                            <td>{{$country->name}}</td>
                                            <td>{{$country->capital}}</td>
                                            <td>{{$country->created_at}}</td>
                                            <td>{{$country->updated_at}}</td>
                                            <div class=" text-center">

                                            <form action="{{route('admin.countries.destroy',$country->id)}}" method="post">

                                            @csrf
                                            @method('delete')

                                            <td>
                                                    <a href="{{route('admin.countries.edit',$country->id)}}" class="btn btn-primary"><i class="align-middle" data-feather="edit"></i></a></td>
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