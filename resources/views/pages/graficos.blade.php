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
	@section('titleNavbar', 'Graficos')
	@include('menu_top')
</header>
	@section('titulo', 'Graficos')

	@section('conteudo')
		<div class="container">
			<div class="row">
		   		<div class="row row-select-dietas">
		   			<div class="col s11">
						<div class="input-field">
					    	<select id="atividade">
					      		<option value="" disabled selected>Escolha a dieta</option>
					    		@foreach($dietas as $dieta)
					    			<option>{{$dieta->nome}} ({{ str_replace("-","/", date('d-m-Y', strtotime($dieta->pivot->dt_inicio)))}} à {{ str_replace("-","/", date('d-m-Y', strtotime($dieta->pivot->dt_termino)))}})</option>
					    		@endforeach
					    	</select>
					    	<label>Dietas</label>
					    </div>
					</div>
		   		</div>
			</div>
		@include('menu_bottom')
		</div>	
	@endsection

	<style type="text/css">
		body,html{
		  overflow:hidden !important;
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