@extends('layout.site')
<body>
<header>
	<!-- <nav>
		<div class="nav-wrapper darken-4">
			<a href="#!" class="brand-logo"></a>
			<a href="/registro" id="perfil" data-activates="mobile" class="button-collapse"><i class="material-icons icons-top">person</i></a>
			<a href="#" id="sair" data-activates="mobile" class="button-collapse"><i class="material-icons icons-top">exit_to_app</i></a>
			{{Auth::user()->nome_usuario}}
		</div>
	</nav> -->
	@section('titleNavbar', 'Dietas')
	@include('menu_top')
</header>
	@section('titulo', 'Dietas')

	@section('conteudo')
		<div class="container">
			<div class="row no-margin-bottom">
			    <div class="col s12 m6">
			      <div class="card blue-grey darken-1 card-formato">
			        <div class="card-content white-text">
			          <span class="card-title">Nota</span>
			          <p>As recomendações de dietas abaixo são baseadas no seu objetivo (<span class="style-objetivo">{{Auth::user()->relacao->situacao}}</span>).</p>
			        </div>
			      </div>
			    </div>
			</div>
			<div class="row no-margin-bottom">
				<div class="input-field col s8 select-diet">
				    <select id="select-diets">
				      <option value="" selected>Escolha a dieta</option>
					    @foreach($dietas as $dieta)
					      <option value="{{$dieta->id}}">{{$dieta->nome}}</option>
					    @endforeach
				    </select>
				    <label></label>
				 </div>
		    </div>
		    <div class="row" id="tabsDieta">
			    <div class="col s12">
			      <ul class="tabs">
			        <li class="tab col s3"><a  href="#detalhes" id="tabDetalhe">Detalhes </a></li>
			        <li class="tab col s3"><a  href="#periodo">Periodo</a></li>
			      </ul>
			    </div>
    			<div id="detalhes" class="col s12">
					<div class="row">
				    	<div id="dietas" class="col s12">
				    		@foreach($dietas as $dieta)
				    		<ul id="dieta{{$dieta->id}}" class="collapsible" data-collapsible="accordion">
							    <li>
							      <div class="collapsible-header"><i class="material-icons">free_breakfast</i>Café da Manhã</div>
							      <div class="collapsible-body">
							      	@foreach($dieta->cafeManha as $item)
							      		<span>{{$item->nome}} : {{$item->pivot->quantidade}} {{$item->porcao}} </span><br>
							      	@endforeach
							      </div>
							    </li>
							    <li>
							      <div class="collapsible-header"><i class="material-icons">local_dining</i>Almoço</div>
							      <div class="collapsible-body">
							      	@foreach($dieta->almoco as $item)
							      		<span>{{$item->nome}} : {{$item->pivot->quantidade}} {{$item->porcao}} </span><br>
							      	@endforeach
							    </li>
							    <li>
							      <div class="collapsible-header"><i class="material-icons">local_bar</i>Café da Tarde</div>
							      <div class="collapsible-body">
							      	@foreach($dieta->cafeTarde as $item)
							      		<span>{{$item->nome}} : {{$item->pivot->quantidade}} {{$item->porcao}} </span><br>
							      	@endforeach
							    </li>
							    <li>
							      <div class="collapsible-header"><i class="material-icons">room_service</i>Jantar</div>
							      <div class="collapsible-body">
							      	@foreach($dieta->jantar as $item)
							      		<span>{{$item->nome}} : {{$item->pivot->quantidade}} {{$item->porcao}} </span><br>
							      	@endforeach
							      </div>
							    </li>
		  					</ul>
		  					@endforeach
				    	</div>
		    		</div>    				
    			</div>
    			<div id="periodo" class="col s12">
    				<div class="row">
  						<div class="col s9 row-inputs"> 
    						<div class="input-field container-dataNascimento">
      							<input type="text" class="datepicker" id="dt_inicio" name="dt_inicio" value="">
      							<label>Data de inicio (Ex: 10/09/2019)</label>
    						</div>
  						</div>
					</div>
					<div class="row">
    					<div class="input-field col s10 row-inputs">
					      <select id="qtdSemanas">
					        	<option value="" disabled selected>Semanas</option>
					        	<option value="1">1 Semana</option>
					        	<option value="2">2 Semanas</option>
					        	<option value="3">3 Semanas</option>
					        	<option value="4">4 Semanas</option>
					        	<option value="5">5 Semanas</option>
					        	<option value="6">6 Semanas</option>
					        	<option value="7">7 Semanas</option>
					        	<option value="8">8 Semanas</option>
					      	</select>
      						<label>Duração em semanas</label>
    					</div> 
					</div>
					<div class="row">
						<button class="waves-effect light-green darken-1 btn" id="btnIniciar">Iniciar</button>
					</div>
    			</div>
  			</div>
		</div>
		<!-- <div class="row bottom-bar">
				<div class="col s3"><a href="/feed" id="perfil" data-activates="mobile" class="button-collapse"><i class="material-icons icons-top icons-bottom">comment</i></a></div>
				<div class="col s3"><a href="/alimentos" id="perfil" data-activates="mobile" class="button-collapse"><i class="material-icons icons-top icons-bottom">local_dining</i></a></div>
				<div class="col s3"><a href="/dieta" id="perfil" data-activates="mobile" class="button-collapse"><i class="material-icons icons-top icons-bottom">receipt</i></a></div>
				<div class="col s3"><a href="/grafico" id="perfil" data-activates="mobile" class="button-collapse"><i class="material-icons icons-top icons-bottom">pie_chart_outlined</i></a></div>
		</div> -->
		@include('menu_bottom')
		</div>	
	@endsection

	<style type="text/css">
		body,html{
		  overflow:hidden !important;
		}
		.style-objetivo {
			color: #ffd54f; 
		}
		.select-diet {
			margin-left: 15% !important;
		}
		.nav-wrapper {
			background: #212121;
		}
		.choose-food {
			margin-bottom: 1% !important;
			margin-top: 1%;
		}
		.icons-top {
			font-color: white !important;
		}

		#sair {
			left: 68%;
		}
		
		.container {
			width: 100% !important;
		}
		#collapseAll {
			display: none;
		}
		#dietas ul, #tabsDieta {
			display: none;
		}
		.no-margin-bottom {
			margin-bottom: 0px !important;
		}
		.row-inputs {
			margin-left: 10% !important;
    		margin-top: 2% !important;
    		width: 75.333333% !important;
		}
		#btnIniciar {
			margin-left: 33%;
		}
		.card .card-content .card-title {
			margin-bottom: 0px !important;
		}
		.card-formato {
			height: 20% !important;
    		width: 81% !important;
    		margin-left: 10% !important;
    		margin-bottom: 0px !important;
		}
		.title-class-format {
			position: relative;
		    max-width: 100%;
		    margin: 0 0 .4em;
		    padding: 0;
		    color: #595959;
		    font-size: 1.2em !important;
		    font-weight: 600;
		    text-align: center;
		    text-transform: none;
		    word-wrap: break-word;
		}
	</style>
	<script type="application/javascript" src="/js/jquery-3.4.1.min.js"></script>
	<script type="application/javascript" src="/js/materialize.min.js"></script>
	<script type="application/javascript" src="/js/sweetalert2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			var startDateYear = new Date().getFullYear();
			var DateMonth = new Date().getMonth();
			var DateDay = new Date().getDate();
      		Materialize.updateTextFields();
			$('.collapsible').collapsible();
			$('select').material_select();
			$('.datepicker').pickadate({
      		  	format: 'dd/mm/yyyy',
      		  	min: new Date(startDateYear,DateMonth,DateDay),
  				max: new Date(startDateYear,"12","31"),
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
			$("#select-diets").change( function() {
				if ($("#select-diets option:selected").val() != "") {
					$("#tabsDieta").show();
					$("#dieta"+$(this).val()).show();
					$("#tabDetalhe").click();
				} else {
					$("#tabsDieta").hide();
					$("ul[id*='dieta']").each( function() {
						$(this).hide();
					});
				}
				
			});
			$("#btnIniciar").click( function () {
				if($("#dt_inicio").val() == "") {
					Swal.fire('Preenchimento incorreto!', "Preencha o campo Data de inicio corretamente",'error');
					return false;
				}
				if($("#qtdSemanas option:selected").val() == "") {
					Swal.fire('Preenchimento incorreto!', "Preencha o campo Quantidade em semanas corretamente",'error');
					return false;
				}
				var dataFinal = $("#dt_inicio").val();
				dataFinal = dataFinal.split("/");
				dataFinal = new Date(dataFinal[2], (dataFinal[1]-1), dataFinal[0]);
				dataFinal.setDate(dataFinal.getDate() + (parseInt($("#qtdSemanas option:selected").val()) * 7));
				var auxmes = dataFinal.getMonth() + 1;
				var mesFinal =  (auxmes<10) ? "0"+auxmes : auxmes;
				var diaFinal =  (dataFinal.getDate()<10) ? "0"+dataFinal.getDate() : dataFinal.getDate();
				var dataFinal = diaFinal + "/" + mesFinal + "/" + dataFinal.getFullYear(); 
				Swal.fire({
  					title: "Atenção!",
  					text: 'Você participara da dieta "'+$("#select-diets option:selected").text()+'" no periodo de '+$("#dt_inicio").val() +' à '+ dataFinal+", confirma a participação?",
  					type: 'warning',
  					showCancelButton: true,
  					confirmButtonColor: '#3085d6',
  					cancelButtonColor: '#d33',
  					confirmButtonText: 'Sim',
  					cancelButtonText : 'Cancelar',
  					customClass: {
  						title: 'title-class-format'
  					}
				}).then((result) => {
  					if (result.value) {
  						var data = {
  							'_token': '{{csrf_token()}}',
  							'dieta_id' : $("#select-diets option:selected").val(),
  							'dt_inicio' : $("#dt_inicio").val(),
  							'dt_final'  : dataFinal,
  							'qtdSemanas' : $("#qtdSemanas option:selected").val()   
  						};
		      			$.ajax({
		    				method: 'POST', // Type of response and matches what we said in the route
		    				url: '/dietas/participar', // This is the url we gave in the route
		    				data: data, // a JSON object to send back
					    	success: function(response){ // What to do if we succeed
								var resposta = JSON.parse(response);
								if (!resposta.error) {
									Swal.fire({
		  								title: 'Sucesso!',
		  								text: "Inicio da dieta realizada com sucesso",
		  								type: 'success',
		  								confirmButtonText: 'Ok'
									}).then((result) => {
										window.location.href = "/dietas";
									});
								} else {
									Swal.fire({
		  								title: 'Erro!',
		  								text: "Não foi possível iniciar a dieta",
		  								type: 'error',
		  								confirmButtonText: 'Ok'
									});
								}	
					    	},
					    	error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
					        	console.log(JSON.stringify(textStatus));
								Swal.fire('Erro!', "Não foi possível iniciar a dieta, tente novamente",'error');
					        	//console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
					    	}
						});
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
									window.location.href = "/";
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