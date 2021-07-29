@extends('admin.common')

@section('title', $title ?? ucfirst($name))

@section('cont')

<table class="table table-striped table-hover">
  <thead>
    <tr>
      @if ($data['body'])
        @foreach (array_keys(get_object_vars($data['body'][0])) as $headCol)
          <th scope="col">{{__($name . '.' . $headCol)}}</th>
        @endforeach
        <th scope="col"><i class="bi bi-gear-fill"></i></th>
      @else
      <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{__('common.noListing')}}
      </div>
      @endif
    </tr>
  </thead>
  <tbody>
    @if ($data['body'])
      @foreach($data['body'] as $row)
      <tr>
        @foreach ($row as $col)
          <td>{{$col}}</td>
        @endforeach
        <td><a href="{{url()->current()}}/delete/{{$row->id}}"><i class="text-danger bi bi-trash"></i></a></td>
      </tr>
      @endforeach
    @endif

    @php
      $temp = count(get_object_vars($data['body'][0])) + 1
    @endphp
    <td style="text-align: center;"{{$data['body'] ? "colspan=$temp" : ""}}>
      <a href="{{url() -> current()}}/new">
        <i class="bi bi-plus-circle-dotted" data-bs-toggle="modal" data-bs-target="#newUser"></i>
      </a>
    </td>
  </tbody>
</table>

@endsection