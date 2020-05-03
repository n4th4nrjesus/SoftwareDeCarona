<!-------------------------------------------------------------------------------
Software de Carnona


MENU.PHP
---------------------------------------------------------------------------------->

<?php
	session_start();
	if (!isset($_SESSION['usuario_matri']))
		header("Location: .");

    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
        session_unset();
		session_destroy();
		header("Location: .");
    }
	$_SESSION['LAST_ACTIVITY'] = time();
?>

	<!-- Top -->
	<div class="w3-top">
		<div class="w3-row w3-dark-grey w3-padding">
			<div class="w3-padding-large w3-center" style="margin:4px 0 6px 0;"><b>Software de Carona</b></div>
		</div>
		<div class="w3-bar w3-dark-grey w3-large" style="z-index:4;height:45px">
			<a class="w3-bar-item w3-button w3-left w3-hide-large w3-hover-white w3-large w3-teal w3-padding-16" href="javascript:void(0)" onclick="w3_open()">☰</a>
			<a class="w3-bar-item w3-button w3-hide-medium w3-hide-small w3-hover-teal w3-padding-16" href="javascript:void(0)" onclick="w3_show_nav('menuPassag')">PASSAGEIRO</a>
			<a class="w3-bar-item w3-button w3-hide-medium w3-hide-small w3-hover-teal w3-padding-16" href="javascript:void(0)" onclick="w3_show_nav('menuMotor')">MOTORISTA</a>
			<a class="w3-bar-item w3-button w3-hide-medium w3-hide-small w3-hover-teal w3-padding-16" href="javascript:void(0)" onclick="w3_show_nav('menuFeed')" style="display: none;">FEED</a>
			<a class="w3-bar-item w3-button w3-hide-medium w3-hide-small w3-hover-teal w3-padding-16" href="javascript:void(0)" onclick="w3_show_nav('menuMinhas')">MINHAS CARONAS</a>
			<a class="w3-bar-item w3-button w3-hide-medium w3-hide-small w3-hover-teal w3-padding-16" href="javascript:void(0)" onclick="w3_show_nav('menuConversas')" style="display: none;">MINHAS CONVERSASS</a>
		</div>
	</div>

	<!-- Sidebar -->
	<div class="w3-sidebar w3-bar-block w3-collapse w3-animate-left w3-grey w3-card" style="z-index:3;width:280px" id="mySidebar">
		<div class="w3-bar w3-hide-large w3-large">
			<a href="javascript:void(0)" onclick="w3_show_nav('menuPassag')"
			   class="w3-bar-item w3-button w3-teal w3-hover-white w3-padding-16">PASSAGEIRO</a>
			<a href="javascript:void(0)" onclick="w3_show_nav('menuMotor')"
			   class="w3-bar-item w3-button w3-teal w3-hover-white w3-padding-16">MOTORISTA</a>
			<a href="javascript:void(0)" onclick="w3_show_nav('menuFeed')"
			   class="w3-bar-item w3-button w3-teal w3-hover-white w3-padding-16" style="display: none;">FEED</a>
			<a href="javascript:void(0)" onclick="w3_show_nav('menuMinhas')"
			   class="w3-bar-item w3-button w3-teal w3-hover-white w3-padding-16">MINHAS CARONAS</a>
			<a href="javascript:void(0)" onclick="w3_show_nav('menuConversas')"
			   class="w3-bar-item w3-button w3-teal w3-hover-white w3-padding-16" style="display: none;">MINHAS CONVERSAS</a>
		</div>
		<a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-right w3-xlarge w3-hide-large w3-teal"
		   title="Close Menu">x</a>
		<div id="menuPassag" class="myMenu">
			<div class="w3-container w3-teal">
				<h3 class="w3-border-dark-grey w3-padding">Passageiro</h3>
			</div>
			<a class="w3-bar-item w3-button" href="oferecidasListar.php">Caronas oferecidas</a>
			<a class="w3-bar-item w3-button" href="pedidoRegistrar.php">Pedir carona</a>
		</div>
		<div id="menuMotor" class="myMenu" >
			<div class="w3-container w3-teal">
				<h3 class="w3-border-dark-grey w3-padding">Motorista</h3>
			</div>
			<a class="w3-bar-item w3-button" href='pedidoListar.php'>Pedidos de carona</a>
			<a class="w3-bar-item w3-button" href='oferecidasRegistrar.php'>Oferecer carona</a>
		</div>
		<div id="menuFeed" class="myMenu" >
			<div class="w3-container w3-teal">
				<h3 class="w3-border-dark-grey w3-padding">Feed</h3>
			</div>
			<a class="w3-bar-item w3-button" href='postListar.php'>Posts</a>
			<a class="w3-bar-item w3-button" href='postRegistrar.php'>Novo post</a>
		</div>
		<div id="menuMinhas" class="myMenu" >
			<div class="w3-container w3-teal">
				<h3 class="w3-border-dark-grey w3-padding">Minhas caronas</h3>
			</div>
			<a class="w3-bar-item w3-button" href='caronaPedi.php'>Pedidas pendentes</a>
			<a class="w3-bar-item w3-button" href='caronaOfereci.php'>Oferecidas pendentes</a>
			<a class="w3-bar-item w3-button" href='caronaAndamento.php'>Em andamento</a>
		</div>
		<div id="menuConversas" class="myMenu" >
			<div class="w3-container w3-teal">
				<h3 class="w3-border-dark-grey w3-padding">Minhas conversas</h3>
			</div>
			<a class="w3-bar-item w3-button" href='menssagemCriar.php'>Criar conversa</a>
			<a class="w3-bar-item w3-button" href='menssagemListar.php'>Chat</a>
		</div>
		<div class="w3-bottom w3-padding">
			<?= $_SESSION['usuario_nome'] ?>
			<form action="login_sair_exe.php" style="display: inline-block;">
				<input type="submit" value="Sair" 
					class="w3-button w3-margin-left w3-dark-grey w3-hover-teal"/>
			</form>
		</div>
	</div>
