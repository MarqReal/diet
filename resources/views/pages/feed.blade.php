@extends('layout.site')
<body>
<header>
	<nav>
		<div class="nav-wrapper darken-4">
			<a href="#!" class="brand-logo"></a>
			<a href="#" id="perfil" data-activates="mobile" class="button-collapse"><i class="material-icons icons-top">person</i></a>
			<a href="#" id="sair" data-activates="mobile" class="button-collapse"><i class="material-icons icons-top">exit_to_app</i></a>
		</div>
	</nav>
</header>
	@section('titulo', 'Feed de dicas')

	@section('conteudo')
		<div class="container">
			
		</div>	
	@endsection

	<style type="text/css">
		.nav-wrapper {
			background: #212121;
		}
		.icons-top {
			font-color: white !important;
		}

		#sair {
			left: 68%;
		}

		.input-field {
			width: 80%;
			margin-left: 10%;
		}

		.container-email {
			margin-top: 20% !important;
		}

		#btnEntrar {
			margin-left: 30%;
		}

		.no-register {
			margin-left: 15%;
    		font-size: 14px;
		}

		.container {
			width: 100% !important;
		}
	</style>
	<script type="application/javascript" src="/js/jquery-3.4.1.min.js"></script>
	<script type="application/javascript" src="/js/materialize.min.js"></script>
	<script type="application/javascript" src="/js/sweetalert2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
      		Materialize.updateTextFields();

      		$("#btnEntrar").click(function () {
      			if($("#email").val()== "" || $("#email").val().indexOf('@')== -1 || $("#email").val().indexOf('.')== -1) {
      				Swal.fire('Preenchimento incorreto!', "Formato de E-mail incorreto",'error');
	  				$("#email").focus();
	  				return false;
				}
      			var data = {
      				'_token': '{{csrf_token()}}',
      				'email' : $("#email").val(),
      				'senha' : $("#senha").val()
      			};
				$.ajax({
    				method: 'POST', // Type of response and matches what we said in the route
    				url: '/login/entrar', // This is the url we gave in the route
    				data: data, // a JSON object to send back
			    	success: function(response){ // What to do if we succeed
						var resposta = JSON.parse(response);
						if (!resposta.error) {
							window.location.href = "/registro";
						} else {
							Swal.fire('Erro!', "E-mail ou senha invalidos, tente novamente",'error');
						} 
			    	},
			    	error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
			        	//console.log(JSON.stringify(jqXHR));
						Swal.fire('Erro!', "Não foi possivel realizar o cadastro, tente novamente",'error');
			        	//console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
			    	}
				});
      		});
      	});
	</script>