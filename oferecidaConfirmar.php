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
            border-left: 4px solid #380077
        }

        .myMenu {
            margin-bottom: 150px
        }
    </style>
</head>

<?php
    session_start();
?>

<body onload="w3_show_nav('menuPassag')">
<!-- Inclui MENU.PHP  -->
<?php require 'menu.php';?>

<!-- Conteúdo Principal: deslocado para direita em 270 pixels quando a sidebar é visível -->
<div class="w3-main w3-container" style="margin-left:270px;margin-top:117px;">

    <div class="w3-panel w3-padding-large w3-card-4 w3-light-grey">
        <h1 class="w3-xxlarge">Confirmar carona</h1>

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

                <!-- Acesso ao BD-->
				<?php
				
				$servername = "localhost:3307";
				$username = "usu@SoftwareCarona";
				$password = "caronadesoftware";
                $database = "software_de_carona";
                $cod = "Cod";
				
				// Cria conexão
				$conn = mysqli_connect($servername, $username, $password, $database);

				// Verifica conexão
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}
				// Configura para trabalhar com caracteres acentuados do português
				mysqli_query($conn,"SET NAMES 'utf8'");
				mysqli_query($conn,"SET NAMES 'utf8'");
				mysqli_query($conn,'SET character_set_connection=utf8');
				mysqli_query($conn,'SET character_set_client=utf8');
				mysqli_query($conn,'SET character_set_results=utf8');
				
                // Faz Select na Base de Dados
                $sql = "SELECT c.LocalPartida, c.LocalDestino, c.Cod, u.Matricula FROM Carona as c, Usuario as u WHERE Cod = $cod";    
				echo "<div class='w3-responsive w3-card-4'>"; //Inicio form
				 if ($result = mysqli_query($conn, $sql)) {
						if (mysqli_num_rows($result) > 0) {
						// Apresenta cada linha da tabela
							while ($row = mysqli_fetch_assoc($result)) {
								$dataN = explode('-', $row["DataNasc"]);
								$ano = $dataN[0];
								$mes = $dataN[1];
								$dia = $dataN[2];
								$nova_data = $dia . '/' . $mes . '/' . $ano;
				?>
								<div class="w3-container w3-theme">
									<h2>Confirmar carona. = [<?php echo $row['Cod']; ?>]</h2>
								</div>
								<form class="w3-container" action="oferecidaConfirmar_exe.php" method="post" onsubmit="return check(this.form)">
									<p>
                                    <label class="w3-dark-grey"><b>Local de partida:</b><?php echo $row['LocalPartida']; ?> </label>
                                    </p>
									<p>
                                    <label class="w3-dark-grey"><b>Destino: </b><?php echo $row['LocalDestino']; ?></label>
                                    </p>
									<p>
									<input type="submit" value="Confirmar carona?" class="w3-btn w3-red" >
								</form>
			<?php 
							}
						}
				}
				else {
					echo "Erro executando UPDATE: " . mysqli_error($conn);
				}
				echo "</div>"; //Fim form
				mysqli_close($conn);  //Encerra conexao com o BD

			?>

			</div>
		</p>
	</div>


	<footer class="w3-panel w3-padding-32 w3-card-4 w3-light-grey w3-center w3-opacity">
    <p>
        <nav>
            <a class="w3-button w3-theme w3-hover-white"
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