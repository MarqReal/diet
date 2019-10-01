@extends('layout.site')
<body background="{{$img}}">
<header>
	@section('titleNavbar', 'Dicas')
	@include('menu_top')
</header>
	@section('titlePage', 'Dicas nutricionais')
	@section('titulo', 'Feed de dicas')

	@section('conteudo')
			<input type="hidden" name="devePesar" id="devePesar" value="{{$devePesar}}">
			<div class="row feed" id="app-feed" v-cloak>
				<div class="feed-item blog" v-for="tweet in tweets">
					<div class="icon-holder">
						<div class="icon" v-bind:style="{ 'background-image': 'url(' + tweet.imagem + ')' }"></div>
					</div>
					<div class="text-holder col s6">
						<div class="feed-title"><b>@{{tweet.nome}}</b></div>
							<div class="feed-description">
								@{{tweet.mensagem}}
							</div>
					</div>
					<div class="feed-date">@{{tweet.data}}</div>
				</div>
				<div class="feed-item blog custom-feed-item-preloader" style="height: 87px !important;">
					<div class="icon-holder">
						<div class="icon">
							<div class="preloader-wrapper big active custom-preloader">
			    				<div class="spinner-layer spinner-blue-only">
			      					<div class="circle-clipper left">
			       						<div class="circle"></div>
			      					</div>
			      					<div class="gap-patch">
			        					<div class="circle"></div>
			      					</div>
			      					<div class="circle-clipper right">
			        					<div class="circle"></div>
			      					</div>
			    				</div>
  							</div>
						</div>
					</div>
					<div class="text-holder col s6">
						<div class="feed-title"><b>Buscando por dicas...</b></div>
							<div class="feed-description">
								Nenhuma dica foi encontrada
							</div>
					</div>
				</div>
			</div>
			@include('menu_bottom')			
		</div>	
	@endsection

	<style type="text/css">
		body {
			overflow:hidden !important;
		}
		.custom-feed-item-preloader {
			margin-top: 50% !important;
			height: 87px !important;
		}
		.custom-preloader {/*
    		margin-top: -97% !important;
    		margin-left: 41% !important;*/
    		margin-top: -23% !important;
    		margin-left: -6% !important;
    		display: none;
		}
		.feed-description {
			color: black !important;
		}
		.feed-date {
			color: grey !important;
		}
		[v-cloak] {
			display: none
		}
		.feed {
			/*border: solid black 2px;*/
			margin-top: 2% !important;
    		height: 84% !important;
    		width: 96% !important;
    		margin-left: 2% !important;
    		overflow-y: scroll !important;
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
		.feed-item {
  			display: block;
  			width: 100%;
      		height: 113px !important;
      		margin-bottom: 9px !important;
  			background: white;
  			padding-left: -100px;
  			box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23) !important;
  			transition:  0.7s;
		}
		.feed-item .icon-holder{
		  width: 55px;
		  float: left;
		  margin: 21px 20px 0 25px;
		}
		.feed-item .icon-holder .icon{
		  width: 55px;
		  height: 55px;
		  border-radius: 100%;
		  float: left;
		  /*background-image: url('https://lh3.googleusercontent.com/-Az9OhFIaxEY/AAAAAAAAAAI/AAAAAAAAAAA/iHtDLHxQMFc/photo.jpg');*/
		  background-size: 55px 55px;
		  /*box-shadow: 0 1px 2px rgba(0,0,0,0.3);*/
		}
		.feed-item .text-holder{
		  margin-top: 22px;
		  width: 75%;
		  float: left;
		}
		.feed-item .spacer{
		  width: 10%;
		  float: left;
		}

		.blog{
		  overflow: hidden;
		}

		.feed-title{
		  font-size: 15px;
		  font-weight: 500;
		}

		.feed-description{
		  font-family: Helvetica, sans-serif !important; 
		  font-size: .9em;
		  font-weight: 300;
		  color: #888;
		      width: 156% !important;
		    height: 100px !important;
		  overflow: hidden;
		  text-overflow: ellipsis;
		}

		.post-options-holder{
		  float: right;
		  height: 100%;
		  width: 30px;
		  background: #EEE;
		  padding: 12px;
		  transition: background 0.2s;
		}
		.post-options-holder:hover{
		  background: #DDD;
		}

		.toolbar .tools{
		  padding-top: 15px;
		  position: fixed;
		  right: 20px;
		}
		.toolbar .tools ul{
		  list-style-type: none;
		}
		.toolbar .tools ul li{
		  display: inline;
		  padding-left: 2px;
		}

		#search, #settings, #hamburger, #postsettings{
		  color: #FFF;
		  cursor: pointer;
		}

		@media all and (max-width: 1000px){
		  .feed-item{
		    margin-left: 0px;
		    margin-bottom: 1px;
		    box-shadow:none;
		  }  
		}

		@media all and (max-width: 560px){.feed-item .text-holder{width: 70%}}
		@media all and (max-width: 470px){.feed-item .text-holder{width: 60%}}
		@media all and (max-width: 360px){.feed-item .text-holder{width: 50%}}
		.swal2-input {
			margin-top: 5% !important;
    		margin-left: 25% !important;
		}
	</style>
	<script type="application/javascript" src="/js/jquery-3.4.1.min.js"></script>
	<script type="application/javascript" src="/js/materialize.min.js"></script>
	<script type="application/javascript" src="/js/sweetalert2.min.js"></script>
	<script type="application/javascript" src="/js/vue.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			var oneTime = true;
      		var $vm = new Vue({
  				el: '#app-feed',
  				data: {
  					tweets : []
    				//message: 'You loaded this page on ' + new Date().toLocaleString()
  				}
			});
			var getDicas = function(){
				$.ajax({
    				method: 'GET', // Type of response and matches what we said in the route
    				url: '/dicas', // This is the url we gave in the route
    				data: {}, // a JSON object to send back
			    	beforeSend: function() {
			    		if (oneTime) {
			    			$(".custom-feed-item-preloader").show();
			    		}
			    	},
			    	success: function(response){ // What to do if we succeed
			    		console.log(response);
						$vm.tweets = JSON.parse(response);
			    		if ($vm.tweets != null) {
			    			$(".custom-feed-item-preloader").hide();
			    		} else {
			    			$(".custom-feed-item-preloader").show();	
			    		}
			    	},
			    	error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
			    		//$(".custom-feed-item-preloader").show();
			        	//console.log(JSON.stringify(jqXHR));
						//Swal.fire('Erro!', "Não foi possivel realizar o logout, tente novamente",'error');
			        	//console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
			    	}
						});
			};
			var adicionarPeso = function(){
				Swal.fire({
  					text: 'Olá {{Auth::user()->nome_usuario}}, hoje é dia de pesagem! Insira seu peso atual.',
  					allowOutsideClick: false,
  					input: 'number',
  					inputValue: 1,
  					inputPlaceholder: 'Digite o peso',
  					inputAttributes: {
    					min: 1,
    					step: 1
  					}
				}).then(function(result) { 
					$.ajax({
	    				method: 'POST', // Type of response and matches what we said in the route
	    				url: '/adicionarPeso', // This is the url we gave in the route
	    				data: {'peso':result.value, '_token': '{{csrf_token()}}'}, // a JSON object to send back
				    	success: function(response){ // What to do if we succeed
      						Swal.fire('Sucesso!', "Peso adicionado com sucesso.",'success');
				    	},
				    	error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
      						Swal.fire('Erro!', "Não foi possível adicionar o peso corretamente.",'error');
				    	}
					});  						
				});
			};
      		Materialize.updateTextFields();
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
      		if ($("#devePesar").val() == true) {
      			console.log($("#devePesar").val());
      			//adicionarPeso();
      		}
      		getDicas();
			oneTime = false;
			setInterval(getDicas, 60000);
			//setInterval(getDicas, 10000)
      	});

	</script>