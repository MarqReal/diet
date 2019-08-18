@extends('admin.layout.site')

	@section('titulo', 'Painel')

	@section('conteudo')
	@endsection

	<style type="text/css">
		.brand-logo {
			white-space: nowrap;
			font-size: 20px !important;
		}
	</style>
	<script type="application/javascript" src="/js/jquery-3.4.1.min.js"></script>
	<script type="application/javascript" src="/js/materialize.min.js"></script>
	<script type="application/javascript" src="/js/sweetalert2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$(".button-collapse").sideNav();
		});
	</script>