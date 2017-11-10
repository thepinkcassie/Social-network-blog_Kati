<!-- FAR RIGHT SIDEBAR -->
<div class="col-md-3">
  <div class="widget widget-update">
    <h4 class="text-center">Buzzing Updates</h4>
    <div class="media">

      <!-- WATCH VIDEO #62 in udemy course Kati to set up story filter like nav -->

      <div class="media-body">
          <ul class="nav nav-list text-center">
       @foreach($title as $title)
            <li class="active">
              <a href="#">
                <i class="fa fa-md fa-bolt"> {{$title->name}}</i>
              </a>
            </li>
        @endforeach

          </ul>

      </div>

    </div>
  </div>

 