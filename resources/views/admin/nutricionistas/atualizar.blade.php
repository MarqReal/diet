@extends('admin.layout.site')

	@section('titulo', 'Nutricionistas')
	@section('painel', 'Nutricionistas')


	@section('conteudo')
	<div class="row">
		<span class="title-page">Atualização de nutricionista</span>
		@include('admin.nutricionistas._form')
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
		.row-margin {
    		margin-top: 2%;
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
      				Swal.fire('Preenchimento incorreto!', "Preencha o nome do nutricionista corretamente",'error');
	  				$("#nome").focus();
	  				return false;
				}

      			if($("#segmento option:selected").val()== "") {
      				Swal.fire('Preenchimento incorreto!', "Preencha o tipo de segmento corretamente",'error');
	  				$("#segmento").focus();
	  				return false;
				}

      			if($("#user_name").val()== "") {
      				Swal.fire('Preenchimento incorreto!', "Preencha o nome do usuario no twitter corretamente",'error');
	  				$("#user_name").focus();
	  				return false;
				}      			
  
      			var data = {
      				'_token': '{{csrf_token()}}',
      				'_method': 'PUT',
      				'id': '{{$nutricionista->id}}',
      				'nome' : $("#nome").val(),
      				'segmento' : $("#segmento option:selected").val(),
      				'user_name' : $("#user_name").val(),
      			};
				$.ajax({
    				method: 'POST', // Type of response and matches what we said in the route
    				url: '/nutricionista/editar', // This is the url we gave in the route
    				data: data, // a JSON object to send back
			    	success: function(response){ // What to do if we succeed
						var resposta = JSON.parse(response);
						if (!resposta.error) {
							Swal.fire({
  								title: 'Sucesso!',
  								text: "Nutricionista atualizado com sucesso",
  								type: 'success',
  								confirmButtonText: 'Ok'
							}).then((result) => {
								window.location.href = "/cms/nutricionistas";
							});
						} else {
							Swal.fire('Erro!', "Não foi possivel realizar a atualização, tente novamente",'error');
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
	