

   <div class="widget widget-update">
     <h5 class="text-center">Check out these new user!</h5>
     <div class="media">
       <div class="media-left">
         
        <a href="#">
          <img class="media-object" src="" alt="">
        </a>
        <br>
       </div>

      

       <div class="media-body">
         @foreach ($new_user as $new_user)
         <p class="media-heading">{{$new_user->username}}</p>
         <a href="#">
          <button class="btn btn-sm btn-warning"> 
            <i class="fa fa-user"></i> 
            Add 
          </button>
        </a>
        @endforeach
       </div>
     </div>
   </div>

   


   