@extends('layout.site')
<body>
<header>
	@include('menu_top')
</header>
	@section('titlePage', 'Dicas nutricionais')
	@section('titulo', 'Feed de dicas')

	@section('conteudo')
			<div class="row feed" id="app-feed">
				@{{this.message}}
				<div class="feed-item blog">
					<div class="icon-holder"><div class="icon"></div></div>
					<div class="text-holder col s6">
						<div class="feed-title">Blog Item</div>
							<div class="feed-description">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia natus obcaecati consequuntur quis molestias! Minima impedit ad omnis
							</div>
					</div>
				</div>
				<div class="feed-item blog">
					<div class="icon-holder"><div class="icon"></div></div>
					<div class="text-holder col s6">
						<div class="feed-title">Blog Item</div>
							<div class="feed-description">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia natus obcaecati consequuntur quis molestias! Minima impedit ad omnis
							</div>
					</div>
				</div>
				<div class="feed-item blog">
					<div class="icon-holder"><div class="icon"></div></div>
					<div class="text-holder col s6">
						<div class="feed-title">Blog Item</div>
							<div class="feed-description">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia natus obcaecati consequuntur quis molestias! Minima impedit ad omnis
							</div>
					</div>
				</div>
				<div class="feed-item blog">
					<div class="icon-holder"><div class="icon"></div></div>
					<div class="text-holder col s6">
						<div class="feed-title">Blog Item</div>
							<div class="feed-description">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia natus obcaecati consequuntur quis molestias! Minima impedit ad omnis
							</div>
					</div>
				</div>
				<div class="feed-item blog">
					<div class="icon-holder"><div class="icon"></div></div>
					<div class="text-holder col s6">
						<div class="feed-title">Blog Item</div>
							<div class="feed-description">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia natus obcaecati consequuntur quis molestias! Minima impedit ad omnis
							</div>
					</div>
				</div>
				<div class="feed-item blog">
					<div class="icon-holder"><div class="icon"></div></div>
					<div class="text-holder col s6">
						<div class="feed-title">Blog Item</div>
							<div class="feed-description">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia natus obcaecati consequuntur quis molestias! Minima impedit ad omnis
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
		  background-image: url('https://lh3.googleusercontent.com/-Az9OhFIaxEY/AAAAAAAAAAI/AAAAAAAAAAA/iHtDLHxQMFc/photo.jpg');
		  background-size: 55px 55px;
		  box-shadow: 0 1px 2px rgba(0,0,0,0.3);
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
		  font-size: .9em;
		  font-weight: 500;
		}

		.feed-description{
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
	</style>
	<script type="application/javascript" src="/js/jquery-3.4.1.min.js"></script>
	<script type="application/javascript" src="/js/materialize.min.js"></script>
	<script type="application/javascript" src="/js/sweetalert2.min.js"></script>
	<script type="application/javascript" src="/js/vue.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
      		var $vm = new Vue({
  				el: '#app-feed',
  				data: {
    				message: 'You loaded this page on ' + new Date().toLocaleString()
  				}
			});
			var getDicas = function(){
				$.ajax({
    				method: 'GET', // Type of response and matches what we said in the route
    				url: '/dicas', // This is the url we gave in the route
    				data: {}, // a JSON object to send back
			    	success: function(response){ // What to do if we succeed
						var resposta = JSON.parse(response);
						 
			    	},
			    	error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
			        	//console.log(JSON.stringify(jqXHR));
						//Swal.fire('Erro!', "Não foi possivel realizar o logout, tente novamente",'error');
			        	//console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
			    	}
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
      		getDicas();
			setInterval(getDicas, 60000);

      	});

	</script>