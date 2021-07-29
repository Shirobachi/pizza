<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class pizza extends Model
{
  use HasFactory;
  protected $fillable = [ 'name', 'price' ];

  public static function _get(){
    $temp = DB::table('pizzas') -> select('id', 'name', 'price') -> get();

    foreach($temp as $t){
      $t -> ingredients = "";
      foreach (pizzasIngredient::_get($t->id) as $i)
        $t -> ingredients .= $i -> name . ", ";
      $t->ingredients = rtrim($t->ingredients, ', ');
    }

    return $temp;
  }

  public static function destroy($id){
    pizza::findOrFail($id) -> delete();
  }
}
