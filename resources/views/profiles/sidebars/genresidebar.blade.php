<div class="widget widget-update">
     <ul class="list-inline">
       @foreach($genre as $genre)
           
          <li><a href="{{ route('genre.single', ['id'=> $genre->id]) }}"> {{$genre->genre}} </a></li>

       @endforeach
     </ul>

     <ul class="list-inline">
       <hr>
       <li><a href="#">@2017</a></li>
       <li><a href="#">Scriblyz</a></li>
       <li><a href="#">About/Terms</a></li>
       <li><a href="#">Help/Privacy</a></li>
       <li><a href="#">Blog/Jobs</a></li>
     </ul>
   </div>

   </div>

</div>
</div>