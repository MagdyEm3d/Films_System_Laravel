@extends('layout.main')

@section('content')


<table class="table table-hover my-5 mx-auto">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">title</th>
        <th scope="col">description</th>
        <th scope="col">image</th>
        <th scope="col">date</th>
        <th scope="col">actions</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($films as $film)

        <tr>
            <th scope="row">{{$film->id}}</th>
            <td>
                <img src="{{$film->image}}" width="50">
            </td>
            <td>{{$film->title}}</td>
            <td>{{Str::substr($film->description,0,15)}}...</td>
            <td>{{$film->created_at}}</td>
            <td>
                <a href="{{route('editfilm',$film->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                <a href="{{route('getonefilm',$film->id)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                <form action="{{ route('deletefilm', $film->id) }}" class="d-inline" method="GET" id="delete-form">
                    @csrf
                    <button type="button" class="btn btn-danger show_confirm"><i class="fas fa-trash"></i></button>
                </form>
                

                

            </td>
          </tr>
            
        @endforeach


    </tbody>
  </table>
@endsection