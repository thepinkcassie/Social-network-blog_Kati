<!--Side bar under profile - 24hr buzz stories - display title cover when hover-->
   
   <div class=" widget widget-update" >
     <div id="sidebar-wrapper" class="sidebar-toggle">
			<ul class="nav nav-list text-center">
        <br>
		    	<li class="active">
		      		<a href="#item1">
                  <i class="fa fa-md fa-users" aria-hidden="true">
                       Friends <span class="badge badge-warning">{{$friend_count}}</span>
                  </i>  
              </a>
		    	</li>
        <br>                           {{--FIX COUNT ISSUE; DISPLAYING ALL COUNT FROM DATABASE 
                                           SHOULD ONLY DISPLAY COUNT RELATED TO SPECIFIC USER--}}
		    	<li>
		      		<a href="#item2">
                  <i class="fa fa-md fa-circle-o-notch" aria-hidden="true">
                     Work <span class="badge badge-warning">{{$title_count}}</span>
                  </i>
              </a>
		    	</li>
      <br>

            @if(Auth::id() == $user->id)
		    	<li>
		      		<a href="#item3">
                
                  <i class="fa fa-md fa-th-list" aria-hidden="true">
                     Collection <span class="badge badge-warning">14</span> {{--$collection_count--}}
                  </i>
                
              </a>
		    	</li>
            @endif
		  	</ul>
		</div>
   </div>

  