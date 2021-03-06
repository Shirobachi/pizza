<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\pizzasIngredient;
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
      if($t->ingredients == '')
      $t->ingredients = __('common.noIngredients');
    }

    return $temp;
  }

  public static function destroy($id){
    pizzasIngredient::where('pizza', $id) -> delete();
    pizza::findOrFail($id) -> delete();
  }
}
