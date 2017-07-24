   <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>@if ($settings)
          {{ $settings->site_description }}
            @endif</p>
            {{-- Larablog is a web application which is develped with Laravel.In this Platform you can share your thoughts.A simple application where you may find some lackings,if you want me to impeove it then let me know.Thanks --}}
          </div>
          @if (count($latests)>0)
            {{-- expr --}}
               <div class="sidebar-module">
            <h4>recent posts</h4>
            <ol class="list-unstyled">

            @php
             
              
            @endphp
              @foreach ($latests as $post)
                {{-- expr --}}
                 <li><a href="/posts/{{$post->slug}}">{{$post->title}}</a></li>
              @endforeach
             
             
            </ol>
          </div>
          @endif
       
           @if (count($archives)>0)
            {{-- expr --}}
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
          @endif
       
           @if (count($categories)>0)
            {{-- expr --}}
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
          @endif
        
           @if (count($users)>0)
            {{-- expr --}}
               <div class="sidebar-module">
            <h4>Top Authors</h4>
            <ol class="list-unstyled">

         
              @foreach ($users as $user)
                {{-- expr --}}
                @if ($user->role->name!='administrator' && $user->role->name!='subscriber')
                  {{--show the user who has post --}}
                  @if (count($user->posts)>=3)
                  <li>
                 <a class="" href="{{ route('archive.author',$user->name) }}">
                 {{$user->name." ( ".count($user->posts)." ) "}}
                 </a>
                 </li>
                  @endif
                  
                @endif
                 
              @endforeach
             
            
            </ol>
          </div>
          @endif
           
          <div class="sidebar-module">
            <h4>find me</h4>
            <ol class="list-unstyled">
              {{-- <li><a href="https://github.com/naime-hossain">GitHub</a></li> --}}
              <li><a href="https://twitter.com/NaimeH_B">Twitter</a></li>
              <li><a href="https://www.facebook.com/naime.hossain.3">Facebook</a></li>
            </ol>
          </div>

    
        </div><!-- /.blog-sidebar -->