<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\District;
use App\Models\Province;
class DestrictTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
    $provinces = Province::all()
    ->map(function ($province) {
      $province->count = 
      $province->districts->map(function ($district) {
            return $district->count =  $district->containres->map(function($cts){
                return $cts->collect_count_collected();
        })->sum();
        })->sum();
        return (Object) array('id' => $province->id,
        'name'=>$province->name,
        'count' => $province->count);
       
    });

dd($provinces);



        $districts = District::all()
        
        ->map(function ($district) { 
            $district->count =  
            $district->containres
                ->map(function($cts){
                return $cts->collect_count_collected();
            })->sum();
             return (Object) array('id' => $district->id,
             'name'=>$district->name,
             'count' => $district->count) ;
        });

        dd($districts);
        dd($districts->pluck('name'));
        dd($districts->pluck('count'));

        $response->assertTrue(true);
    }


}
