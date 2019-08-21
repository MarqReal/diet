<body background="/img/login/alimentos-background.jpg">
	@extends('layout.site')

	@section('titulo', 'Registrar')

	@section('conteudo')
		<div class="container">
			<!-- <h3 class="center">D!ET</h3> -->
			<div class="row background-login">
				<i class="material-icons blue-text" id="back"><a href="{{route('site.home')}}">arrow_back</a></i>
				@if(Auth::user())
					<i class="material-icons red-text" id="remove">delete</i>
				@endif
				<!-- <form class="" action="{{route('site.login.entrar')}}" method="post" enctype="multipart/form-data"> -->
					<!-- {{csrf_field()}} -->
					<div class="row">
						<div class="col s10">
							<div class="input-field container-nome">
								<input type="text" id="nome" name="nome" value="{{isset(Auth::user()->nome_usuario) ? Auth::user()->nome_usuario : '' }}">
								<label>Nome (Ex: Ana Silva)</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s10">
							<div class="input-field container-email">
								<input type="text" id="email" name="email" value="{{isset(Auth::user()->email) ? Auth::user()->email : ''}}">
								<label>Email (Ex: ana@gmail.com)</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s10">
							<div class="input-field container-senha">
								<input type="password" id="senha" name="senha">
								<label>Senha (Deve conter 8 caracteres)</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s10">	
							<div class="input-field container-dataNascimento">
								  <input type="text" class="datepicker" id="dataNascimento" name="dataNascimento" value="{{ isset(Auth::user()->dt_nascimento) ? date('d/m/Y', strtotime(str_replace('/', '-', Auth::user()->dt_nascimento))) : ''}}">
								<label>Data de Nascimento (Ex: 28/03/1996)</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field container-peso">
							  	<input type="number" id="peso" name="peso" min="30" max="300" step="any" value="{{isset(Auth::user()->relacao->peso) ? Auth::user()->relacao->peso : ''}}">
								<label>Peso (Ex: 40,50)</label>
							</div>
						</div>
						<div class="col s5">
							<div class="input-field container-altura">
							  	<input type="number" id="altura" name="altura" min="1" max="3" step="any" value="{{isset(Auth::user()->relacao->altura) ? Auth::user()->relacao->altura : ''}}">
								<label>Altura (Ex: 1,67)</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<div class="input-field">
					    		<select id="objetivo">0
					      			<option value="" disabled selected>Objetivo</option>
					      			<option value="perder" {{(isset(Auth::user()->relacao->situacao) && Auth::user()->relacao->situacao == "perder") ? "selected" : ""}}>Perder peso</option>
					      			<option value="manter" {{(isset(Auth::user()->relacao->situacao) && Auth::user()->relacao->situacao == "manter") ? "selected" : ""}}>Manter peso</option>
					      			<option value="ganhar" {{( isset(Auth::user()->relacao->situacao) && Auth::user()->relacao->situacao == "ganhar") ? "selected" : ""}}>Ganhar peso</option>
					    		</select>
					    		<label>Objetivo</label>
					    	</div>
					    </div>
					    <div class="col s5">
							<div class="input-field">
					    		<select id="atividade">
					      			<option value="" disabled selected>Nivel</option>
					      			<option value="leve" {{( isset(Auth::user()->relacao->nivel_atividade) && Auth::user()->relacao->nivel_atividade == "leve") ? "selected" : ""}}>Leve</option>
					      			<option value="moderada" {{( isset(Auth::user()->relacao->nivel_atividade) && Auth::user()->relacao->nivel_atividade == "moderada") ? "selected" : ""}}>Moderada</option>
					      			<option value="alta" {{( isset(Auth::user()->relacao->nivel_atividade) && Auth::user()->relacao->nivel_atividade == "alta") ? "selected" : ""}}>Alta</option>
					    		</select>
					    		<label>Nivel de atividade</label>
					    	</div>
					    </div>
					</div>
					<div class="row">
						<div class="col s10">
							<div class="input-field">
					    		<select multiple id="nutricionistas">
					      			<option value="" disabled selected>Nutricionistas</option>
					      			<option value="1">Weber Lucas</option>
					      			<option value="2">Leandro Thomas</option>
					      			<option value="3">Carlos Alberto</option>
					    		</select>
					    		<label>Nutricionistas</label>
					    	</div>
					    </div>
					</div>
					@if(Auth::guest())		
					 <button class="btn light-green darken-1" id="btnCadastrar">Cadastrar</button>
					@else
					 <button class="btn light-green darken-1" id="btnCadastrar">Editar</button>
					@endif
				<!-- </form> -->
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
			height: 630px;
			margin-left: 5% !important;
			margin-top: 5%;
			background-color: white;
			border-radius: 5px; 
			box-shadow: 0px 0px 50px 2px #aaa;
			padding-top: 3%;
		}

		.input-field {
			/*width: 80%;*/
			margin-left: 10%;
		}


		#btnCadastrar {
			margin-left: 25%;
		}

		.no-register {
			margin-left: 15%;
		}

		.container {
			width: 100% !important;
		}

		.row {
			margin-bottom: 0px !important;
		}
		#back {
			cursor: pointer !important;
			padding-left: 5%;
			font-size: 25px !important;
		}

		#remove {
			padding-left: 70% !important;
		}
	</style>
	<script type="application/javascript" src="/js/jquery-3.4.1.min.js"></script>
	<script type="application/javascript" src="/js/materialize.min.js"></script>
	<script type="application/javascript" src="/js/sweetalert2.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function () {
			var startDateYear = new Date().getFullYear() - 60;
      		var endDateYear = new Date().getFullYear() - 18;
      		var DateMonth = new Date().getMonth();
      		var DateDay = new Date().getDate();
      		Materialize.updateTextFields();
      		$('select').material_select();
      		  $('.datepicker').pickadate({
      		  	format: 'dd/mm/yyyy',
      		  	min: new Date(startDateYear,DateMonth,DateDay),
  				max: new Date(endDateYear,DateMonth,DateDay),
      		  	monthsFull: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
      		  	monthsShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
      		  	weekdays: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta"],
      		  	weekdaysShort: ["Dom","Seg", "Ter", "Qua", "Qui", "Sex", "Sab"],
      		  	weekdaysAbbrev: ["D","S", "T", "Q", "Q", "S", "S"],
    			selectMonths: true, // Creates a dropdown to control month
			    selectYears: 60, // Creates a dropdown of 15 years to control year,
			    clear: 'Limpar',
			    close: 'Ok',
			    today: "hoje",
			    closeOnSelect: false, // Close upon selecting a date,
			    container: undefined, // ex. 'body' will append picker to body
  			});

      		$("#btnCadastrar").click(function() {
      			var letters = /[a-zA-Z\u00C0-\u00FF ]+/i;
      			if($("#nome").val() == "" || $("#nome").val().length < 8 || !$("#nome").val().match(letters)) {
      				Swal.fire('Preenchimento incorreto!', 'Preencha o campo NOME corretamente','error');
					$("#nome").focus();
					return false;
				}
				if($("#email").val()=="" || $("#email").val().indexOf('@')== -1 || $("#email").val().indexOf('.')== -1) {
      				Swal.fire('Preenchimento incorreto!', "Preencha o campo EMAIL corretamente",'error');
	  				$("#email").focus();
	  				return false;
				}
				if($("#senha").val() == "" || $("#senha").val().length < 8 || $("#senha").val().length > 8) {
					Swal.fire('Preenchimento incorreto!', "Preencha o campo SENHA corretamente, a senha deve conter 8 caracteres",'error');
					$("#senha").focus();
					return false;
				}
				if($("#dataNascimento").val() == "") {
					Swal.fire('Preenchimento incorreto!', "Preencha o campo Data de nascimento corretamente",'error');
					return false;
				}
				if ($("#peso").val() == "" || isNaN($("#peso").val())) {
					Swal.fire('Preenchimento incorreto!', "Preencha o campo peso corretamente",'error');
					$("#peso").focus();
					return false;
				}
				if ($("#altura").val() == "" || isNaN($("#altura").val())) {
					Swal.fire('Preenchimento incorreto!', "Preencha o campo altura corretamente",'error');
					$("#altura").focus();
					return false;
				}
				if($("#objetivo option:selected").val() == "") {
					Swal.fire('Preenchimento incorreto!', "Selecione o seu objetivo",'error');
					$("#objetivo").focus();
					return false;
				}
				if($("#atividade option:selected").val() == "") {
					Swal.fire('Preenchimento incorreto!', "Selecione o seu nivel de atividade fisica",'error');
					$("#nivel_atividade").focus();
					return false;
				}
				if(!$("#nutricionistas").val().length > 0) {
					Swal.fire('Preenchimento incorreto!', "Selecione o(s) seu(s) nutricionista(s)",'error');
					$("#nutricionistas").focus();
					return false;
				}
      			var data = {
      				'_token': '{{csrf_token()}}',
      				'nome_usuario' : $("#nome").val(),
      				'email' : $("#email").val(),
      				'senha' : $("#senha").val(),
      				'dt_nascimento' : $("#dataNascimento").val(),
      				'peso' : parseFloat($("#peso").val()),
      				'altura' : parseFloat($("#altura").val()),
      				'objetivo' : $("#objetivo option:selected").val(),
      				'nivel_atividade' : $("#atividade option:selected").val(),
      				'nutricionistas' : $("#nutricionistas").val()
      			};
      			$.ajax({
    				method: 'POST', // Type of response and matches what we said in the route
    				url: '/registrar', // This is the url we gave in the route
    				data: data, // a JSON object to send back
			    	success: function(response){ // What to do if we succeed
						var resposta = JSON.parse(response);
						if (resposta.code == 1) {
							Swal.fire({
  								title: 'Sucesso!',
  								text: "Cadastro realizado com sucesso",
  								type: 'success',
  								confirmButtonText: 'Ok'
							}).then((result) => {
								window.location.href = "/";
							});
						}

						if (resposta.code == 23000) {
							Swal.fire({
  								title: 'Erro!',
  								text: "Já existe uma conta com este E-mail",
  								type: 'error',
  								confirmButtonText: 'Ok'
							});	
						}
			    	},
			    	error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
			        	//console.log(JSON.stringify(jqXHR));
						Swal.fire('Erro!', "Não foi possivel realizar o cadastro, tente novamente",'error');
			        	//console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
			    	}
				});
      		});

      		$("#remove").click( function () {

      			Swal.fire({
  					title: 'Você tem certeza que quer excluir sua conta?',
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
		    				method: 'POST', // Type of response and matches what we said in the route
		    				url: 'login/excluir', // This is the url we gave in the route
		    				data: {'_method': 'delete', '_token': '{{csrf_token()}}'}, // a JSON object to send back
					    	success: function(response){ // What to do if we succeed
								var resposta = JSON.parse(response);
								if (!resposta.error) {
									Swal.fire({
		  								title: 'Sucesso!',
		  								text: "Exclusão realizada com sucesso",
		  								type: 'success',
		  								confirmButtonText: 'Ok'
									}).then((result) => {
										window.location.href = "/";
									});
								}
					    	},
					    	error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
					        	//console.log(JSON.stringify(jqXHR));
								Swal.fire('Erro!', "Não foi possivel realizar a exclusão, tente novamente",'error');
					        	//console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
					    	}
						});	
  					}
				});
      		});

      		$("#peso, #altura").change( function() {
      			if (isNaN($(this).val())) {
      				$(this).val($(this).attr("min"));
      				return false;
      			}
      			var min = parseFloat($(this).attr("min"));
      			var max = parseFloat($(this).attr("max"));
      			var current = parseFloat($(this).val());
      			if(current < min || current > max) {
      				$(this).val(min);
      			}
      		});
      	});
	</script>