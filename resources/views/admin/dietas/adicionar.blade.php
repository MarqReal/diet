@extends('admin.layout.site')

	@section('titulo', 'Dietas')
	@section('painel', 'Dietas')


	@section('conteudo')
	<div class="row">
		<span class="title-page">Cadastro de dietas</span>
		@include('admin.dietas._form')
	</div>
	<div class="row">
		<button class="btn light-green darken-1" id="btnSalvar">Salvar</button>
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
		.title-page {
			padding-left: 30%;
		}
		.row-inputs {
			margin-left: 5% !important;
		}

		.row {
			margin-bottom: 0px !important;
		}
		#btnSalvar {
			margin-left: 30%;
		}
	</style>
	<script type="application/javascript" src="/js/jquery-3.4.1.min.js"></script>
	<script type="application/javascript" src="/js/materialize.min.js"></script>
	<script type="application/javascript" src="/js/sweetalert2.min.js"></script>
	<script type="application/javascript" src="/js/jquery.dataTables.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			var startDateYear = new Date().getFullYear();
			var DateMonth = new Date().getMonth();
			var DateDay = new Date().getDate();
			var arrCafeManha = [];
			var arrCafeTarde = [];
			var arrAlmoco = [];
			var arrJantar = [];

			Materialize.updateTextFields();
      		$('select').material_select();
      		$('.select-wrapper li').each( function() {
      			$(this).attr("nome", $(this).text());
      		});
      		$('#spaceCafeManha li').click( function() {
      			var li = $(this);
      			if ($(this).hasClass("active") == true) {
      				Swal.fire({
  						text: 'Digite a quantidade',
  						input: 'number'
					}).then(function(result) {
  						arrCafeManha[li.attr("nome")] = parseInt(result.value);
  						//console.log(arrCafeManha);
					});
      				console.log(arrCafeManha);
      			} else {
      				//arrCafeManha = arrCafeManha.filter(e => e !== 'Banana');
      				delete arrCafeManha[$(this).attr("nome")];
      				console.log(arrCafeManha);
      			}
      		});
      		$('#spaceAlmoco li').click( function() {
      			alert("opcoes almoco");
      			
      		});
      		$('#spaceCafeTarde li').click( function() {
      			alert("opcoes cafe da tarde");
      			
      		});
      		$('#spaceJantar li').click( function() {
      			alert("opcoes jantar");
      			
      		});
			$(".button-collapse").sideNav();
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
  			$('input[type="number"]').change( function() {
  				var number = parseInt($(this).val());
  				if (number <= 0) {
  					$(this).val(1);
  				}
  			});
      		$("#btnSalvar").click(function () {
      			if($("#nome").val()== "") {
      				Swal.fire('Preenchimento incorreto!', "Preencha o nome da dieta corretamente",'error');
	  				$("#nome").focus();
	  				return false;
				}
    //   			if($("#dt_inicio").val()== "") {
    //   				Swal.fire('Preenchimento incorreto!', "Preencha a data de inicio corretamente",'error');
	  	// 			//$("#dt_inicio").focus();
	  	// 			return false;
				// }
      			if($("#semanas").val() == "" || isNaN($("#semanas").val())) {
      				Swal.fire('Preenchimento incorreto!', "Preencha o periodo em semanas corretamente",'error');
	  				$("#semanas").focus();
	  				return false;
				}
      			if($("#objetivo option:selected").val()== "") {
      				Swal.fire('Preenchimento incorreto!', "Preencha o objetivo da dieta corretamente",'error');
	  				$("#objetivo").focus();
	  				return false;
				}
				if(!$("#cafeManha").val().length > 0) {
					Swal.fire('Preenchimento incorreto!', "Selecione o(s) alimento(s) para o Café da manhã",'error');
					$("#cafeManha").focus();
					return false;
				}
				if(!$("#almoco").val().length > 0) {
					Swal.fire('Preenchimento incorreto!', "Selecione o(s) alimento(s) para o Almoço",'error');
					$("#almoco").focus();
					return false;
				}
				if(!$("#cafeTarde").val().length > 0) {
					Swal.fire('Preenchimento incorreto!', "Selecione o(s) alimento(s) para o Café da Tarde",'error');
					$("#cafeTarde").focus();
					return false;
				}
				if(!$("#jantar").val().length > 0) {
					Swal.fire('Preenchimento incorreto!', "Selecione o(s) alimento(s) para a Jantar",'error');
					$("#jantar").focus();
					return false;
				}
				return false;
      			var data = {
      				'_token': '{{csrf_token()}}',
      				'nome' : $("#nome").val(),
      				'dt_inicio' : $("#dt_inicio").val(),
      				'semanas' : $("#semanas").val(),
      				'objetivo' : $("#objetivo option:selected").val(),
      				'cafeManha' : $("#cafeManha").val(),
      				'cafeTarde' : $("#cafeTarde").val(),
      				'almoco' : $("#almoco").val(),
      				'jantar' : $("#jantar").val()
      			};
      			console.log(data);
      			return false;
				$.ajax({
    				method: 'POST', // Type of response and matches what we said in the route
    				url: '/dieta/cadastrar', // This is the url we gave in the route
    				data: data, // a JSON object to send back
			    	success: function(response){ // What to do if we succeed
						var resposta = JSON.parse(response);
						if (!resposta.error) {
							Swal.fire({
  								title: 'Sucesso!',
  								text: "Dieta cadastrada com sucesso",
  								type: 'success',
  								confirmButtonText: 'Ok'
							}).then((result) => {
								window.location.href = "/dieta";
							});
						} else {
							Swal.fire('Erro!', "Não foi possivel realizar o cadastro, tente novamente",'error');
						} 
			    	},
			    	error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
			        	//console.log(JSON.stringify(jqXHR));
						Swal.fire('Erro!', "Não foi possivel realizar o cadastro, tente novamente",'error');
			        	//console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
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
		});
	</script>
	