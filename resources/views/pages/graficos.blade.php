@extends('layout.site')
<body>
<header>
	@section('titleNavbar', 'Progresso')
	@include('menu_top')
</header>
	@section('titulo', 'Progresso')

	@section('conteudo')
		<div class="container">
			<div class="row">
		   		<div class="row row-select-dietas">
		   			<div class="col s11">
						<div class="input-field">
					    	<select id="dietas">
					      		<option value="" disabled selected>Escolha a dieta</option>
					    		@foreach($dietas as $dieta)
					    			<option value="{{$dieta->id}}|{{$dieta->pivot->quantidade_participacao}}">{{$dieta->nome}} ({{ str_replace("-","/", date('d-m-Y', strtotime($dieta->pivot->dt_inicio)))}} à {{ str_replace("-","/", date('d-m-Y', strtotime($dieta->pivot->dt_termino)))}})</option>
					    		@endforeach
					    	</select>
					    	<label>Dietas</label>
					    </div>
					</div>
		   		</div>
			</div>
			<canvas id="myChart"></canvas>
			<div id="txtNoGraphic">Dados insuficientes para o montar o gráfico</div>
			<div class="row row-result" id="resultPeso">
				<div class=" col s4">
					<i class="material-icons icon-result">sentiment_very_satisfied</i></div>
				<div class="col s7 text-result">
					Parabéns! Você está perdendo peso, continue focado no seu objetivo!
				</div>
			</div>
		@include('menu_bottom')
		</div>	
	@endsection

	<style type="text/css">
		body,html{
		  overflow:hidden !important;
		}
		#txtNoGraphic, #myChart {
			display: none;
		}
		#txtNoGraphic {
			padding-left: 15%;
		}
		.nav-wrapper {
			background: #212121;
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

		.row-select-dietas {
			padding-left: 9%;
    		padding-top: 6%;
		}
		.icon-result {
			font-size: 90px !important;
			padding-left: 20% !important;
		}
		.text-result {
			padding-top: 3% !important;
		}
		.row-result {
			display: none;
			padding-top: 10% !important;
		}
	</style>
	<script type="application/javascript" src="/js/jquery-3.4.1.min.js"></script>
	<script type="application/javascript" src="/js/materialize.min.js"></script>
	<script type="application/javascript" src="/js/sweetalert2.min.js"></script>
	<script type="application/javascript" src="/js/Chart.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			var textResult = "";
			var ctx = document.getElementById('myChart').getContext('2d');
      		Materialize.updateTextFields();
      		$('ul.tabs').tabs('select_tab', 'tab_id');
			$('.collapsible').collapsible();
			$('select').material_select();
			$("#dietas").change(function () {
				var dadosDieta = $(this).val();
				if (dadosDieta != "") {
					dadosDieta = dadosDieta.split("|");
	  				$.ajax({
	    				method: 'GET', // Type of response and matches what we said in the route
	    				url: '/consultarGrafico', // This is the url we gave in the route
	    				data: {"dieta_id": dadosDieta[0], "quantidade_participacao": dadosDieta[1]}, // a JSON object to send back
				    	success: function(response){ // What to do if we succeed
							var resposta = JSON.parse(response);
							
							if (resposta.dados != null && !resposta.error) {
								$("#txtNoGraphic").hide();
								var chart = new Chart(ctx, {
					    			// The type of chart we want to create
					    			type: 'line',
					    			// The data for our dataset
					    			data: {
					        			labels: resposta.dados.data,
					        			datasets: [{
					            			label: 'Pesos',
					            			backgroundColor: 'rgb(0, 82, 204)',
					            			borderColor: 'rgb(0, 82, 204)',
					            			data: resposta.dados.peso,
					            			fill: false
					        			}]
					    			},
					    			// Configuration options go here
					    			options: {
					    				scales: {
										    yAxes: [{
										      scaleLabel: {
										        display: true,
										        labelString: 'Peso (Kg)'
										      }
										    }]
										},
					    				elements: {
            								line: {
                								tension: 0 // disables bezier curves
            								}
        								}
					    			}
								});
								$("#myChart").show();
								if (resposta.dados.resultado == "sucesso") {
									textResult = "Parabéns! Você está "+resposta.dados.progresso+" peso, continue focado no seu objetivo!";
									$(".icon-result").html('sentiment_very_satisfied').css("color", "#558b2f");
									$(".text-result").html(textResult);
								} else {
									textResult = "Ops! Você está "+resposta.dados.progresso+" peso, o seu objetivo é <b>"+resposta.dados.esperado+"</b>, continue persistindo! Você consegue! ";
									$(".icon-result").html('sentiment_very_dissatisfied').css("color", "#e53935");
									$(".text-result").html(textResult);
								}
								$(".row-result").show();			
							} else {
								$("#myChart").hide();
								$(".row-result").hide();
								$("#txtNoGraphic").show();
							} 
				    	},
				    	error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
							//Swal.fire('Erro!', "Não foi possivel realizar o logout, tente novamente",'error');
				    			}
					});
				}
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