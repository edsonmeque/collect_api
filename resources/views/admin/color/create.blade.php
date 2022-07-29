@extends('admin.index')
@section('content')
<form action="{{route('admin.colors.store')}}" method="post">
    @csrf
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">Formulario de Capacidade de Contentor</h5>
		</div>
								
                                
        <div class="card-body">
        <div class="row g-3 align-items-center justify-content-center">
          <label for="">Cor</label>
         <div>
           <input type="text" id="name" name="name" class="form-control" placeholder="Cor">
         </div>
       <hr>
      <div class="form-group formatters form-control-centered   form-control-lg center">
          <button type="submit" class="btn btn-success">Guarder</button> 
          <a  class="btn btn-warning" href="{{route('admin.colors.index')}}" data-toggle="tooltip" data-placement="capitulo">Voltar</a> 
      </div>
       
        </div>
               
        </div>
      
                    
	</div>

    
</form>

@endsection