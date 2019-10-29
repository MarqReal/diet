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
	@section('titleNavbar', 'Alimentos')
	@include('menu_top')
</header>
	@section('titulo', 'Alimentos')

	@section('conteudo')
		<div class="container">
		<div class="row">
		    <div class="col s12 choose-food">
		      <ul class="tabs">
		        <li class="tab col s3"><a class="active" href="#mes">Destaques do mês</a></li>
		        <li class="tab col s3"><a  href="#todos">Todos alimentos</a></li>
		        
		      </ul>
		    </div>
		    <div id="mes" class="col s11">
				<ul class="collapsible" data-collapsible="accordion">
				    @foreach($destaques as $alimento)
				    <li>
				      <div class="collapsible-header"><i class="material-icons">star_border</i>{{$alimento->nome}}</div>
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
		    <div id="todos" class="col s10">
		    	<div class="row">
		    		<div class="input-field col s12">
					    <select class="select-food" id="selectFood">
					      <option value="" disabled selected>Escolha o alimento</option>
					      @foreach($todos as $alimento)
					      <option nome="{{$alimento->nome}}" descricao="{{$alimento->descricao}}" carboidrato="{{$alimento->carboidrato}}" proteina="{{$alimento->proteina}}" lipideos="{{$alimento->lipideos}}"  fibra_alimentar="{{$alimento->fibra_alimentar}}" calorias="{{$alimento->calorias}}" value="{{$alimento->id}}">{{$alimento->nome}}</option>
					      @endforeach
					    </select>
					    <label></label>
					 </div>
					<ul id="collapseAll" class="collapsible" data-collapsible="accordion">
					    <li>
					      <div class="collapsible-header"><i class="material-icons">room_service</i><span id="nomeAlimento"></span></div>
					      <div class="collapsible-body" id="collapsibleBodyEdit">
					      </div>
					    </li>
					</ul>
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
            background-color:#1DA1F2 !important;
            color:white !important;
        }
        .tabs .tab a {
            color: #1DA1F2 !important;
        } 
         .tabs .indicator {
            background-color:#1DA1F2 !important;
        }
		
		.container {
			width: 100% !important;
		}
		#collapseAll {
			display: none;
		}
		#mes {
			margin-left: 4% !important;
		}
		#todos {
			margin-left: 9% !important;
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