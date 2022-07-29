@extends('admin.index')

@section('content')
	
<div class="card flex-fill">
	<div class="card-header">

	<h5 class="card-title mb-0">
        <a href="{{route('admin.containers.create')}}" class="btn btn-info">
        + <i class="align-middle" data-feather="trash"></i> Contentore
        </a>
    </h5>
	</div>
	<table class="table table-hover my-0">
		<thead>
			<tr class="text-center">
                                            <th>Imagem</th>
											<th>Serial</th>
                                            <th>Numero</th>
                                            <th>Apelido</th>
                                            <th>Distrito</th>
                                            <th>Provincias</th>
                                            <th>status</th>
                                            <th>created_at</th>
                                            <th>updated_at</th>
                                            
                                            <th class="d-none d-xl-table-cell text-center">Action</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach($datas as $container)
										<tr>
                                            <td>
                                                <img src="{{asset('uploads/imagem/'.$container->image)}}" width="70" height="70" alt="">
                                            </td>
                                            <td>{{$container->serial}}</td>
                                            <td>{{$container->number}}</td>
                                            <td>{{$container->tags}}</td>
                                            <td>{{$container->district->name}}</td>
                                            <td>{{$container->district->province->name}}</td>
                                            <td>
                        
                                                @if($container->status_id == 4)
                                                        <span class="badge bg-success">Alocado</span>
                                                   @elseif($container->status_id == 2)
                                                        <span class="badge bg-warning">Cheio</span>
                                                      @elseif($container->status_id == 5)
                                                         <span class="badge bg-danger">desalocado</span>
                                                        @else

                                                @endif
                                            </td>
                                            <td>{{$container->created_at}}</td>
                                            <td>{{$container->updated_at}}</td>
                                           
                                            <div class=" text-center">

                                            <form action="{{route('admin.containers.destroy',$container->id)}}" method="post">
                                            @csrf
                                            @method('delete')

                                            <td>
                                                    <a href="{{route('admin.containers.edit',$container->id)}}" class="btn btn-primary"><i class="align-middle" data-feather="edit"></i></a></td>
                                                <td>
                                                    <button type="submit" class="btn btn-danger"><i class="align-middle" data-feather="trash-2"></i></td></button>
                                                    <td>
                                                    <a href="#" class="btn btn-success"><i class="align-middle" data-feather="map-pin"></i></a></td>
                                                <td>
                                            </form>
                                                    
                                            </div>
										</tr>
                                        @endforeach
									</tbody>
								</table>
							</div>
                            			
@endsection