<?php
require_once 'lib/functions.php';
require_once 'model/database.php';


getHeader("Accueil");
?>

        <form action="index.php" method="post" class="form-signin">
            <h1 class="h3 mb-3 font-weight-normal">Connexion</h1>
            <label for="inputEmail" class="sr-only">Email</label>
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
            <label for="inputPassword" class="sr-only">Mot de passe</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        </form>

        <form action="index.php" method="post" class="">
            <h1 class="h3 mb-3 font-weight-normal">Inscription</h1>
            <label for="inputEmail" class="sr-only">Email</label>
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
            <label for="inputPassword" class="sr-only">Mot de passe</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        </form>

<?php getFooter(); ?>
