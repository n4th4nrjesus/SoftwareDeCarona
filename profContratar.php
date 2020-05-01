<!DOCTYPE html>
    <!--
     Software de Carona          
     
    -->
<html>
<head>

    <title>Software de Carona</title>
    <link rel="icon" type="image/png" href="imagens/IconeCarona.png" />
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
<body  onload="w3_show_nav('menuPassag')">
<!-- Inclui MENU.PHP  -->
<?php require 'menu.php';?>

<!-- Conteúdo Principal: deslocado paa direita em 270 pixels quando a sidebar é visível -->
<div class="w3-main w3-container w3-light-grey" style="margin-left:270px;margin-top:117px;">

    <div class="w3-panel w3-padding-large w3-card-4 w3-light-grey">
        <h1 class="w3-xlarge">Peça uma carona</h1>

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
                    <form class="w3-container" action="ProfContratar_exe.php" method="post" onsubmit="return check(this.form)">
						<input type="hidden" id="acaoForm" name="acaoForm" value="Contratar">
						<p>
						<label class="w3-text-teal"><h6><b>Insira seu local atual</b></h6></label>
						<input class="w3-input w3-border w3-light-grey" name="local_partida" type="text" pattern="[a-zA-Z\u00C0-\u00FF ]{10,100}$"
							   title="Endereço entre 10 e 100 letras." required></p>
						<p>
						<label class="w3-text-teal"><h6><b>Insira o endereço de destino</b></h6></label>
						<input class="w3-input w3-border w3-light-grey " name="local_destino" type="text"
							   title="Insira o endereço de destino." required></p>
						<p>
						<label class="w3-text-teal"><h6><b>Selecione o gênero de preferência do motorista</b></h6></label>

                        <select class="w3-input w3-border w3-light-grey" name="motoristaGen">
                            <option value="qualquer">Qualquer</option>
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                        </select>
						<p>
						<p>
						<input type="submit" value="Pedir Carona" class="w3-btn w3-teal" name="pedirCarona">
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

<!-- Inclui RODAPE.PHP  -->
<?php require 'rodape.php';?>
</body>
</html>
