   <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
          <div class="sidebar-module">
            <h4>recent posts</h4>
            <ol class="list-unstyled">

            @php
             
              
            @endphp
              @foreach ($latests as $post)
                {{-- expr --}}
                 <li><a href="/posts/{{$post->id}}">{{$post->title}}</a></li>
              @endforeach
             
             
            </ol>
          </div>

          <div class="sidebar-module">
            <h4>archives</h4>
            <ol class="list-unstyled">

         
              @foreach ($archives as $stats)
                {{-- expr --}}
                 <li>
                 <a class="" href="{{ route('archive.time') }}?month={{$stats['month']}}&year={{$stats['year']}}">
                 {{$stats['month'] .' '. $stats['year'] ." (". $stats['published'] .")"}}
                 </a>
                 </li>
              @endforeach
             
             
            </ol>
          </div>
              <div class="sidebar-module">
            <h4>Categories</h4>
            <ol class="list-unstyled">

         
              @foreach ($categories as $category)
                {{-- expr --}}
                 <li>
                 <a class="" href="{{ route('archive.category',$category->name) }}">
                 {{$category->name." ( ".count($category->posts)." ) "}}
                 </a>
                 </li>
              @endforeach
             
             
            </ol>
          </div>
              <div class="sidebar-module">
            <h4>Users</h4>
            <ol class="list-unstyled">

         
              @foreach ($users as $user)
                {{-- expr --}}
                 <li>
                 <a class="" href="{{ route('archive.author',$user->name) }}">
                 {{$user->name." ( ".count($user->posts)." ) "}}
                 </a>
                 </li>
              @endforeach
             
             
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->