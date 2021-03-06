@extends('admin.common')

@section('title', $title ?? ucfirst($name))

@section('cont')

<form action="{{url()->current()}}" method='POST'>
  @csrf
  <input type="text" class="form-control" placeholder="{{__('pizzas.name')}}" name="name" value="{{old('name')}}">
  <input type="number" step=".01" min="1" class="form-control" placeholder="{{__('pizzas.price')}}" name="price" value="{{old('price')}}">
  <br>
  <button type="submit" class="btn btn-success mb-2 form-control">{{__('pizzas.submit')}}</button>

</form>

@endsection