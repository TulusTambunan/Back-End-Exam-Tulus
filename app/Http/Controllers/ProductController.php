<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\UnitRumah;

class ProductController extends Controller
{
    function CreateNewUnit(Request $request){
        
    try{
                
        $this->validate($request,[
            'kavling' => 'required',
            'blok' => 'required',
            'no_rumah' => 'required',
            'harga_rumah' => 'required',
            'luas_tanah' => 'required',
            'luas_bangunan' => 'required',
            'customer_id' => 'required',
                                
                            
                                
                
        ]);
        
        $unit = new UnitRumah;
        $unit->kavling =  $request->input('kavling');
        $unit->blok = $request->input('blok');
        $unit->no_rumah =$request->input('no_rumah');
        $unit->harga_rumah= $request->input('harga_rumah');
        $unit->luas_tanah=$request->input('luas_tanah');
        $unit->luas_bangunan=$request->input('luas_bangunan');
        $unit->customer_id=$request->input('customer_id');
        $unit->save();
        return response()->json(['message' =>'Berhasil'], 200);
            }
        catch(\Exception $e){
                
                
        return response()->json(['message' =>'Failed to create unit, exception:' + $e], 500);
            }
            
            }
    function DeleteUnit(Request $req) {
        $id = $req->input('id');
        

        $unit_deleted = DB::delete('delete from unit_rumahs where id = ?', [$id]);
        return response()->json($unit_deleted, 200);
    }
}
