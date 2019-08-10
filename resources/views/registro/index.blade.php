<body background="/img/login/alimentos-background.jpg">
	@extends('layout.site')

	@section('titulo', 'Registrar')

	@section('conteudo')
		<div class="container">
			<!-- <h3 class="center">D!ET</h3> -->
			<div class="row background-login" >
				<form class="" action="{{route('site.login.entrar')}}" method="post" enctype="multipart/form-data">
					{{csrf_field()}}

					<div class="input-field container-nome">
						<input type="text" id="nome" name="nome">
						<label>Nome</label>
					</div>
					<div class="input-field container-email">
						<input type="text" id="email" name="email">
						<label>Email</label>
					</div>
					<div class="input-field container-senha">
						<input type="password" id="senha" name="senha">
						<label>Senha</label>
					</div>	
					<div class="input-field container-dataNascimento">
						  <input type="text" class="datepicker" id="dataNascimento" name="dataNascimento">
						<label>Data de Nascimento</label>
					</div>
					<div class="input-field container-peso">
						  <input type="text" id="peso" name="peso">
						<label>Peso</label>
					</div>
					<div class="input-field container-altura">
						  <input type="text" id="altura" name="altura">
						<label>Altura</label>
					</div>
				    <div class="input-field">
				    	<select>
				      		<option value="" disabled selected>Escolha seu objetivo</option>
				      		<option value="perder">Perder peso</option>
				      		<option value="manter">Manter peso</option>
				      		<option value="ganhar">Ganhar peso</option>
				    	</select>
				    	<label>Objetivo</label>
				    </div>		
					<!-- <button class="btn light-green darken-1" id="btnCadastrar">Cadastrar</button> -->
				</form>
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
			height: 600px;
			margin-left: 5% !important;
			margin-top: 10%;
			background-color: white;
			border-radius: 5px; 
			box-shadow: 0px 0px 50px 2px #aaa;
		}

		.input-field {
			width: 80%;
			margin-left: 10%;
		}


		#btnEntrar {
			margin-left: 30%;
		}

		.no-register {
			margin-left: 15%;
		}

		.container {
			width: 100% !important;
		}
	</style>
	<script type="application/javascript" src="/js/jquery-3.4.1.min.js"></script>
	<script type="application/javascript" src="/js/materialize.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
      		Materialize.updateTextFields();
      		$('select').material_select();
      		  $('.datepicker').pickadate({
    			selectMonths: true, // Creates a dropdown to control month
			    selectYears: 15, // Creates a dropdown of 15 years to control year,
			    today: 'Today',
			    clear: 'Clear',
			    close: 'Ok',
			    closeOnSelect: false, // Close upon selecting a date,
			    container: undefined, // ex. 'body' will append picker to body
  			});
      	});
	</script>