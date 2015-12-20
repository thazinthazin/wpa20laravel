<script>
	@if(Session::has('error'))
	alert("{{Session::get('error')}}");
	@endif

	@if(Session::has('message'))
	alert("{{Session::get('message')}}")
	@endif 
</script>