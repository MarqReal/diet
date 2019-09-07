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
			    <div class="col s12 m6">
			      <div class="card blue-grey darken-1">
			        <div class="card-content white-text">
			          <span class="card-title">Nota</span>
			          <p>As recomendações de dietas abaixo são baseadas no seu objetivo (<span class="style-objetivo">{{Auth::user()->relacao->situacao}}</span>), cadastrado no seu perfil.</p>
			        </div>
			      </div>
			    </div>
			</div>
			<div class="row">
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
		#btnAdicionar {
			margin-left: 25% !important;
    		margin-top: 5% !important;
		}
		#dietas ul {
			display: none;
		}
	</style>
	<script type="application/javascript" src="/js/jquery-3.4.1.min.js"></script>
	<script type="application/javascript" src="/js/materialize.min.js"></script>
	<script type="application/javascript" src="/js/sweetalert2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
      		Materialize.updateTextFields();
			$('.collapsible').collapsible();
			$('select').material_select();
			$("#select-diets").change( function() {
				if ($("#select-diets option:selected").val() != "") {
					$("#dieta"+$(this).val()).show();
				} else {
					$("ul[id*='dieta']").each( function() {
						$(this).hide();
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