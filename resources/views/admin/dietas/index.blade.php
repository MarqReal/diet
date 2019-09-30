@extends('admin.layout.site')

	@section('titulo', 'Dietas')
	@section('painel', 'Dietas')


	@section('conteudo')
	<div class="row">
		<a href="/dieta/adicionar" class="waves-effect waves-light btn" id="btnAdicionar">Adicionar dieta</a>
	</div>
	<div class="row">
	<table id="tableDietas" class="striped">
		<thead>
			<tr>
				<th>Nome</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			@if(isset($dietas) && count($dietas) > 0)
				@foreach($dietas as $dieta)
					<tr id="line{{$dieta->id}}">
						<td>{{$dieta->nome}}</td>
						<td class="buttons-action">
							<a  href="/dieta/atualizar/{{$dieta->id}}" class="waves-effect orange darken-1 btn">Editar</a>
							<button class="waves-effect red darken-1 btn btn-excluir" id="{{$dieta->id}}">Excluir</button>
						</td>
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>
	</div>
	@endsection

	<style type="text/css">
		.brand-logo {
			white-space: nowrap;
			font-size: 20px !important;
		}
		#sair {
			margin: 0 274px;
    		position: absolute;
		}
		#tableDietas_length {
			display: none;
		}
		#btnAdicionar {
			margin-left: 27%;
    		margin-top: 2%;
		}
		.buttons-action {
			text-align: end !important;
		}
		th {
			text-align: center !important;
		}
	</style>
	<script type="application/javascript" src="/js/jquery-3.4.1.min.js"></script>
	<script type="application/javascript" src="/js/materialize.min.js"></script>
	<script type="application/javascript" src="/js/sweetalert2.min.js"></script>
	<script type="application/javascript" src="/js/jquery.dataTables.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$(".button-collapse").sideNav();
			$('#tableDietas').DataTable({
				"language": {
    				"sEmptyTable": "Nenhum registro encontrado",
				    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
				    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
				    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
				    "sInfoPostFix": "",
				    "sInfoThousands": ".",
				    "sLengthMenu": "_MENU_ resultados por página",
				    "sLoadingRecords": "Carregando...",
				    "sProcessing": "Processando...",
				    "sZeroRecords": "Nenhum registro encontrado",
				    "sSearch": "Pesquisar",
    				"oPaginate": {
			        	"sNext": "Próximo",
			        	"sPrevious": "Anterior",
			        	"sFirst": "Primeiro",
			        	"sLast": "Último"
    				},
    				"oAria": {
        				"sSortAscending": ": Ordenar colunas de forma ascendente",
        				"sSortDescending": ": Ordenar colunas de forma descendente"
    				}
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
									window.location.href = "/cms/login";
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
			$(".btn-excluir").click( function () {
      			Swal.fire({
  					title: 'Você tem certeza que quer excluir esta dieta?',
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
		    				url: '/dieta/excluir', // This is the url we gave in the route
		    				data: {'_method': 'DELETE', '_token': '{{csrf_token()}}', 'id': $(this).attr("id")}, // a JSON object to send back
					    	success: function(response){ // What to do if we succeed
								var resposta = JSON.parse(response);
								if (!resposta.error) {
									Swal.fire({
		  								title: 'Sucesso!',
		  								text: "Exclusão realizada com sucesso",
		  								type: 'success',
		  								confirmButtonText: 'Ok'
									}).then(() => {
										location.reload();
									});
									$("#line"+$(this).attr("id")).remove();
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

		});
	</script>
	