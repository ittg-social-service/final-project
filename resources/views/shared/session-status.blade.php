
@if (session('status'))
	<script>
		 Materialize.toast('{{ session('status') }}', 3000, 'green');
	</script>
@endif
