@extends('admin.index')
@section('content')
<form action="{{route('admin.capacities.store')}}" method="post">
    @csrf



    
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">Formulario de Contentores de Residous Solidos </h5>
		</div>				              
        <div class="card-body">  
        <div>
        


<div class="row">


   <div class="col-md-4">
	 <div class="form-group">
       <label for="capacity_max">Capacidade útil do coletor (70 % do volume)</label>  
          <input type="text" id="capacity_max" name="capacity_max" class="form-control" placeholder="Serial">
	 </div>
   </div>

   <div class="col-md-4">
	 <div class="form-group">
        <label>Peso específico médio do resíduo domiciliar</label>
	     <input type="text" id="peso" name="peso" class="form-control" placeholder="Numero">
	 </div>
   </div>

   <div class="col-md-4">
	 <div class="form-group">
        <label for="generated_capitetion">Geração per capita utilizada</label>
        <input type="text" id="generated_capitetion" name="generated_capitetion" class="form-control"  placeholder="Tags">
	 </div>
   </div>

   
   <div class="col-md-4">
	 <div class="form-group">
       <label for="capacity_storege">Capacidade Total</label>  
          <input type="text" id="capacity_storege" name="capacity_storege" class="form-control" placeholder="Serial">
	 </div>
   </div>

   <div class="col-md-4">
	 <div class="form-group">
        <label name="dias">Intervalo máximo entre as coletas: 3 dias</label>
	     <input type="text" id="dias" name="dias" class="form-control" placeholder="Numero">
	 </div>
   </div>
   
</div>

      <hr>
      <div class="col-auto">
        <input type="submit" class="btn btn-success" value="Guardar" />
        <input type="submit" class="btn btn-warning" value="Cancelar" />
       </div>
   </div>

 
 </div>
    
</form>

@endsection