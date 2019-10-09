@extends('layout.site')
<body background="{{$img}}">
<header>
	@section('titleNavbar', 'Dietas')
	@include('menu_top')
</header>
	@section('titulo', 'Dietas')

	@section('conteudo')
		<div class="container">
		    <div class="row">
		    	<a href="#" dieta="{{$id}}" participacao="{{$participacao}}" class="waves-effect red darken-1 btn" id="btnEncerrar">Encerrar dieta</a>
		    </div>
<!-- 		    <div class="row">
		    	<a href="#" class="waves-effect white darken-1 btn title-diet">{{$dieta->nome}}</a>
		    </div> -->
		    <div class="msg msg-info z-depth-3">{{$dieta->nome}}</div>
		    <!-- <div class="row">
		    	<span class="title-diet">{{$dieta->nome}}</span>
		    </div> -->
		    <div class="row" id="dieta-infos">
				<div id="dietas" class="col s12">
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
				</div>
  			</div>
  			<div class="msg msg-cal z-depth-3 msg-custom-cal">Total de calorias: {{$calorias}} (kcal)</div>
		</div>
		@include('menu_bottom')
		</div>	
	@endsection

	<style type="text/css">
		body,html{
		  overflow:hidden !important;
		}
		.collapsible-body{
			background-color: white !important;
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
		.title-diet {
			color: black !important;
			font-size: 14px !important;
			margin-left: 26% !important;
    		margin-top: 2% !important;
    		margin-bottom: -10px !important;
		}
		#dieta-infos {
			width: 100% !important;
    		margin-left: 2px !important;
    		margin-top: 0% !important;
		}
		#btnEncerrar {
			margin-left: 29% !important;
    		margin-top: 3% !important;
    		margin-bottom: -10px !important;
		}
		.msg {
  			width: 90%;
  			border: 1px solid;
  			padding:10px;
  			margin: 20px;
  			color: grey;
  			text-align: center;
    		font-size: 16px;
    		margin-top: 26% !important;
		}
		.msg-custom-cal {
			/*text-align: left;*/
			margin-top: 7% !important;
		}
		.msg-info {
  			border-color: black;
  			background-color: black;
  			color: white;
		}
		.msg-cal {
  			border-color: white;
  			background-color: white;
  			color: black;
		}
	</style>
	<script type="application/javascript" src="/js/jquery-3.4.1.min.js"></script>
	<script type="application/javascript" src="/js/materialize.min.js"></script>
	<script type="application/javascript" src="/js/sweetalert2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
      		Materialize.updateTextFields();
			$('.collapsible').collapsible();
      		$("#btnEncerrar").click(function () {
      			Swal.fire({
  					title: 'Atenção!',
  					text: "Deseja encerrar a dieta?",
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
    						url: '/dietas/removerParticipacao', // This is the url we gave in the route
    						data: {'_method': 'DELETE', '_token': '{{csrf_token()}}', 'participacao': $("#btnEncerrar").attr("participacao"), 'dieta' : $("#btnEncerrar").attr("dieta")}, // a JSON object to send back
			    			success: function(response){ // What to do if we succeed
								var resposta = JSON.parse(response);
								if (!resposta.error) {
									Swal.fire({
		  								title: 'Sucesso!',
		  								text: "Encerramento da dieta realizada com sucesso",
		  								type: 'success',
		  								confirmButtonText: 'Ok'
									}).then((result) => {
										window.location.href = "/dietas";
									});
								} else {
									Swal.fire('Erro!', "Não foi possivel encerrar a dieta, tente novamente",'error');
								} 
			    			},
			    			error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
			        		//console.log(JSON.stringify(jqXHR));
							Swal.fire('Erro!', "Não foi possivel encerrar a dieta, tente novamente",'error');
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