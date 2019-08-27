@extends('layout.site')
<body>
<header>
	<nav>
		<div class="nav-wrapper darken-4">
			<a href="#!" class="brand-logo"></a>
			<a href="/registro" id="perfil" data-activates="mobile" class="button-collapse"><i class="material-icons icons-top">person</i></a>
			<a href="#" id="sair" data-activates="mobile" class="button-collapse"><i class="material-icons icons-top">exit_to_app</i></a>
			{{Auth::user()->nome_usuario}}
		</div>
	</nav>
</header>
	@section('titulo', 'Alimentos')

	@section('conteudo')
		<div class="container">
		<div class="row">
		    <div class="col s12">
		      <ul class="tabs">
		        <li class="tab col s3"><a class="active" href="#mes">Destaques do mês</a></li>
		        <li class="tab col s3"><a  href="#todos">Todos alimentos</a></li>
		        
		      </ul>
		    </div>
		    <div id="mes" class="col s12">
				<ul class="collapsible" data-collapsible="accordion">
				    @foreach($destaques as $alimento)
				    <li>
				      <div class="collapsible-header"><i class="material-icons">room_service</i>{{$alimento->nome}}</div>
				      <div class="collapsible-body">
				      	<span>
				      		<br>Descrição: {{$alimento->descricao}}</br>
				      		<br>Carboidratos: {{$alimento->carboidrato}} (g)</br>
        					<br>Proteínas: {{$alimento->proteina}} (g)</br>
      						<br>Lipídios: {{$alimento->lipideos}} (g)</br>
        					<br>Fibra alimentar: {{$alimento->fibra_alimentar}} (g)</br>
							<br>Calorias (valor energético): {{$alimento->calorias}} (kcal)</br>	
				      	</span>
				      </div>
				    </li>
				    @endforeach
				</ul>
		    </div>
		    <div id="todos" class="col s12">
		    	Todos
		    </div>
		</div>
		<div class="row bottom-bar">
				<div class="col s3"><a href="/feed" id="perfil" data-activates="mobile" class="button-collapse"><i class="material-icons icons-top icons-bottom">comment</i></a></div>
				<div class="col s3"><a href="/alimentos" id="perfil" data-activates="mobile" class="button-collapse"><i class="material-icons icons-top icons-bottom">local_dining</i></a></div>
				<div class="col s3"><a href="/dieta" id="perfil" data-activates="mobile" class="button-collapse"><i class="material-icons icons-top icons-bottom">receipt</i></a></div>
				<div class="col s3"><a href="/grafico" id="perfil" data-activates="mobile" class="button-collapse"><i class="material-icons icons-top icons-bottom">pie_chart_outlined</i></a></div>
			</div>
		</div>	
	@endsection

	<style type="text/css">
		body,html{
		  overflow:hidden !important;
		}
		.bottom-bar {
  			overflow: hidden;
  			background-color: #333;
  			position: fixed;
  			bottom: -3%;
  			padding-bottom: 2%;
  			width: 110%;
  			background-color: #212121 !important;
		}
		.menu-bottom {
			background-color: #212121;
    		height: 7%;
		}
		.icons-bottom {
			color: white !important;
			padding-top: 15% !important;
    		padding-left: 20% !important;
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
      		$('ul.tabs').tabs('select_tab', 'tab_id');
			$('.collapsible').collapsible();
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