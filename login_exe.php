<?php
    $_SESSION['usuario_email'] = $_POST['Email'];
    $_SESSION['usuario_senha'] = $_POST['Senha'];

    $usuario_email = $_SESSION['usuario_email'];
    $usuario_senha = $_SESSION['usuario_senha'];

    $servername = "localhost:3307";
    $username = "usu@SoftwareCarona";
    $password = "caronadesoftware";
    $database = "software_de_carona";

    $conn = mysqli_connect($servername, $username, $password, $database);

    mysqli_query($conn,"SET NAMES 'utf8'");
    mysqli_query($conn,"SET NAMES 'utf8'");
    mysqli_query($conn,'SET character_set_connection=utf8');
    mysqli_query($conn,'SET character_set_client=utf8');
    mysqli_query($conn,'SET character_set_results=utf8');

    $sql = "SELECT COUNT(*) FROM Usuario WHERE Email = '$usuario_email' AND Senha = '$usuario_senha'";
    
    if (!$result = mysqli_query($conn, $sql)) {
?>
    <script>alert("Erro executando SELECT: " . mysqli_error($conn));</script>
<?php
    } else {
        if (mysqli_num_rows($result) > 0) {
?>
    <script>alert("Deu certo!");</script>
<?php         
        }
    }
?>