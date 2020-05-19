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

            <!--criar div para aparecer as mensagens-->


            <!--enviar mensagem-->
            <div class="w3-responsive w3-card-4">
                
                <form class="w3-container" action="pedidoRegistrar_exe.php" method="post">
                    <input type="hidden" id="acaoForm" name="acaoForm" value="Carona">

                    <div id="escreverTesto">
                        <label class="w3-text-teal"><h6><b>Insira a mensagem</b></h6></label>
                        <input id="inputPersonal_Destino" class="w3-input w3-border w3-light-grey " name="localDestino_Personal" type="text"
                            title="Insira o endereço de destino."></p>
                    </div>
                    <div>
                    <div id="salvar Testo" >
                        <input type="button" value="Enviar mensagem" class="w3-btn w3-teal">
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

<!-- FIM PRINCIPAL -->
</div>
<!-- Inclui RODAPE.PHP  -->
<?php require 'rodape.php';?>
</body>
</html>
