@extends('layouts.app_plus')

@section('content')

<div class="panel panel-default">

<div class="panel-heading text-right">
     <a href="{{ route('genre.create') }}">
       <strong>Create Genre</strong>
    </a> 
   </div>
   
   <div class="panel-body">

  <table class="table table-hover">
    <thead>

       <th>
         Tag name
       </th>

       <th>
         Edit
       </th>

       <th>
          Delete
       </th>

    </thead>

    <tbody>
    @if($genres->count() > 0)
        @foreach($genres as $genre )
           <tr>
               <td>{{ $genre->genre }}</td>

               <td> 
                  <a href="{{route('genre.edit', ['id'=>$genre->id]) }}" class="btn btn-sm btn-warning">
                    <i class="fa fa-lg fa-pencil-square-o" aria-hidden="true"></i>
                  </a>
               </td>

               <td> 
                  <a href="{{route('genre.delete', ['id'=>$genre->id]) }}" class="btn btn-sm btn-danger">
                    <i class="fa fa-lg fa-trash" aria-hidden="true"></i>
                  </a>
              </td>
           </tr>
        @endforeach
    @else
         <tr>
            <th colspan="5" class="text-center"> No genres yet. </th> 
          </tr>
    @endif
    </tbody>
</table>


   </div>
</div>

@endsection