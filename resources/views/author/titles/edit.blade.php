@extends('layouts.app_plus')

<!-- Styles -->
<link href="{{ asset('css/titles.css') }}" rel="stylesheet">

@section('content')

@include('author.includes.errors')

<div class="panel panel-default">
   <div class="panel-heading text-center">
     Edit: {{ $title->name }}
   </div>

   <div class="panel-body">
      <form action="{{ route('title.update', ['id'=> $title->id]) }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}

           <!--{{ $title->featured_img}}-->
          <div class="form-group img-responsive">
              <img src="{{ $title->featured_img }}" alt="{{ $title->name }}" width="140px" height="140px"></img>
          </div>
        

          <div class="form-group">
             <label for="featured_img"></label>
             <input type="file" name="featured_img" value="{{ $title->featured_img }}" class="form-control text-center">
          
          </div>
          
          <div class="form-group">
             <label for="name">Edit Title</label>
             <input type="text" name="name" value="{{ $title->name }}" class="form-control">
          </div>

          <div class="form-group">
             <label for="summary">Edit Summary</label>
             <textarea name="summary" id="summernote" rows="5" cols="5" class="form-control" enctype="multipart/form-data">
                 {{ $title->summary }}
             </textarea>
          </div>

          <div class="form-group">
             <label for="tags">Select Genres (max:3) </label>
                 @foreach($genres as $genre)
                     <div class="checkbox-inline">
                        <label><input type="checkbox" name="genres[]" value="{{ $genre->id }}"
                                      @foreach($title->genres as $g)
                                      @if($genre->id == $g->id)
                                        checked
                                      @endif
                                      @endforeach
                            >{{ $genre->genre }}</label>
                    </div>
                @endforeach
          </div>

          <div class="form-group">
              <div class="text-right">
                 <button class="btn btn-md btn-warning" type="submit">
                    Save Changes 
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