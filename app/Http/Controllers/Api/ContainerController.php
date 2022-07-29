<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use File;
use Storage;
use Validation;
use App\Models\Container;
use App\Models\Collect;
use App\Models\District;
use App\Models\Province;
use App\Http\Resources\ContainerResource;
use App\Http\Resources\DistrictResource;
use App\Http\Resources\ProvinceResource;
use App\Models\user;
class ContainerController extends Controller
{

    public function uplaodImage(Request $request)
     {
        $validator = Validator::make($request->all(),[
            'serial'=>'required|string',
             'number'=>'required|integer',
             'image'=>'nullable|image|mimes:jpg,bmp,png,base64',
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
                       
                $fileName ='imagem-'.time().'.'. $request->image->extension();
                $request->image->move(public_path('/uploads/imagem'),$fileName);
                $path = "/public/uploads/imagem/$fileName";
               $data->image = $path;
        }else{
            $fileName =$data->imagem;
        }

       switch ($data->status_id) {
        case 4:
            $data->update([
                'serial'=>$request->serial,
                'numero'=>$request->numero,
                'image'=>$fileName,
                'status_id'=>2
            ]);
            break;
         case 2:
                $data->update([
                    'serial'=>$request->serial,
                    'numero'=>$request->numero,
                    'image'=>$fileName,
                    'status_id'=>2
                ]);
         break;
        default:
            abort(404);
            break;
       }
        
    return response()->json($data, 200);  
      }


public function uplaodImage1(Request $request)
{

    $dir ="/test";
    
    $image= $request->file('image');
    if($request->has('image')){
        $imageName = \Carbon\Carbon::now()->toDateString()."-". uniqid()."."."png";
        if(!Storage::disk('public')->exists($dir)){
            Storage::disk('public')->makeDirectory($dir);
        }
        Storage::disk('public')->put($dir.$imageName,file_get_contents($image));

    }else{
         return response()->json(['massage'=>trans('/storage/test/'.'def.png')], 200);
    }

    return response()->json(['massage'=>trans('/storage/test/'.$imageName)], 200);
}



public function uplaodImage2(Request $request)
{ 
  if($request!= null):
    $data = $request->serial;
    $image = $request->image;
    $image = str_replace('data:image/png;base64,', '', $image);
    dd($image);
    $image = str_replace(' ','+',$image);
    $fileName ='imagem-'.time().'.png';

  File::put(public_path('/uploads/imagem'.$fileName),base64_decode($image));
    $data=[
        'massage'=>$fileName,
        'success'=>true,
    ];

   else:
    $data=[
        'massage'=>$fileName,
        'success'=>true,
    ];
endif; 

return response()->json($data, 200);
}

      function base64_encode_image ($filename=string,$filetype=string) {
        if ($filename) {
            $imgbinary = fread(fopen($filename, "r"), filesize($filename));
            return 'data:image/' . $filetype . ';base64,' . base64_encode($imgbinary);
        }
        echo base64_encode_image("C:\Users\lonm\OneDrive\Temp\Clipboard03.jpg", "jpg");
    }
      
}
