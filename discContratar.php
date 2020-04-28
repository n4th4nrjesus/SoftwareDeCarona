<!DOCTYPE html>
<!--
Software de Carona
-->
<html>
<head>

    <title>Software de Carona</title>
    <link rel="icon" type="image/png" href="imagens/IE_favicon.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        .w3-theme {
            color: #ffff !important;
            background-color: #380077 !important
        }

        .w3-code {
            border-left: 4px solid #380077
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
<div class="w3-main w3-container" style="margin-left:270px;margin-top:117px;">

    <div class="w3-panel w3-padding-large w3-card-4 w3-light-grey">
        <h1 class="w3-xxlarge">Cadastro de Disciplina</h1>

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
						<label class="w3-text-teal"></label></p><h6><b>Insira o local de partida</b></h6>
						<input class="w3-input w3-border w3-light-grey" name="Nome" type="text" pattern="[a-zA-Z\u00C0-\u00FF ]{10,100}$" title="Endereço entre 10 e 100 letras." required=""><p></p>
						<p>
						<label class="w3-text-teal"></label></p><h6><b>Insira o endereço de destino</b></h6>
						<input class="w3-input w3-border w3-light-grey " name="Celular" type="text" pattern="\([0-9]{2}\)[0-9]{4,6}-[0-9]{3,4}$" title="(11)1111-1111." required=""><p></p>
						<p>
						<label class="w3-text-teal"></label></p><h6><b>Selecione o gênero de preferência do motorista</b></h6>

                        <select class="w3-input w3-border w3-light-grey" name="DataNasc">
                            <option value="qualquer">Qualquer</option>
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                        </select>
						<p>
						<label class="w3-text-teal"></label></p><h6>Login</h6>
						<input class="w3-input w3-border w3-light-grey" name="Login" type="text" pattern="[a-zA-Z]{2,20}.[a-zA-Z]{2,20}" title="Formato: nome.sobrenome" required=""><p></p>
						<p>
						<label class="w3-text-teal"></label></p><h6>Senha</h6>
						<input class="w3-input w3-border w3-light-grey" name="Senha" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,8}" title="Deve conter ao menos um número, uma letra maiúscula e minúscula, um caracter especial, com 6 a 8 caracteres" required=""><p></p>
						<p>
						<label class="w3-text-teal"></label></p><h6>Confirma Senha</h6>
						<input class="w3-input w3-border w3-light-grey" name="Senha2" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,8}" title="Deve conter ao menos um número, uma letra maiúscula e minúscula, um caracter especial, com 6 a 8 caracteres" required=""> <p></p> 
						
						<p>
						<input type="submit" value="Registrar" class="w3-btn w3-teal" >
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
