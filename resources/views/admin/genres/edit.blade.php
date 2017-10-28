@extends('layouts.app_plus')

@section('content')

      @include('author.includes.errors')

      <div class="panel panel-default">
            <div class="panel-heading">
                  Edit Genre
            </div>

            <div class="panel-body">
                  <form action="{{ route('genre.update', ['id' => $genre->id]) }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                              <label for="name">Genre</label>
                              <input type="text" name="genre" value="{{ $genre->genre }}" class="form-control">
                        </div>
                        <div class="form-group">
                              <div class="text-center">
                                    <button class="btn btn-success" type="submit">
                                          Update Genre
                                    </button>
                              </div>
                        </div>
                  </form>
            </div>
      </div>
@stop