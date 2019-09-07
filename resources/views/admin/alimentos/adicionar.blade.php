@extends('admin.layout.site')

	@section('titulo', 'Alimentos')
	@section('painel', 'Alimentos')


	@section('conteudo')
	<div class="row">
		<span class="title-page">Cadastro de alimentos</span>
		@include('admin.alimentos._form')
	</div>
	<div class="row">
		<button class="btn light-green darken-1" id="btnSalvar">Salvar</button>
	</div>
	@endsection
	<style type="text/css">
		.brand-logo {
			white-space: nowrap;
			font-size: 20px !important;
		}
		#sair {
			margin: 0 274px;
    		position: absolute;
		}
		.title-page {
			padding-left: 30%;
		}
		.row-inputs {
			margin-left: 5% !important;
		}

		.row {
			margin-bottom: 0px !important;
		}
		#btnSalvar {
			margin-left: 30%;
		}
	</style>
	<script type="application/javascript" src="/js/jquery-3.4.1.min.js"></script>
	<script type="application/javascript" src="/js/materialize.min.js"></script>
	<script type="application/javascript" src="/js/sweetalert2.min.js"></script>
	<script type="application/javascript" src="/js/jquery.dataTables.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			Materialize.updateTextFields();
      		$('select').material_select();
			$(".button-collapse").sideNav();

      		$("#btnSalvar").click(function () {
      			if($("#nome").val()== "") {
      				Swal.fire('Preenchimento incorreto!', "Preencha o nome do alimento corretamente",'error');
	  				$("#nome").focus();
	  				return false;
				}
      			if($("#descricao").val()== "") {
      				Swal.fire('Preenchimento incorreto!', "Preencha a descrição do alimento corretamente",'error');
	  				$("#descricao").focus();
	  				return false;
				}
      			if($("#unidade_medida").val() == "" || isNaN($("#unidade_medida").val())) {
      				Swal.fire('Preenchimento incorreto!', "Preencha a unidade de medida corretamente",'error');
	  				$("#unidade_medida").focus();
	  				return false;
				}
      			if($("#tipo_medida option:selected").val()== "") {
      				Swal.fire('Preenchimento incorreto!', "Preencha o tipo de medida corretamente",'error');
	  				$("#tipo_medida").focus();
	  				return false;
				}
      			if($("#porcao option:selected").val()== "") {
      				Swal.fire('Preenchimento incorreto!', "Preencha o tipo de porção corretamente",'error');
	  				$("#porcao").focus();
	  				return false;
				}
      			if($("#mes option:selected").val()== "") {
      				Swal.fire('Preenchimento incorreto!', "Preencha o mês corretamente",'error');
	  				$("#mes").focus();
	  				return false;
				}
      			if($("#carboidrato").val() == "" || isNaN($("#carboidrato").val())) {
      				Swal.fire('Preenchimento incorreto!', "Preencha o carboidrato corretamente",'error');
	  				$("#carboidrato").focus();
	  				return false;
				}
      			if($("#proteina").val() == "" || isNaN($("#proteina").val())) {
      				Swal.fire('Preenchimento incorreto!', "Preencha a proteina corretamente",'error');
	  				$("#proteina").focus();
	  				return false;
				}
      			if($("#lipideos").val() == "" || isNaN($("#lipideos").val())) {
      				Swal.fire('Preenchimento incorreto!', "Preencha os lipideos corretamente",'error');
	  				$("#lipideos").focus();
	  				return false;
				}
      			if($("#fibra_alimentar").val() == "" || isNaN($("#fibra_alimentar").val())) {
      				Swal.fire('Preenchimento incorreto!', "Preencha a fibra alimentar corretamente",'error');
	  				$("#fibra_alimentar").focus();
	  				return false;
				}
      			if($("#calorias").val() == "" || isNaN($("#calorias").val())) {
      				Swal.fire('Preenchimento incorreto!', "Preencha as calorias corretamente",'error');
	  				$("#calorias").focus();
	  				return false;
				}

      			var data = {
      				'_token': '{{csrf_token()}}',
      				'nome' : $("#nome").val(),
      				'unidade_medida' : parseFloat($("#unidade_medida").val()),
      				'descricao' : $("#descricao").val(),
      				'tipo_medida' : $("#tipo_medida option:selected").val(),
      				'porcao' : $("#porcao option:selected").val(),
      				'mes' : $("#mes option:selected").val(),
      				'carboidrato' : parseFloat($("#carboidrato").val()),
      				'proteina' : parseFloat($("#proteina").val()),
      				'lipideos' : parseFloat($("#lipideos").val()),
      				'fibra_alimentar' : parseFloat($("#fibra_alimentar").val()),
      				'calorias' : parseFloat($("#calorias").val())
      			};
				$.ajax({
    				method: 'POST', // Type of response and matches what we said in the route
    				url: '/alimento/cadastrar', // This is the url we gave in the route
    				data: data, // a JSON object to send back
			    	success: function(response){ // What to do if we succeed
						var resposta = JSON.parse(response);
						if (!resposta.error) {
							Swal.fire({
  								title: 'Sucesso!',
  								text: "Alimento cadastrado com sucesso",
  								type: 'success',
  								confirmButtonText: 'Ok'
							}).then((result) => {
								window.location.href = "/alimento";
							});
						} else {
							Swal.fire('Erro!', "Não foi possivel realizar o cadastro, tente novamente",'error');
						} 
			    	},
			    	error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
			        	//console.log(JSON.stringify(jqXHR));
						Swal.fire('Erro!', "Não foi possivel realizar o cadastro, tente novamente",'error');
			        	//console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
			    	}
				});
      		});
			$("#sair").click(function () {
      			Swal.fire({
  					title: 'Você tem certeza que quer sair?',
  					text: "",
  					type: 'warning',
  					showCancelButton: true,
  					confirmButtonColor: '#3085d6',
  					cancelButtonColor: '#d33',
  					confirmButtonText: 'Sim',
  					cancelButtonText : 'Cancelar'
				}).then((result) => {
  					if (result.value) {
  						$.ajax({
    						method: 'GET', // Type of response and matches what we said in the route
    						url: '/login/sair', // This is the url we gave in the route
    						data: {}, // a JSON object to send back
			    			success: function(response){ // What to do if we succeed
								var resposta = JSON.parse(response);
								if (!resposta.error) {
									window.location.href = "/cms/login";
								} else {
									Swal.fire('Erro!', "Não foi possivel realizar o logout, tente novamente",'error');
								} 
			    			},
			    			error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
			        		//console.log(JSON.stringify(jqXHR));
							Swal.fire('Erro!', "Não foi possivel realizar o logout, tente novamente",'error');
			        	//console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
			    			}
				});
  					}
				});
      		});
		});
	</script>
	