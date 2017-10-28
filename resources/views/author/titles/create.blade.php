@extends('layouts.app_plus')

<!-- Styles -->
<link href="{{ asset('css/titles.css') }}" rel="stylesheet">

@section('content')

@include('author.includes.errors')

<div class=" widget panel panel-default">

   <div class="panel-body">
      <form action="{{ route('title.store') }}" method="post" enctype="multipart/form-data" files="true">
          {{ csrf_field() }}

          <div class="form-group">
             <label for="featured_img"></label>
             <input type="file" name="featured_img" class="form-control text-center">
          </div>

          <div class="form-group">
             <label for="name"></label>
             <input type="text" name="name" placeholder="TITLE" class="form-control">
          </div>

          <div class="form-group">
             <label for="summary"></label>
             <textarea name="summary" id="summernote" placeholder="Summary: 300 words max" 
                       cols="5" rows="5" class="form-control" enctype="multipart/form-data" 
                       files="true">
            </textarea>
          </div>

          <div class="form-group">
             <label for="genres">Select Genres (max:3) </label>
                 @foreach($genres as $genre)
                     <div class="checkbox-inline">
                        <label><input type="checkbox" name="genres[]" value="{{ $genre->id }}">{{ $genre->genre }}</label>
                    </div>
                @endforeach
          </div>

          <div class="form-group">
              <div class="text-right">
                 <button class="btn btn-md btn-warning" type="submit">
                    Create
                 </button>
              </div>
          </div>
      </form>
   </div>
</div>

@endsection

@section('styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
@stop

@section('scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
<script>
$(document).ready(function() {
  $('#summernote').summernote();
});
</script>
@stop