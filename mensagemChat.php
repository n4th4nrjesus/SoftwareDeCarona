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
            $cod = $_GET["Cod"];
			
			// Verifica conexão
            $conn = mysqli_connect($servername, $username, $password, $database);
			
			// Verifica conexão 
			if (!$conn) {
                echo "</table>";
                echo "</div>";
                die("Falha na conexão com o Banco de Dados: " . mysqli_connect_error());
            }
            ?>
            <!--pegar a carona em andamento e printar inicio e fim da corrida no topo-->
            <div>
            <?php
            $sql = "SELECT c.LocalPartida as LocalPartida, c.LocalDestino as LocalDestino, c.Cod as Cod, u.Nome as Passageiro
                    FROM Carona as c
                    INNER JOIN Usuario as u ON u.Matricula = c.fk_Passageiro_Matricula
                    INNER JOIN Usuario u2 ON u2.Matricula = c.fk_Motorista_Matricula 
                    WHERE Cod = $cod";  
            
            if ($result = mysqli_query($conn, $sql)) {

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $cod = $row['Cod'];
                        echo "<p class='w3-small' > ";
                        echo "Local de Partida: ";
                        echo $row["LocalPartida"];
                        echo "</p> ";
                        echo "<p class='w3-small' > ";
                        echo "Destino: ";
                        echo $row["LocalDestino"];
                        echo "</p> ";
                    }
                }
            }
            ?>
            </div>


            <!--Mostrar mensagem-->
            <div>
            <?php
            $sql = "SELECT m.texto as texto, m.datahora as datahora, m.fk_Passageiro_Matricula as fk_Passageiro_Matricula, m.fk_Motorista_Matricula as fk_Motorista_Matricula
                    FROM Mensagem as m
                    INNER JOIN Usuario as u ON u.Matricula = c.fk_Passageiro_Matricula
                    INNER JOIN Usuario as u2 ON u2.Matricula = c.fk_Motorista_Matricula 
                    WHERE Cod = $cod";

            $sql = "SELECT c.Cod as Cod, u.Nome as Passageiro, u2.Nome as Motorista, c.LocalPartida as LocalPartida, c.LocalDestino as LocalDestino
                    FROM Carona c 
                    INNER JOIN Usuario u 
                        ON u.Matricula = c.fk_Passageiro_Matricula 
                    INNER JOIN Usuario u2 
                        ON u2.Matricula = c.fk_Motorista_Matricula 
                    WHERE c.fk_Passageiro_Matricula IS NOT NULL
                    AND c.fk_Motorista_Matricula IS NOT NULL";
            
            $usuario_matricula = $_SESSION['usuario_matri'];
            $usuario_nome = $_SESSION['usuario_nome'];

            $Texto = $row['Mensagem_texto'];
            $Remetente = $usuario_nome;

            echo "<div class='w3-responsive w3-card-4'>";
            if ($result = mysqli_query($conn, $sql)) { 
                    echo "<table class='w3-table-all'>";
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $cod = $row['Cod'];
                            echo "<tr>";
                            echo "<td>";
                            echo $Remetente;
                            echo ":";
                            echo "                                   "; // espaço para depois do nome
                            echo $Texto;
                            echo "</td>";
                            echo "</tr>";
                        }
                    }
            }
            
            ?>
            </div>


            <!--enviar mensagem-->
            <div class="w3-responsive w3-card-4">
                
                <form class="w3-container" action="menssagemChat.php" method="post">
                    <input type="hidden" id="acaoForm" name="acaoForm" value="Carona">

                    <div id="escreverTexto">
                        <label class="w3-text-teal"><h6><b>Insira a mensagem</b></h6></label>
                        <input id="inputTexto" class="w3-input w3-border w3-light-grey " name="mensagem_enviada" type="text"
                            title="Insira a mensagem."></p>
                    </div>

                    <!-- salvar mensagem-->
                    <div id= "salvar_mensagem">
                        <?php
                        $mensagem_enviada = $_POST['mensagem_enviada'];
                        $Passageiro = "ai meu cu";
                        $Motorista = "ai meu cu";
                        /*
                        if($usuario_matricula == $row['Motirista']{
                            $mensagem_destino = $row['Passageiro'];
                        }else{
                            $mensagem_destino = $row['Motorista'];
                        }
                        */

                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        } else {
                            if ($mensagem_enviada == NULL) {
                                $sql = "INSERT INTO Mensagem (texto, fk_Passageiro_Matricula,  fk_Motorista_Matricula) 
                                        VALUES ('$mensagem_enviada', '$Passageiro','$Motorista')";
                            } else {
                                echo "Erro: ".$sql."<br>".mysqli_error($conn);        
                                }
                            }
                        ?>
                    </div>
                    <div>
                    <div id="salvar Testo" >
                        <input type="submit" value="Enviar mensagem" class="w3-btn w3-teal" name="mensagemEnviar">
                        <input type="button" value="Voltar" class="w3-btn w3-teal" onclick="window.location.href='caronaAndamento.php'"></p>
                    </div>
                </form>
            </div>

        </div>
    </p>
</div>


    <footer class="w3-panel w3-padding-32 w3-card-4 w3-light-grey w3-center">
        <p>
            <nav>
                <a class="w3-button w3-teal w3-hover-white"
                   onclick="document.getElementById('id01').style.display='block'">Sobre</a>
            </nav>
        </p>
    </footer>


</div>

<?php require 'rodape.php';?>
</body>
</html>
