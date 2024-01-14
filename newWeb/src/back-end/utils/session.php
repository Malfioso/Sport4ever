<?php
session_start();
require 'db_connexion.php';


//check disconnect
if (isset($_GET["disconnect"])){
    if ($_GET["disconnect"]==1){
        unset($_SESSION["email"]);
        unset($_SESSION["admin"]);
    }
}



//check credentiels
if (isset($_POST['email'])){
    if (isset($_POST["password"])){

        $sql="SELECT COUNT(*) FROM membre";

        $connexion=dbconnect();
        if(!$connexion->query($sql)) {
            echo "Pb d'accès à la bdd";
        }

        else{

            /* Query Prepare */
            $sql = "SELECT * FROM membre WHERE email = :email AND password=:password";


            $query = $connexion->prepare($sql);
            $query->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
            $query->bindValue(':password', $_POST['password'], PDO::PARAM_STR);
            $query->execute();
            $members_array = $query->fetchAll();

            $row_count = count($members_array);

            // Check the number of rows that match the SELECT statement
            if($row_count >= 1)
            {
                $member_row = $members_array[0];
                $_SESSION['email'] = $member_row['email'];
                if ($member_row['admin'] == 1){
                    $_SESSION['admin'] = true;
                }
            }
        }

        $connexion=null;
    }
}

if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_naissance = $_POST['date_naissance'];
    $adresse = $_POST['adresse'];
    $code_postal = $_POST['code_postal'];
    $ville = $_POST['ville'];
    $telephone = $_POST['telephone'];
    $date_inscription = date('Y-m-d'); // Set the registration date to today

    $connexion = dbconnect();

    $sql = "INSERT INTO membre (email, password, nom, prenom, date_naissance, adresse, code_postal, ville, telephone, date_inscription, admin, equipe_id) VALUES (:email, :password, :nom, :prenom, :date_naissance, :adresse, :code_postal, :ville, :telephone, :date_inscription, 0, NULL)";

    $query = $connexion->prepare($sql);
    $query->bindValue(':email', $email, PDO::PARAM_STR);
    $query->bindValue(':password', $password, PDO::PARAM_STR);
    $query->bindValue(':nom', $nom, PDO::PARAM_STR);
    $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $query->bindValue(':date_naissance', $date_naissance, PDO::PARAM_STR);
    $query->bindValue(':adresse', $adresse, PDO::PARAM_STR);
    $query->bindValue(':code_postal', $code_postal, PDO::PARAM_INT);
    $query->bindValue(':ville', $ville, PDO::PARAM_STR);
    $query->bindValue(':telephone', $telephone, PDO::PARAM_INT);
    $query->bindValue(':date_inscription', $date_inscription, PDO::PARAM_STR);

    $query->execute();

    $connexion = null;
}

//set admin var = true if user is logged
$admin = false;
if (isset($_SESSION["admin"])){
    $admin = true;
}

$js_isConnected = isset($_SESSION['email']) ? 'true' : 'false';
$js_isAdmin = isset($_SESSION['admin']) && $_SESSION['admin'] ? 'true' : 'false';
?>
<script>
    var isConnected = <?php echo $js_isConnected; ?>;
    var isAdmin = <?php echo $js_isAdmin; ?>;
    console.log("Connected:", isConnected);
    console.log("Admin:", isAdmin);
    if(isConnected && isAdmin) {
        console.log("You are connected and have the right account.");
    } else {
        console.log("You are not connected or do not have the right account.");
    }
</script>
