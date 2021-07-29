@extends('common')

@section('content')

  <div class="container-fluid mt-5">
    <div class="row">
      <div class="col-12 col-md-3">
        <a href="{{route('logged')}}">
          <button type="button" class="btn {{$name=='pizzas' ? 'btn-primary' : 'btn-outline-primary'}} form-control mb-2">{{__('common.pizzas')}}</button>
        </a>
        <a href="{{url('admin/ingredient')}}">
          <button type="button" class="btn {{$name=='ingredients' ? 'btn-success' : 'btn-outline-success'}} form-control mb-2">{{__('common.ingredients')}}</button>
        </a>
      </div>
      <div class="col-12 col-md-9">
        @yield('cont')
      </div>
    </div>
  </div>

@endsection