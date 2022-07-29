@extends('admin.index')
@section('content')
<form action="{{route('admin.typecontainers.store')}}" method="post">
    @csrf
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">Formulario de Tipo de Material de Contentor</h5>
		</div>
								
                                
        <div class="card-body">
		    <input type="text" class="form-control" placeholder=" Tipo de Material"  name="name" />
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror                            
        </div>
      <hr>
        <button type="submit" class="btn btn-success"> Guardar</button>             
	</div>

    
</form>

@endsection