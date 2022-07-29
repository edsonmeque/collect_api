@extends('admin.index')
@section('content')
<form action="{{route('admin.countries.store')}}" method="post">
    @csrf
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">Formulario de Páis</h5>
		</div>
								
                                
        <div class="card-body">
        <div class="row g-3 align-items-center justify-content-center">
          <label for="">Pais</label>
         <div>
           <input type="text" id="name" name="name" class="form-control" placeholder="name">
         </div>
         <label>Capital</label>
       <div>
           <input type="text" id="capital" name="capital" class="form-control" placeholder="Capital">
       <hr>
      <div class="form-group formatters form-control-centered   form-control-lg center">
          <button type="submit" class="btn btn-success">Guarder</button> 
          <a  class="btn btn-warning" href="{{route('admin.countries.index')}}" data-toggle="tooltip" data-placement="capitulo">Voltar</a> 
      </div>
       
        </div>
               
        </div>
      
                    
	</div>

    
</form>

@endsection