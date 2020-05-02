<!DOCTYPE html>
<!--
Software de Carona
-->
<html>
<head>

    <title>Software de Carona</title>
    <link rel="icon" type="image/png" href="imagens/logoSoftwareCarona.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        .w3-theme {
            color: #ffff !important;
            background-color: #380077 !important
        }

        .w3-code {
            border-left: 4px solid teal;
        }

        .myMenu {
            margin-bottom: 150px
        }
    </style>
</head>
<body onload="w3_show_nav('menuMotor')">
<!-- Inclui MENU.PHP  -->
<?php require 'menu.php';?>

<!-- Conteúdo Principal: deslocado paa direita em 270 pixels quando a sidebar é visível -->
<div class="w3-main w3-container w3-light-grey" style="margin-left:270px;margin-top:117px;">

    <div class="w3-panel w3-padding-large w3-card-4 w3-light-grey">
        <h1 class="w3-xlarge">Ofereça uma carona</h1>

        <p class="w3-large">
            <div class="w3-code cssHigh notranslate">
                <!-- Acesso em:-->
                <?php

                date_default_timezone_set("America/Sao_Paulo");
                $data = date("d/m/Y H:i:s", time());
                echo "<p class='w3-small' > ";
                echo "Acesso em: ";
                echo $data;
                echo "</p> "
                ?>

                <div class="w3-responsive w3-card-4">
                    <div class="w3-container w3-teal">
                        <h2>Informe os dados da sua carona</h2>
                    </div>
                    <form class="w3-container" action="oferecidasRegistrar_exe.php" method="post">
						<input type="hidden" id="acaoForm" name="acaoForm" value="Carona">
                        
                        <div>
                            <label class="w3-text-teal"><h6><b>Para Onde Deseja Ir?</b></h6></label>
                            <input type="button" value="Puc" class="w3-button w3-dark-grey w3-hover-white" onclick="destinoPuc()" id="btnPuc">
                            <input type="button" value="Personalizado" class="w3-button w3-dark-grey w3-hover-white" onclick="partidaPuc()" id="btnPersonal">
                        </div>
                        <div id='optPuc_EndAtual' style="display:none">
                            <label class="w3-text-teal"><h6><b>Insira seu local atual</b></h6></label>
                            <input id="inputPuc_EndAtual" class="w3-input w3-border w3-light-grey" name="localPartida_Puc" type="text"
                                title="Insira o endereço de partida."></p>
                        </div>
                        <div id="optPuc_Bloco" style="display: none">
                            <label class="w3-text-teal"><h6><b>Para qual bloco deseja</b></h6></label>
                            <input id="inputPuc_Bloco" class="w3-input w3-border w3-light-grey " name="localDestino_Puc" type="text"
                                title="Insira o endereço de destino."></p>
                        </div>
                        <div id="optPersonal_Bloco" style="display: none">
                            <label class="w3-text-teal"><h6><b>Qual Portão/Bloco você está?</b></h6></label>
                            <input id="inputPersonal_Bloco" class="w3-input w3-border w3-light-grey " name="localPartida_Personal" type="text"
                                title="Insira o endereço de partida." ></p>
                        </div>
                        <div id="optPersonal_Destino" style="display: none">
                            <label class="w3-text-teal"><h6><b>Insira o endereço de destino</b></h6></label>
                            <input id="inputPersonal_Destino" class="w3-input w3-border w3-light-grey " name="localDestino_Personal" type="text"
                                title="Insira o endereço de destino."></p>
                        </div>

						</br>
						<input type="submit" value="Oferecer Carona" class="w3-btn w3-teal" name="oferecerCarona">
						<input type="button" value="Cancelar" class="w3-btn w3-teal" onclick="window.location.href='.'"></p>
					</form>
				</div>

			</div>
		</p>
	</div>




	<footer class="w3-panel w3-padding-32 w3-card-4 w3-light-grey w3-center w3-opacity">
    <p>
        <nav>
            <a class="w3-button w3-teal w3-hover-white"
               onclick="document.getElementById('id01').style.display='block'">Sobre</a>
        </nav>
    </p>
	</footer>

<!-- FIM PRINCIPAL -->
</div>

<script>
        function destinoPuc(){
            document.getElementById('optPuc_EndAtual').style.display='block';
            document.getElementById('optPuc_Bloco').style.display='block';
            document.getElementById('divButtons').style.display='block';
            document.getElementById('inputPuc_EndAtual').setAttribute("required", "required");
            document.getElementById('inputPuc_Bloco').setAttribute("required", "required");
            document.getElementById('btnPersonal').remove();
            
        }
        function partidaPuc(){
            document.getElementById('optPersonal_Bloco').style.display='block';
            document.getElementById('optPersonal_Destino').style.display='block';
            document.getElementById('divButtons').style.display='block';
            document.getElementById('inputPersonal_Bloco').setAttribute("required", "required");
            document.getElementById('inputPersonal_Destino').setAttribute("required", "required");
            document.getElementById('btnPuc').remove();

        }
     
</script>

<!-- Inclui RODAPE.PHP  -->
<?php require 'rodape.php';?>
</body>
</html>
