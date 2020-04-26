<!-------------------------------------------------------------------------------
Software de Carnona


MENU.PHP
---------------------------------------------------------------------------------->

	<!-- Top -->
	<div class="w3-top">
		<div class="w3-row w3-dark-grey w3-padding">
			<div class="w3-half" style="margin:4px 0 6px 0"><a href="."><img src='imagens/logo.png' alt=' IE Exemplo '></a>
			</div>
			<div class="w3-half w3-margin-top w3-hide-medium w3-hide-small">
				<div class="w3-right">(AQUI VAI O NOME DA PESSOA QUE SE LOGA)</div>
			</div>
		</div>
		<div class="w3-bar w3-dark-grey w3-large" style="z-index:4;">
			<a class="w3-bar-item w3-button w3-left w3-hide-large w3-hover-white w3-large w3-theme w3-padding-16" href="javascript:void(0)" onclick="w3_open()">☰</a>
			<a class="w3-bar-item w3-button w3-hide-medium w3-hide-small w3-hover-teal w3-padding-16" href="javascript:void(0)" onclick="w3_show_nav('menuPassag')">PASSAGEIRO</a>
			<a class="w3-bar-item w3-button w3-hide-medium w3-hide-small w3-hover-teal w3-padding-16" href="javascript:void(0)" onclick="w3_show_nav('menuMotor')">MOTORISTA</a>
			<a class="w3-bar-item w3-button w3-hide-medium w3-hide-small w3-hover-teal w3-padding-16" href="javascript:void(0)" onclick="w3_show_nav('menuFeed')">FEED</a>
		</div>
	</div>

	<!-- Sidebar -->
	<div class="w3-sidebar w3-bar-block w3-collapse w3-animate-left" style="z-index:3;width:270px" id="mySidebar">
		<div class="w3-bar w3-hide-large w3-large">
			<a href="javascript:void(0)" onclick="w3_show_nav('menuPassag')"
			   class="w3-bar-item w3-button w3-theme w3-hover-white w3-padding-16">PASSAGEIRO</a>
			<a href="javascript:void(0)" onclick="w3_show_nav('menuMotor')"
			   class="w3-bar-item w3-button w3-theme w3-hover-white w3-padding-16">MOTORISTA</a>
			<a href="javascript:void(0)" onclick="w3_show_nav('menuFeed')"
			   class="w3-bar-item w3-button w3-theme w3-hover-white w3-padding-16">FEED</a>
		</div>
		<a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-right w3-xlarge w3-hide-large"
		   title="Close Menu">x</a>
		<div id="menuPassag" class="myMenu">
			<div class="w3-container">
				<h3>Passageiro</h3>
			</div>
			<a class="w3-bar-item w3-button" href="profListar.php">Caronas oferecidas</a>
			<a class="w3-bar-item w3-button" href="profContratar.php">Pedir carona</a>
		</div>
		<div id="menuMotor" class="myMenu" >
			<div class="w3-container">
				<h3>Motorista</h3>
			</div>
			<a class="w3-bar-item w3-button" href='discListar.php'>Pedidos de carona</a>
			<a class="w3-bar-item w3-button" href='discContratar.php'>Oferecer carona</a>
		</div>
		<div id="menuFeed" class="myMenu" >
			<div class="w3-container">
				<h3>Feed</h3>
			</div>
			<a class="w3-bar-item w3-button" href='turmaListar.php'>Posts</a>
			<a class="w3-bar-item w3-button" href='turmaContratar.php'>Novo post</a>
		</div>
	</div>
