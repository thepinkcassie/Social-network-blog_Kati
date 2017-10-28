@extends('layouts.app_plus')

<!-- Styles -->
<link href="{{ asset('css/titles.css') }}" rel="stylesheet">

@section('content')

<div class="widget panel panel-default">
   <div class="panel-heading text-right">
     <a href="{{ route('page.create') }}">
       <i class="fa fa-lg fa-pencil" aria-hidden="true">Write</i>
    </a> 
   </div>

   <div class="panel-body">

  <table class="table table-hover">
    <thead>

       <th>
         Cover
       </th>

       <th>
         Titles
       </th>

       <th>
         Edit
       </th>

       <th>
          Delete
       </th>

    </thead>

    <tbody>
      
    @if($titles->count() > 0)
        @foreach($titles as $title)
        <tr>
        @if(Auth::id() == $title->user_id)
           <td class="img-responsive">
            <img src="{{ $title->featured_img }}" alt="{{ $title->name }}" width="70px" height="70px">
          </td>

           <td>
              {{ str_limit($title->name, 15) }}
           </td>

           <td>
              <a href="{{ route('title.edit',[ 'id'=>$title->id ]) }}" class="btn btn-sm btn-warning">
                 <i class="fa fa-lg fa-pencil-square-o" aria-hidden="true"></i>
              </a>
           </td>

           <td>
              <a href="{{ route('title.delete',[ 'id'=>$title->id ]) }}" class="btn btn-sm btn-danger">
                 <strong> X </strong>
              </a>
           </td>
           @endif
           
        </tr>
        @endforeach
        
    @else
         <tr>
            <th colspan="5" class="text-center"> No titles yet. </th> 
          </tr>
    @endif
    </tbody>
</table>


   </div>
</div>

@endsection