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
<body onload="w3_show_nav('menuMinhas')">

<?php require 'menu.php'; ?>

<div class="w3-main w3-container" style="margin-left:270px;margin-top:117px;">

    <div class="w3-panel w3-padding-large w3-card-4 w3-light-grey">
        <h1 class="w3-xxlarge">Minhas caronas em andamento</h1>

        <p class="w3-large">
        <p>
        <div class="w3-code cssHigh notranslate">

            <?php
            date_default_timezone_set("America/Sao_Paulo");
            $data = date("d/m/Y H:i:s", time());
            echo "<p class='w3-small' > ";
            echo "</p> "
            ?>

            <?php
            $servername = "localhost:3307";
            $username = "usu@SoftwareCarona";
            $password = "caronadesoftware";
            $database = "software_de_carona";
            $usuario_matricula = $_SESSION['usuario_matri'];

            $conn = mysqli_connect($servername, $username, $password, $database);
			
			if (!$conn) {
                echo "</table>";
                echo "</div>";
                die("Falha na conexão com o Banco de Dados: " . mysqli_connect_error());
            }
			
			mysqli_query($conn,"SET NAMES 'utf8'");
			mysqli_query($conn,"SET NAMES 'utf8'");
			mysqli_query($conn,'SET character_set_connection=utf8');
			mysqli_query($conn,'SET character_set_client=utf8');
			mysqli_query($conn,'SET character_set_results=utf8');

            $sql = "SELECT c.Cod as Cod, c.fk_Passageiro_Matricula as PassageiroMatricula, u.Nome as Passageiro, u2.Nome as Motorista, c.LocalPartida as LocalPartida, 
                           c.LocalDestino as LocalDestino, c.Finalizada as Finalizada
                    FROM Carona c 
                    INNER JOIN Usuario u 
                        ON u.Matricula = c.fk_Passageiro_Matricula 
                    INNER JOIN Usuario u2 
                        ON u2.Matricula = c.fk_Motorista_Matricula 
                    WHERE c.fk_Passageiro_Matricula IS NOT NULL
                    AND c.Finalizada = 0
                    AND c.fk_Motorista_Matricula IS NOT NULL";
            
            echo "<div class='w3-responsive w3-card-4'>";
            if ($result = mysqli_query($conn, $sql)) {

                echo "<table class='w3-table-all'>";
                echo "	<tr>";
                echo "	  <th>Passageiro</th>";
                echo "	  <th>Motorista</th>";
				echo "	  <th>Local de partida</th>";
                echo "	  <th>Local de destino</th>";
                echo "	  <th> </th>";
                echo "	  <th> </th>";
                echo "	</tr>";
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $cod = $row['Cod'];
                        echo "<tr>";
                        echo "<td>";
                        echo $row["Passageiro"];
                        echo "</td><td>";
                        echo $row["Motorista"];
                        echo "</td><td>";
                        echo $row["LocalPartida"];
                        echo "</td><td>";
                        echo $row["LocalDestino"];
                        echo "</td><td>";
				?>
                        <a href='mensagemChat.php?Cod=<?= $cod ?>'><img src='imagens/chat.png' title='Chat' width='28'></a>
                        </td><td>
                        
                        <?php if ($row['PassageiroMatricula'] == $usuario_matricula ) { ?> 
                            <a href='andamentoFinalizar.php?Cod=<?= $cod ?>'><img src='imagens/finalizar.jpg' title='Finalizar carona' width='25'></a>
                        <?php } ?>
                        </td>
                        </tr>
				 <?php
                    }
                }
                echo "</table>";
                echo "</div>";
            } else {
                echo "Erro executando SELECT: " . mysqli_error($conn);
            }

            mysqli_close($conn); 
            ?>
        </div>
    </div>


    <footer class="w3-panel w3-padding-32 w3-card-4 w3-light-grey w3-center">
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