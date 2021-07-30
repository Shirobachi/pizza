<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class pizzasIngredient extends Model
{
    use HasFactory;
    protected $table = "pizzasIngredients";
    protected $fillable = [ 'pizza', 'ingredient' ];

    public static function _get($id){
      return DB::table('pizzasIngredients') 
        -> where('pizzasIngredients.pizza', $id)
        -> leftJoin('pizzas', 'pizzasIngredients.pizza', 'pizzas.id')
        -> leftJoin('ingredients', 'pizzasIngredients.ingredient', 'ingredients.id')
        -> select('pizzasIngredients.id', 'ingredients.name')
        -> get();
    }

    public static function _destroy($id){
      pizzasIngredient::findOrFail($id) -> delete();
    }

    public static function addIngredient($id, $ingredient){
      pizzasIngredient::create(
        [
          'pizza' => $id,
          'ingredient' => $ingredient
        ]
      );
    }
}
