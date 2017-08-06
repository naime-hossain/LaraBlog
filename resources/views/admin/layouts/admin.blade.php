
@include('admin.layouts.header')
        
    <div id="page-wrapper">

        <div class="row">
              
              @yield('contents')

        </div>
      
    </div>
      <!-- end page-wrapper -->
</div>
{{-- end of wrapper --}}

@include('admin.layouts.footer')

{{-- yeild any script for specific page --}}
@yield('footer')
</body>

</html>
