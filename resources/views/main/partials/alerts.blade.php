@if(session('success'))
<div class="col-lg-12">

		
	<div class="alert alert-success" role="alert">
		{{ session('success') }}
 	</div>
	

</divs>
@endif

@if(session('error'))
<div class="col-lg-12">

		
	<div class="alert alert-danger" role="alert">
		{{ session('error') }}
 	</div>
	

</div>
@endif