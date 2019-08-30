<nav>
	<div class="nav-wrapper darken-4">
		<a href="#!" class="brand-logo"></a>
		<a href="/registro" id="perfil" data-activates="mobile" class="button-collapse"><i class="material-icons icons-top">person</i></a>
		<a href="#" id="sair" data-activates="mobile" class="button-collapse"><i class="material-icons icons-top">exit_to_app</i></a>
		@yield('titlePage')
	</div>
</nav>

<style type="text/css">
	body,html{
		overflow:hidden !important;
	}
	#sair {
		left: 68%;
	}
	.icons-top {
		font-color: white !important;
	}
	.nav-wrapper {
		background: #212121;
	}
</style>