<body background="{{$img}}">
	@extends('layout.site')

	@section('titulo', 'Login')

	@section('conteudo')
		<div class="container">
			<!-- <h3 class="center">D!ET</h3> -->
			<div class="row background-login" >
					<div class="input-field container-email">
						<input type="text" id="email" name="email">
						<label>E-mail</label>
					</div>
					<div class="input-field container-senha">
						<input type="password" id="senha" name="senha">
						<label>Senha</label>
					</div>			
					<button class="btn light-green darken-1" id="btnEntrar">Entrar</button><br><br>
				<label class="no-register">Ainda não tem cadastro? 
					<a href="{{route('registro')}}">Clique aqui</a>
				</label>
			</div>
			<!-- <div class="row">
				<form class="" action="{{route('site.login.entrar')}}" method="post" enctype="multipart/form-data">
					{{csrf_field()}}

					<div class="input-field">
						<input type="text" name="email">
						<label>E-mail</label>
					</div>
					<div class="input-field">
						<input type="password" name="senha">
						<label>Senha</label>
					</div>			
					<button class="btn deep-orange">Entrar</button>
				</form>
			</div>
	 -->
		</div>	
	@endsection

	<style type="text/css">
		.background-login {
			border: solid white 1px;
			width: 90%;
			height: 350px;
			margin-left: 5% !important;
			margin-top: 35%;
			background-color: white;
			border-radius: 5px; 
			box-shadow: 0px 0px 50px 2px #aaa;
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
							window.location.href = (resposta.typeUser.indexOf("Participante") > 0) ? "/feed" : "/cms/home";
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