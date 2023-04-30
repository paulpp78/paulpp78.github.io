<?php
if (isset($_POST['nom_message'], $_POST['email'])) {
    $nom = $_POST['nom_message'];
    $email = $_POST['email'];
    $newsletter = isset($_POST['newsletter']) ? 1 : 0;

    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "myDB";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO newsletter (nom, email, newsletter) VALUES ('$nom', '$email', '$newsletter')";

    if ($conn->query($sql) === TRUE) {
        echo "Inscription réussie à la newsletter";
    } else {
        echo "Erreur lors de l'inscription à la newsletter: " . $conn->error;
    }

    $conn->close();
}

?>


<?php
if (isset($_POST['nom_message']) && isset($_POST['objet']) && isset($_POST['message'])) {
    $nom = $_POST['nom_message'];
    $objet = $_POST['objet'];
    $message = $_POST['message'];

    $to = "votre-adresse-email@example.com";

    $subject = $nom . " - " . $objet;

    $body = "Nom : " . $nom . "\n\n" . "Message :\n" . $message;

    $headers = "From: " . $nom . " <" . $to . ">\r\n";
    $headers .= "Reply-To: " . $to . "\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "Votre message a été envoyé avec succès.";
    } else {
        echo "Une erreur s'est produite lors de l'envoi du message.";
    }
}
?>
