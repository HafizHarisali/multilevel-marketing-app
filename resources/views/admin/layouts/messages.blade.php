<!-- @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <ul>
            	<li>{{$error}}</li>
            <ul>
        @endforeach
    </div>
@endif -->

	@if ($errors->any())
	    @foreach($errors->all() as $error)
	       <script>
	       	 toastr.error("{{ $error }}");
	       </script>
	    @endforeach
  	@endif
