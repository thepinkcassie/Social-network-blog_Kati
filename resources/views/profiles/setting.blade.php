@extends('layouts.app_plus')

<!-- Styles -->
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">

@section('content')

<div class="panel panel-default">
   <div class="panel-heading">
     
   </div>

   <div class="panel-body">
      <form action="#" method="post">

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