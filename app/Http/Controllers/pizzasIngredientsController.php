<?php

namespace App\Http\Controllers;

use App\Models\pizzasIngredient;
use Illuminate\Http\Request;

class pizzasIngredientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $r)
    {
      pizzasIngredient::addIngredient($id, $r->ingredient);

      return redirect(url(dirname(url()->current())));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pizzasIngredients  $pizzasIngredients
     * @return \Illuminate\Http\Response
     */
    public function show(pizzasIngredients $pizzasIngredients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pizzasIngredients  $pizzasIngredients
     * @return \Illuminate\Http\Response
     */
    public function edit(pizzasIngredients $pizzasIngredients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pizzasIngredients  $pizzasIngredients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pizzasIngredients $pizzasIngredients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pizzasIngredients  $pizzasIngredients
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $idI)
    {
      pizzasIngredient::_destroy($id, $idI);

      return redirect(url() -> previous());
  
    }
}
