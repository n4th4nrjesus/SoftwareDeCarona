<!DOCTYPE html>
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
        select {
            width:200px;
        }
    </style>
</head>
    <body  onload="w3_show_nav('menuPassag')">

        <?php require 'menu.php';?>

        <div class="w3-main w3-container w3-light-grey" style="margin-left:270px;margin-top:117px;">

            <div class="w3-panel w3-padding-large w3-card-4 w3-light-grey">
                <h1 class="w3-xlarge">Edite sua carona</h1>

                <p class="w3-large">
                    <div class="w3-code cssHigh notranslate">

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
                                <h2>Informe os dados da carona <?= $_GET['Cod']; ?></h2>
                            </div>
                            
                            <form class="w3-container" action="caronasModificar_exe.php?Cod=<?= $cod; ?>" method="post">
                                <input type="hidden" id="acaoForm" name="acaoForm" value="Carona">
                                
                                <div>
                                    <label class="w3-text-teal"><h6><b>Para Onde Deseja Ir?</b></h6></label>
                                    <input type="button" value="Puc" class="w3-button w3-dark-grey w3-hover-white" onclick="destinoPuc()" id="btnPuc">
                                    <input type="button" value="Personalizado" class="w3-button w3-dark-grey w3-hover-white" onclick="partidaPuc()" id="btnPersonal">
                                </div>
                                </br>

                                <div id='optPuc_EndAtual' style="display:none">
                                    <label class="w3-text-teal"><h6><b>Insira seu local atual</b></h6></label>
                                    <input id="inputPuc_EndAtual" class="w3-input w3-border w3-light-grey" name="localPartida_Puc" type="text"
                                        title="Insira o endereço de partida."></p>
                                </div>

                                <div id="optPuc_Bloco" style="display: none">
                                    <label class="w3-text-teal"><h6><b>Para qual Portão/Bloco deseja ir?</b></h6></label>
                                    <input id="inputPuc_Bloco" class="w3-input w3-border w3-light-grey " name="localDestino_Puc" type="text"
                                        title="Insira o endereço de destino."></p>
                                </div>

                                <div id="optPersonal_Bloco" style="display: none">
                                    <label class="w3-text-teal"><h6><b>Em qual Portão/Bloco você está?</b></h6></label>
                                    <input id="inputPersonal_Bloco" class="w3-input w3-border w3-light-grey " name="localPartida_Personal" type="text"
                                        title="Insira o endereço de partida." ></p>
                                </div>

                                <div id="optPersonal_Destino" style="display: none">
                                    <label class="w3-text-teal"><h6><b>Insira o endereço de destino</b></h6></label>
                                    <input id="inputPersonal_Destino" class="w3-input w3-border w3-light-grey " name="localDestino_Personal" type="text"
                                        title="Insira o endereço de destino."></p>
                                </div>

                                <div>
                                <?php
                                    $servername = "localhost:3307";
                                    $username = "usu@SoftwareCarona";
                                    $password = "caronadesoftware";
                                    $database = "software_de_carona";
                        
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
                                    $usuarioMatri = $_SESSION['usuario_matri'];
                                    $usuarioGenero = $_SESSION['usuario_genero'];
                                    $cod = $_GET['Cod'];

                                    $sql = "SELECT fk_Passageiro_Matricula FROM Carona 
                                    WHERE Cod = '$cod' ";
                                    
                                    if($result = mysqli_query($conn, $sql)) {
                                        if(mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {

                                                if($row['fk_Passageiro_Matricula'] == $usuarioMatri && $usuarioGenero == 'F') {
                                ?>
                                        <div>
                                            <label class="w3-text-teal"><h6><b>Preferência de gênero do motorista</b></h6></label>
                                            <select class="w3-white w3-border w3-padding" id="selectGenero" name="selectGenero">
                                                <option value="Q"> Qualquer </option>
                                                <option value="F"> Feminino </option>
                                                <option value="M"> Masculino </option>
                                            </select> 
                                        </div>
                                <div>                        
                                <?php
                                                }
                                            }
                                        }
                                        } else {
                                            echo "Erro executando SELECT: " . mysqli_error($conn);
                                        }
                                        echo "</div>";
                                        mysqli_close($conn);

                                ?>
                                </div>


                                <div id="divButtons" style="display: none">
                                    <input type="submit" value="Finalizar Edição" class="w3-btn w3-teal" name="Modificar Carona">
                                    <input type="button" value="Cancelar" class="w3-btn w3-teal" onclick="window.location.href='oferecidasListar.php'"></p>
                                </div>

                            </br>
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

        <?php require 'rodape.php';?>
    </body>
</html>
