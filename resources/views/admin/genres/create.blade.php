@extends('layouts.app_plus')

@section('content')

      @include('author.includes.errors')

      <div class="panel panel-default">

         <div class="panel-heading text-right">
            <a href="{{ route('genres') }}">
              <strong>See Genre</strong>
             </a> 
         </div>

            <div class="panel-heading">
                  Create a new genre
            </div>

            <div class="panel-body">
                  <form action="{{ route('genre.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                              <label for="name">Genre</label>
                              <input type="text" name="genre" class="form-control">
                        </div>
                        <div class="form-group">
                              <div class="text-center">
                                    <button class="btn btn-success" type="submit">
                                          Store Genre
                                    </button>
                              </div>
                        </div>
                  </form>
            </div>
      </div>
@endsection