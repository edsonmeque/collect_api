@extends('admin.backend.layouts.app')
@section('content')
<form action="{{route('unidades.store')}}" method="post">
    @csrf
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">Formulario de Tipo de Material</h5>
		</div>
								
                                
        <div class="card-body">
		    <input type="text" class="form-control" placeholder=" Unidade"  name="name" />
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror                            
        </div>
      
        <button type="submit" class="btn btn-success"> Guardar</button>             
	</div>

    
</form>

@endsection