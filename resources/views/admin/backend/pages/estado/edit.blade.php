@extends('admin.backend.layouts.app')
@section('content')
<form action="{{route('estados.update',$data->id)}}" method="post">
    @csrf
	@method('put')
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">Formulario de Edição  Estado de Contentore</h5>
		</div>
								
                                
        <div class="card-body">
		    <input type="text" class="form-control" placeholder="Contentore"  name="name"  value="{{$data->name}}" />
                                    
        </div>
      
         
	    <div class="form-group text-left">
		<button type="submit" class="btn btn-primary"> Actualizar</button>  
		<a href= "{{route('estados.index')}}" class="btn btn-warning"> <i class="align-middle" data-feather="arrow-right-circle"></i></a>  
		</div>          
	</div>

    
</form>

@endsection