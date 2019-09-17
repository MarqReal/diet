<nav>
	<div class="nav-wrapper darken-4">
		<div class="row">
			<div class="col s4">
				<a href="/registro" id="perfil" data-activates="mobile" class="button-collapse"><i class="material-icons icons-top">person</i></a>
			</div>
			<div class="col s4">
				<span data-activates="mobile" class="button-collapse" id="textNav">@yield('titleNavbar')</span>
			</div>
			<div class="col s4">
				<a href="#" id="sair" data-activates="mobile" class="button-collapse"><i class="material-icons icons-top">exit_to_app</i></a>
			</div>
		</div><!-- 
		 -->
		@yield('titlePage')
	</div>
</nav>

<style type="text/css">
	body,html{
		overflow:hidden !important;
	}
	#textNav {
		font-size: 20px !important;
		white-space: nowrap !important;
	}
	#sair {
		left: 53% !important;
	}
	.icons-top {
		font-color: white !important;
	}
	.nav-wrapper {
		background: #212121;
	}
</style>