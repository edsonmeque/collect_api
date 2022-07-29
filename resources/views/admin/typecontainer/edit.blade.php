@extends('admin.index')
@section('content')
<form action="{{route('admin.typecontainers.update',$data->id)}}" method="post">
    @csrf
	@method('put')
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">Formulario de Edição de Tipo de Contentore</h5>
		</div>
								
                                
        <div class="card-body">
		    <input type="text" class="form-control" placeholder="Tipos de Contentores"  name="name"  value="{{$data->name}}" />
                                    
        </div>
      
         
	    <div class="form-group text-left">
		<button type="submit" class="btn btn-primary"> Actualizar</button>  
		<a href= "{{route('admin.typecontainers.index')}}" class="btn btn-warning"> <i class="align-middle" data-feather="arrow-right-circle"></i></a>  
		</div>          
	</div>

    
</form>

@endsection