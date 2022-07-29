@extends('admin.index')

@section('content')
	
<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0"><a href="{{route('admin.provinces.create')}}" class="btn btn-info">
                                   + <i class="align-middle" data-feather="package"></i> Província
                                    </a></h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
                                            <th class="d-none d-xl-table-cell">Id</th>
											<th>Províncias</th>
                                            <th>Páises</th>
											<th class="d-none d-xl-table-cell">created_at</th>
											<th class="d-none d-xl-table-cell">updated_at</th>
                                            <th class="d-none d-xl-table-cell text-center">Action</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach($datas as $province)
										<tr>
											<td>{{$province->id}}</td>
                                            <td>{{$province->name}}</td>
                                            <td>{{$province->country->name}}</td>
                                            <td>{{$province->created_at}}</td>
                                            <td>{{$province->updated_at}}</td>
                                            <div class=" text-center">

                                            <form action="{{route('admin.provinces.destroy',$province->id)}}" method="post">

                                            @csrf
                                            @method('delete')

                                            <td>
                                                    <a href="{{route('admin.provinces.edit',$province->id)}}" class="btn btn-primary"><i class="align-middle" data-feather="edit"></i></a></td>
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