@extends('admin.common')

@section('title', $title ?? ucfirst($name))

@section('cont')

<form action="{{url()->current()}}" method='POST'>
  @csrf
  <input type="text" class="form-control" placeholder="{{__('ingredients.name')}}" name="name" value="{{old('name')}}">
  <br>
  <button type="submit" class="btn btn-success mb-2 form-control">{{__('ingredients.submit')}}</button>

</form>

@endsection