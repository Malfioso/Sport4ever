<?php
require('../back-end/dbconnect.php');
session_start();


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
            if($row_count==1)
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

<html>
<head>
    <title>Sport4Ever</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="header.css" type="text/css">
    <link rel="stylesheet" href="index.css" type="text/css">
    <link rel="stylesheet" href="events.css" type="text/css">
    <link rel="stylesheet" href="partenaires.css" type="text/css">
    <link rel="stylesheet" href="login_modal.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bebas+Neue&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bebas+Neue|Bodoni+Moda:400,700&display=swap">
</head>
<body>
<script>
    var isConnected = <?php echo $js_isConnected; ?>;
    var isAdmin = <?php echo $js_isAdmin; ?>;

    console.log("Connected:", isConnected);
    console.log("Admin:", isAdmin);


    /**
     * Toggle authentication modal form visibility.
     */
    function authenticate() {
        let modal = document.getElementById('loginModal');
        // Toggle the display property
        if (modal.style.display === 'block') {
            modal.style.display = 'none';
        } else {
            modal.style.display = 'block';
        }
    }

    /**
     * Disconnection and hide modal
     */
    function disconnect() {
        window.location.href = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" + '?disconnect=1';
        // Optionally hide the modal
        document.getElementById('loginModal').style.display = 'none';
    }

    function showRegisterForm() {
        document.getElementById('loginForm').style.display = 'none';
        document.getElementById('registerForm').style.display = 'block';
    }

    function showLoginForm() {
        document.getElementById('loginForm').style.display = 'block';
        document.getElementById('registerForm').style.display = 'none';
    }

</script>
<!-- Login Modal -->
<div id="loginModal" class="modal">
    <!-- Login Form -->
    <form id="loginForm" action="../front-end/index.php" method="post">
        <h3>Login Here</h3>
        <label for="mail">Mail</label>
        <input type="text" placeholder="Email or Phone" name="email" id="username">
        <label for="password">Password</label>
        <input type="password" placeholder="Password" name="password" id="password">
        <button type="submit">Log In</button>
        <button type="button" onclick="showRegisterForm()">Register</button>
    </form>
    <!-- Register Form -->
    <form id="registerForm" action="../front-end/index.php" method="post" style="display:none;">
        <h3>Register Here</h3>
        <label for="email">Email</label>
        <input type="text" placeholder="Enter your email" name="email" id="email">

        <label for="password">Password</label>
        <input type="password" placeholder="Enter password" name="password" id="password">

        <label for="nom">Nom</label>
        <input type="text" placeholder="Enter your last name" name="nom" id="nom">

        <label for="prenom">Prenom</label>
        <input type="text" placeholder="Enter your first name" name="prenom" id="prenom">

        <label for="date_naissance">Date of Birth</label>
        <input type="date" name="date_naissance" id="date_naissance">

        <label for="adresse">Adresse</label>
        <input type="text" placeholder="Enter your address" name="adresse" id="adresse">

        <label for="code_postal">Code Postal</label>
        <input type="text" placeholder="Enter your postal code" name="code_postal" id="code_postal">

        <label for="ville">Ville</label>
        <input type="text" placeholder="Enter your city" name="ville" id="ville">

        <label for="telephone">Telephone</label>
        <input type="tel" placeholder="Enter your phone number" name="telephone" id="telephone">

        <button type="submit" name="register">Register</button>
    </form>
</div>

<header>
    <!-- Navigation links on the left -->
    <div class="navigation-links left">
        <a href="events.php" class="icon-link">
            <img src="../../assets/svgs/event.svg" alt="événements du club">
        </a>
        <a href="partenaires.php" class="icon-link">
            <img src="../../assets/svgs/Top_wall_sponsorship.svg" alt="partenaires">
        </a>
        <a href="events.php" class="icon-link">
            <img src="../../assets/svgs/key.svg" alt="événements du club">
        </a>
    </div>

    <!-- Central logo -->
    <div class="logo">
        <a href="index.php">
            <img src="../../assets/png/nbfl_logo_icon.png" alt="Logo">
        </a>
    </div>

    <!-- Navigation links on the right -->
    <div class="navigation-links right">
        <a href="multi_media.php" class="icon-link">
            <img src="../../assets/svgs/picture.svg" alt="multimedia">
        </a>
        <a href="#" onclick="authenticate()" class="icon-link">
            <img src="../../assets/svgs/Login_Register.svg" alt="Log-in">
        </a>
        <a href="#" onclick="disconnect();" class="icon-link">
            <img src="../../assets/svgs/Logout_Register.svg" alt="Log-out">
        </a>
    </div>
</header>

