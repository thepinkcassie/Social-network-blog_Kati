@extends('layouts.app_plus')

<!-- Styles -->
<link href="{{ asset('css/pages.css') }}" rel="stylesheet">

@section('content')

@include('author.includes.errors')

<div class="panel panel-default">
   <div class="panel-heading">
     
   </div>

   <div class="panel-body">
      <form action="{{ route('page.update', ['id'=>$page->id]) }}" method="post">
          {{ csrf_field() }}

          <div class="form-group text-center">
            <label for="title" > Change title  </label>
            <select name="title_id" id="title" class="form-control">
              @foreach($titles as $title)
                 <option value="{{ $title->id }}"
                 @if($page->title->id == $title->id)
                   selected
                 @endif
                 > {{ $title->name }} </option>
              @endforeach 
            </select>
          </div>

          <div class="form-group">
             <label for="page_title"></label>
             <input type="text" name="page_title" value="{{ $page->page_title }}" class="form-control text-center">
          </div>

          <div class="form-group">
             <label for="content"></label>
             <textarea name="content" cols="5" rows="5" class="form-control">{{ $page->content }}</textarea>
          </div>

          <div class="form-group">
              <div class="text-right">
                 <button class="btn btn-success" type="submit">
                    Update Page
                 </button>
              </div>
          </div>
          
      </form>
   </div>
</div>

@endsection

