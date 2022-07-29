<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use File;
use Validation;
use App\Models\Container;
use App\Models\District;
use App\Models\Province;
use App\Http\Resources\ContainerResource;
use App\Http\Resources\DistrictResource;
use App\Http\Resources\ProvinceResource;
use App\Models\user;
class PersonHomeController extends Controller
{
    
    public function getAllProvince(){
        $data = Province::where('country_id', '=', '1')->get();
        return ProvinceResource::collection($data);
    }
    public function searchContainersToDistrict(Request $request)
    {
        $data = Container::where('district_id','=', $request->district_id)
        ->where('status','=',1)->get();
        return $data;
    }
   
// public function reserveImageStatus(Request $request)
// {
//     $data  = Container::where('serial',$request->serial)
//                           ->where('number',$request->number)->first();
//     $data->serial = $request->serial;
//     $data->serial =$request->number;

//     $image =$request->image;
//     $image=str_replace('data:image/png;base,','',$image);
//     $image=str_replace(' ','+',$image);
//     $imageName=time().'png';
//     File::put(public_path('/img'.$imageName),base64_decode($image));
//     $data->image=$fileName;
//     $data->updata();
//     $data=[
//         'success' =>true,
//         'massage'=>$imageName
//     ];
//     return response()->json($data);
// }


public function reserveImageStatus(Request $request)
{
    
    if ($request->image) {
        $folderPath = "uploads/";
        
        $base64Image = explode(";base64,", $request->image);
        $explodeImage = explode("image/", $base64Image[0]);
        $imageName = $explodeImage[1];
        $image_base64 = base64_decode($base64Image[1]);
        $file = $folderPath . uniqid() . '. '.$imageName;

        try {
            $s3Url = $folderPath . $imageName;
            Storage::disk('s3.bucket')->put($s3Url, $base64String, 'public');
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}

     public function reserveImageStatusr(Request $request)
     {
        
          $validator = Validator::make($request->all(),[
             'serial'=>'required|string',
              'number'=>'required|integer',
              'image'=>'nullable|image|mimes:jpg,bmp,png,base64encode',
         ]);

        
         if($validator->fails()){
              return response()->json(['message' => 'Invalid validation', 'errors' =>$validator->errors()],422);
          }

         $dataAll = Container::where('district_id',$request->district_id)->get();
         $data  = $dataAll->where('serial',$request->serial)
         ->where('number',$request->number)->first();
         if($request->hasFile('image')){

              if ($request->image) {
                 $distination = public_path().'/uploads/imagem/'.$data->image;  
                 if(File::exists($distination)){
                     File::delete($distination);     
                 }
                 
             } 
                 $image = base64_encode(file_get_contents($distination));
                
                 $fileName ='imagem-'.time().'.'. $request->image->extension();
                 $request->image->move(public_path('/uploads/imagem'),$fileName);
                 $path = "/public/uploads/imagem/$fileName";
                $data->image = $path;
         }else{
             $fileName =$data->imagem;
         }

         $data->update([
             'serial'=>$request->serial,
             'numero'=>$request->numero,
             'image'=>$fileName,
             'status'=>1
         ]);

    
     return response()->json($data, 200);}


    public function getContainerEnable(Request $request)
{
    $dataOld = Container::where('status','0')->get();

    
    if($request->keywords){
      
       $data = $dataOld->where('serial','LIKE','%'.$request->keywords.'%');
       
       return ContainerResource::collection($data);
     }

     return ContainerResource::collection($dataOld);
       
    }

    public function getDistrict()
    {
       return  DistrictResource::collection(District::all());

    }

    public function searchToDistrictToProvince(Request $request)
    {
        $data = District::where('province_id','=', $request->province_id)->get();
        return $data;
    }



}


