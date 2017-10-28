@extends('layouts.app_plus')

@section('content')

<div class="panel panel-default">
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
         Restore
       </th>

       <th>
         Delete
       </th>


    </thead>

    <tbody>
    @if($pages->count() > 0)
        @foreach($pages as $page )
           <tr>
             @if(Auth::id() == $page->user_id)
               <td>{{ $page->title_id }}</td>
               <td>{{ str_limit($page->page_title, 15) }}</td>

               <td> 
                  <a href="{{route('page.restore', ['id'=>$page->id]) }}" class="btn btn-sm btn-info">
                    <i class="fa fa-lg fa-refresh" aria-hidden="true"></i>
                  </a>
              </td>
              
              <td> 
                  <a href="{{route('page.kill', ['id'=>$page->id]) }}" class="btn btn-sm btn-danger">
                     <strong>  X </strong>
                  </a>
              </td>
              @endif
           </tr>
        @endforeach
        @else
          <tr>
            <th colspan="5" class="text-center"> No trashed pages </th> 
          </tr>
      @endif
    </tbody>
</table>


   </div>
</div>

@endsection