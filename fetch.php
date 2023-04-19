<?php
header("Access-Control-Allow-Origin: *");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tp_structure";

$mysqli = new mysqli($servername, $username, $password, $dbname);

$email = $_GET['email'];

//verification email bien recu
if(isset($email))
{    
    $sql = "SELECT email FROM client WHERE email = '$email'";

    $resultat = mysqli_query($mysqli, $sql);

    // Vérification requête
    if (mysqli_num_rows($resultat) > 0)
    {
        // Verification email pas doublon
        while($row = mysqli_fetch_assoc($resultat))
        {
            echo  json_encode("Erreur : L'email est déjà existant");
        }
    }
    else
    {
        //insertion email
        $sql = "INSERT INTO `client`(`email`) VALUES (?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        echo json_encode("OK : L'email est bien inseré");
    }
}
else
{
    echo 'Erreur !';
}

?>