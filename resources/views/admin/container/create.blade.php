@extends('admin.index')
@section('content')
<form action="{{route('admin.containers.store')}}" method="post">
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
    <label for="col-auto">Distrito</label>
       <select class="form-select mb-3" name="district_id" id="district_id">
          <option selected>Selecione</option>
          @foreach($data_district as $data)
          <option value="{{$data->id}}">{{$data->province->country->name}}->{{$data->province->name}}:{{$data->name}}</option>
          @endforeach
       </select>
	 </div>
   </div>

   <div class="col-md-4">
	 <div class="form-group">
       <label for="">Serial</label>  
          <input type="text" id="serial" name="serial" class="form-control" placeholder="Serial">
	 </div>
   </div>

   <div class="col-md-4">
	 <div class="form-group">
        <label>Numero de Contentore</label>
	     <input type="text" id="number" name="number" class="form-control" placeholder="Numero">
	 </div>
   </div>

   <div class="col-md-4">
	 <div class="form-group">
        <label for="">Tags</label>
        <input type="text" id="tags" name="tags" class="form-control"  placeholder="Tags">
	 </div>
   </div>

   <div class="col-md-4">
	 <div class="form-group">
         <label>Capacidades</label> 
          <select class="form-select mb-3" name="capacity_id" id="capacity_id">
          <option selected>Selecione</option>
          @foreach($capacities as $data)
          <option value="{{$data->id}}">Nº de Habitate:{{$data->peoples_number}}</option>
          @endforeach
       </select>
	 </div>
   </div>

   <div class="col-md-4">
	 <div class="form-group">
    <label>Tipos de Contentores</label>
       <select class="form-select mb-3" name="type_container_id" id="type_container_id">
          <option selected>Selecione</option>
          @foreach($types_containers as $data)
          <option value="{{$data->id}}">{{$data->name}}</option>
          @endforeach
       </select>
	 </div>
   </div>

   <div class="col-md-4">
	 <div class="form-group">
    <label>Cores</label>
       
       <select class="form-select mb-3" name="color_id" id="color_id">
          <option selected>Selecione</option>
          @foreach($colors as $data)
          <option value="{{$data->id}}">{{$data->name}}</option>
          @endforeach
       </select>
	 </div>
   </div>

   <div class="col-md-4">
	 <div class="form-group">
    <label>Localizacao [Latitude,Longetude]</label>
       <select class="form-select mb-3" name="localization_id" id="localization_id">
          <option selected>Selecione</option>
          @foreach($localizations as $data)
                <option value="{{$data->id}}">[{{$data->lat}},{{$data->lat}}]</option>
          @endforeach
       </select>
	 </div>
   </div>

   <div class="col-md-4">
	 <div class="form-group">
    <label>Citação</label>
       <select class="form-select mb-3" name="status_id" id="status_id">
          <option selected>Selecione</option>
          @foreach($status as $data)
            @if($data->id!=2 &$data->id!=4&$data->id!=5 & $data->id!=6)
                <option value="{{$data->id}}">{{$data->name}}</option>
             @endif
          @endforeach
      </select>
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