@extends('layouts.app_plus')

<!-- Styles -->
<link href="{{ asset('css/pages.css') }}" rel="stylesheet">

@section('content')

<div class="panel panel-default">

<div class="panel-heading text-right">
     <a href="{{ route('page.create') }}">
       <i class="fa fa-lg fa-pencil" aria-hidden="true">Write</i>
    </a> 
   </div>
   
   <div class="panel-body">

  <table class="table table-hover">
    <thead>

       <th>
         Title
       </th>

       <th>
          Page Title
       </th>

       <th>
         Edit
       </th>

       <th>
          Trash
       </th>

    </thead>

    <tbody>
    @if($pages->count() > 0)
        @foreach($pages as $page )
           <tr>
             @if(Auth::id() == $page->user_id)
               <td><a href="#">{{ str_limit($page->title->name, 15) }}</a></td>
               
               <td>{{ str_limit($page->page_title, 15) }}</td>

               <td> 
                  <a href="{{route('page.edit', ['id'=>$page->id]) }}" class="btn btn-sm btn-warning">
                    <i class="fa fa-lg fa-pencil-square-o" aria-hidden="true"></i>
               </td>

               <td> 
                  <a href="{{route('page.delete', ['id'=>$page->id]) }}" class="btn btn-sm btn-danger">
                    <i class="fa fa-lg fa-trash" aria-hidden="true"></i>
                  </a>
              </td>
              @endif
           </tr>
        @endforeach
    @else
         <tr>
            <th colspan="5" class="text-center"> No published pages </th> 
          </tr>
    @endif
    </tbody>
   
</table>


   </div>
</div>

@endsection