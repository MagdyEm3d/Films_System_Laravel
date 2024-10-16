@extends('layout.main')

@section('content')

<div class="container">
    <h1 class="text-center mx-auto my-5">Add Post</h1>

    <div class="w-50 mx-auto my-5">

        <form action="{{route('updatefilm',$film->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="mb-3">
                  <label class="form-label">Title</label>
                  <input type="text" value="{{$film->title}}" name="title" class="form-control">
                </div>
                <div class="mb-3">
                  <label class="form-label">Description</label>
                  <textarea id="summernote" class="form-control" name="description">{{$film->description}}</textarea>
                </div>
                <div>
                    <img src="/{{$film->image}}" width="200" alt="">
                </div>
                <div class="mb-3">
                  <label class="form-label">Image</label>
                  <input type="file" class="form-control" name="image">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('films')}}" type="submit" class="btn btn-primary">Go Back</a>
                

        </form>

    </div>
</div>





@endsection


@push('jscode')

<script>
    $(document).ready(function() {
  $('#summernote').summernote();
});
</script>
    
@endpush