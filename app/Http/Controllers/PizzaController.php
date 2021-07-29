<?php

namespace App\Http\Controllers;

use App\Models\pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.show') -> with('path', 'pizzas');
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
  public function store(Request $r)
  {
    $r -> validate([
      'name' => 'min:3|max:30|unique:pizzas',
      'price' => 'numeric|between:1,100'
    ]);

    pizza::create($r->all());

    return redirect(url(dirname(url()->current())));
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\pizza  $pizza
   * @return \Illuminate\Http\Response
   */
  public function show(pizza $pizza)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\pizza  $pizza
   * @return \Illuminate\Http\Response
   */
  public function edit(pizza $pizza)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\pizza  $pizza
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, pizza $pizza)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\pizza  $pizza
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    pizza::destroy($id);

    return redirect(url() -> previous());
  }
}
