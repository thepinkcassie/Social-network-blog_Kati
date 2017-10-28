<div class="container">
<div class="row">
<div class="col-md-3">
<div class="widget widget-profile">
<img class="profile-img" src="{{ $user->profile->avatars_img }} "value="{{ $user->avatars_img }}" alt="Avatar">
        <h3 class="capitalize">{{ $user->name }} <span style="font-size:12px;"></span></h3>
        <h5>@ {{ $user->username }}</h5>
        <h5><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> 
           {{ $user->profile->location }}
        </h5>
        <h5><span class="glyphicon glyphicon-link" aria-hidden="true"></span> 
            <a href="#">{{ $user->profile->website }}</a>
        </h5>
        <h5>{{ $user->profile->about }}</h5>
        <p>
           @if(Auth::id() == $user->id)
             <a class="text-center" href="{{ route('profile.edit') }}">Edit Profile</a>
           @endif
        </p>


        <!--VUE JS -->
        @if(Auth::id() !== $user->id)
         <div id="app">
           <friend :profile_user_id="{{ $user->id }}"></friend>
         </div>
         @endif
</div>

<br>