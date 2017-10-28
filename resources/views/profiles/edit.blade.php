@extends('layouts.app_profiles')

<link href="{{ asset('css/profile.css') }}" rel="stylesheet">

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="widget panel panel-default">
               

                <div class="panel-body">
                    <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data" files="true">
                        {{ csrf_field() }}

                        <div class="form-group">
                              <label for="avatars_img">Upload avatar</label>
                              <input type="file" name="avatars_img"  class="form-control" accept="image/*">
                          </div>
                        
                        <div class="form-group">
                              <label for="location">Location</label>
                              <input type="text" name="location" value="{{ $info->location }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                              <label for="website">Website</label>
                              <input type="link" name="website" value="{{ $info->website }}" class="form-control">
                        </div>
                        <div class="form-group">
                              <label for="about"> Bio: </label>
                              <textarea name="about" id="about" cols="30" rows="10" class="form-control" required>{{ $info->about }}</textarea>
                        </div>

                        <div class="form-group">
                              <p class="text-right">
                                    <button class="btn btn-md btn-warning" type="submit">
                                          Save
                                    </button>
                              </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection