@extends('layouts.app_profiles')

<!-- Styles -->
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">

@section('content')

<!--USER'S PROFILE -->
@include('profiles.sidebars.usersprofile')

<!--LEFT SIDEBAR 2:-->
@include('profiles.sidebars.leftsidebar2')

<!--LEFT SIDEBAR: Buzzing Updates-->
@include('profiles.sidebars.leftsidebar')

</div>

<!-- MIDDLE- Find in component folder -->
<post></post>
<br>
<feed></feed>

<!-- FAR RIGHT SIDEBAR: Check out new user -->
@include('profiles.sidebars.rightsidebar')

<!-- GENRE SIDEBAR UNDER Check out NEW USER SIDEBAR -->
@include('profiles.sidebars.genresidebar')



@endsection