		<div class="row bottom-bar">
				<div class="col s3"><a href="/feed" id="perfil" data-activates="mobile" class="button-collapse"><i class="material-icons icons-top icons-bottom {{(strpos('**'.$_SERVER['REQUEST_URI'], 'feed')) > 0 ? 'option-activated' : ''}}">subtitles</i></a></div>
				<div class="col s3"><a href="/alimentos" id="perfil" data-activates="mobile" class="button-collapse"><i class="material-icons icons-top icons-bottom {{(strpos('**'.$_SERVER['REQUEST_URI'], 'alimentos')) > 0 ? 'option-activated' : ''}}">local_dining</i></a></div>
				<div class="col s3"><a href="/dietas" id="perfil" data-activates="mobile" class="button-collapse"><i class="material-icons icons-top icons-bottom {{(strpos('**'.$_SERVER['REQUEST_URI'], 'dieta')) > 0 ? 'option-activated' : ''}}">receipt</i></a></div>
				<div class="col s3"><a href="/grafico" id="perfil" data-activates="mobile" class="button-collapse"><i class="material-icons icons-top icons-bottom {{(strpos('**'.$_SERVER['REQUEST_URI'], 'grafico')) > 0 ? 'option-activated' : ''}}">pie_chart_outlined</i></a></div>
		</div>
<style type="text/css">
		body {
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
			color: white;
			padding-top: 15% !important;
    		padding-left: 20% !important;
		}
		.option-activated {
			color: #eeff41 !important;
		}
</style>		