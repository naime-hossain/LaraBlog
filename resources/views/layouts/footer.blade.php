    <div class="footer_wrap ">
    	<div class="container">
    		<div class="row">
    			<h4 class="panel text-center">
                {{-- footer text come from app setting --}}
                @if ($settings)
                     {{ $settings->site_footer_text }}
                @endif
               </h4>
    		</div>
    	</div>
    </div>
    <!-- end of footer wrap -->

<script src='/js/app.js'></script>

{{-- this section is for page level script --}}
@yield('footer')   

    
</body>
</html>
