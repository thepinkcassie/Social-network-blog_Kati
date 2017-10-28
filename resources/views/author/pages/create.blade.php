@extends('layouts.app_plus')

<!-- Styles -->
<link href="{{ asset('css/pages.css') }}" rel="stylesheet">
 
@section('content')

@include('author.includes.errors')

<div class="panel panel-default">
   <div class="panel-heading">
     
   </div>

   <div class="panel-body">
      <form action="{{ route('page.store') }}" method="post">
          {{ csrf_field() }}
          
          <div class="form-group">
            <label for="title"> Select a Title </label>
            <select name="title_id" id="title" class="form-control">
              @foreach($titles as $title)

              @if(Auth::id() == $title->user_id)
                 <option value="{{ $title->id }}"> {{ $title->name }} </option>
              @endif

              @endforeach 
            </select>
          </div>

          <div class="form-group">
             <label for="page_title"></label>
             <input type="text" name="page_title" placeholder="New Page Title" class="form-control text-center">
          </div>

          <div class="form-group">
             <label for="content"></label>
             <textarea name="content" cols="5" rows="5" class="form-control"></textarea>
          </div>
        
          

          <div class="form-group">
              <div class="text-right">
                 <button class="btn btn-success" type="submit">
                    Publish Page
                 </button>
              </div>
          </div>
          
          <div class="form-group">
              <div class="text-right">
                 <a href="#">Save/Draft</a>
              </div>
          </div>
      </form>
   </div>
</div>

 
@endsection





