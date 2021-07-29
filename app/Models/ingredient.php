<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class ingredient extends Model
{
    use HasFactory;
    protected $fillable = [ 'name' ];

    public static function _get(){
      return DB::table('ingredients') -> select('id', 'name') -> get();
    }

    public static function destroy($id){
      ingredient::findOrFail($id) -> delete();
    }
}
