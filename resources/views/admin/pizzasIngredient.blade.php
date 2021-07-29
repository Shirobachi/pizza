@extends('admin.common')

@section('title', $title ?? ucfirst($name))

@section('cont')

<form action="{{url()->current()}}" method='POST'>
  @csrf

  <select class="form-select mb-2" name="ingredient">
    @foreach($data['ingredients'] as $e)
      <option value="{{$e->id}}">{{$e->name}}</option>
    @endforeach
  </select>
  <br>
  <button type="submit" class="btn btn-success mb-2 form-control">{{__('pizzas.submit')}}</button>

</form>

@endsection