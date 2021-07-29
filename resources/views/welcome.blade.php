@extends('common')

@section('title', 'Super pizza!')

@section('content')

    <div class="row">
        <div class="offset-md-4 col-md-4 col-10 offset-1 mt-5">

        @if($info ?? '')
            <div class="alert alert-{{$info['type'] ?? 'success'}} alert-dismissible fade show" role="alert">
                {{$info['desc'] ?? ''}}
            </div>
        @endif

        <p class="h1 text-center text-uppercase">{{__('main.menu')}}</p>

        <table class="table table-secondary table-striped table-hover">
          <thead>
            <tr>
              <td>{{__('pizzas.id')}}</td>
              <td>{{__('pizzas.name')}}</td>
              <td>{{__('pizzas.ingredients')}}</td>
              <td>{{__('pizzas.price')}}</td>
            </tr>
          </thead>
          <tbody>
            @if (count($data) > 0)
              @foreach($data as $row)
                <tr>
                  <td>{{$row->id}}</td>
                  <td>{{$row->name}}</td>
                  <td>{{$row->ingredients}}</td>
                  <td>{{$row->price}}</td>
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>

        <button type="button" class="btn btn-success form-control mb-2">{{__('common.callNow')}}</button>

        </div>
    </div>

@endsection