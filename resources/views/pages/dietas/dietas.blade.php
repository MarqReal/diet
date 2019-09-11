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
	@include('menu_top')
</header>
	@section('titulo', 'Dietas')

	@section('conteudo')
		<div class="container">
			<div class="row">
		    	<a href="/dietas/adicionar" class="waves-effect waves-light btn" id="btnAdicionar">Adicionar dieta</a>
		    </div>
		  	@if(isset($todos) && count($todos) > 0)
			  	@foreach($todos as $dieta)
				  	<div class="row custom-cards">
				    	<div class="col s12 m5">
				      		<div class="card-panel  blue">
				        		<div class="row no-margin-bottom title-diet">
				        			<span><i>{{$dieta->nome}}</i></span>
				        			<i class="material-icons icon-eye" id="{{$dieta->id}}">remove_red_eye</i>
				        		</div>
				        		<div class="row no-margin-bottom">
				        			<div class="col s6"> Inicio: {{  date('d/m/Y', strtotime(str_replace('/', '-', $dieta->pivot->dt_inicio))) }}</div>
				        			<div class="col s6"> Término: {{  date('d/m/Y', strtotime(str_replace('/', '-', $dieta->pivot->dt_termino))) }}</div>
				        		</div>
				      		</div>
				    	</div>
				  	</div>
				@endforeach
		  	@endif
		</div>
		@include('menu_bottom')
		</div>	
	@endsection

	<style type="text/css">
		body,html{
		  overflow:hidden !important;
		}
		.select-food {
			width: 80%;
			margin-left: 10%;
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
		.tabs .tab a.active {
            background-color:#fb8c00 !important;
            color:white !important;
        }
        .tabs .tab a {
            color: #fb8c00 !important;
        } 
         .tabs .indicator {
            background-color:#fb8c00 !important;
        }
		
		.container {
			width: 100% !important;
		}
		#collapseAll {
			display: none;
		}
		#btnAdicionar {
			margin-left: 25% !important;
    		margin-top: 5% !important;
		}
		.no-margin-bottom {
			margin-bottom: 0px !important;
		}
		.title-diet {
			padding-left: 40%;
		}
		.card-panel {
			padding: 9px !important;
		}
		.icon-eye {
			padding-left: 40% !important;
		}
		.custom-cards {
			color: white !important;
			font-size: larger;
			width: 100% !important;
    		margin-left: 1px !important;
		}
	</style>
	<script type="application/javascript" src="/js/jquery-3.4.1.min.js"></script>
	<script type="application/javascript" src="/js/materialize.min.js"></script>
	<script type="application/javascript" src="/js/sweetalert2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
      		Materialize.updateTextFields();
      		$('ul.tabs').tabs('select_tab', 'tab_id');
			$('.collapsible').collapsible();
			$('select').material_select();
			$(".icon-eye").click( function() {
				window.location = "/dietas/consultar/"+$(this).attr("id");
			});
			$("#selectFood").change( function() {
				if ($("#selectFood option:selected").val() != "") {
					var descricao = $("#selectFood option:selected").attr("descricao");
					var carboidrato = $("#selectFood option:selected").attr("carboidrato");
					var proteina = $("#selectFood option:selected").attr("proteina");
					var lipideos = $("#selectFood option:selected").attr("lipideos");
					var fibra_alimentar = $("#selectFood option:selected").attr("fibra_alimentar");
					var calorias = $("#selectFood option:selected").attr("calorias");
					var nome = $("#selectFood option:selected").attr("nome");
					var corpo = "<span><br>Descrição: "+descricao+"</br><br>Carboidratos: "+carboidrato+" (g)</br><br>Proteínas: "+proteina+" (g)</br><br>Lipídios: "+lipideos+" (g)</br><br>Fibra alimentar: "+fibra_alimentar+" (g)</br><br>Calorias (valor energético): "+calorias+" (kcal)</br></span>";
					$("#nomeAlimento").html(nome);
					$("#collapsibleBodyEdit").html(corpo);
					$("#collapseAll").show();
				} else {
					$("#collapseAll").hide();
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