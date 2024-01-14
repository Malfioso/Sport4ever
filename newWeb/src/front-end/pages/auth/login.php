<!-- Login Modal -->

<link rel="stylesheet" href="../../front-end/css/login.css">
<div id="loginModal" class="modal">
    <!-- Login Form -->
    <form id="loginForm" action="" method="post">
        <h3>Login Here</h3>
        <label for="mail">Mail</label>
        <input type="text" placeholder="Email or Phone" name="email" id="username">
        <label for="loginPassword">Password</label>
        <input type="password" placeholder="Password" name="password" id="loginPassword">
        <button type="submit">Log In</button>
        <button type="button" onclick="showRegisterForm()">Register</button>
    </form>

    <!-- Register Form -->

    <form id="registerForm" action="" method="post" style="display:none;">
        <h3>Register Here</h3>
        <label for="email">Email</label>
        <input type="text" placeholder="Enter your email" name="email" id="email">

        <label for="registerPassword">Password</label>
        <input type="password" placeholder="Enter password" name="password" id="registerPassword">

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