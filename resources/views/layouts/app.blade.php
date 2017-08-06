  @include('layouts.header')

    <div class="welcome_wrap"
    @if ($settings)
       style="background-image: url(/images/{{ $settings->site_cover_photo }});"
    @endif
   >
    
        <div class="welcome_text">
           <div class="container">
           	<div class="row">
           		<div class="col-md-12">
               {{-- heading section for heading text --}}
           			@yield('heading')
           		</div>
           	</div>
           </div>
       </div>
    </div>
      
      {{-- end of welcome wrap --}}

       <div class="body_wrap">
          <div class="container">
             <div class="row">
             {{-- content section --}}
               @yield('content') 
             {{-- sidebar section --}}
                @yield('sidebar')  

              </div>
          </div>
       </div>
       {{-- end of body wrap --}}
       
    
 {{-- footer start --}}
@include('layouts.footer')
