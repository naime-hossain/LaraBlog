<div class="alert alert-success">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true"><i class="fa fa-trash-o"></i></span>
	  </button>
	  {{-- show the success/message alert --}}
      <b class="text-danger">Alert:</b> {{ Session::get('message') }}
   
</div>
{{-- show the alert --}}