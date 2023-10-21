<?php
    include "baza.php";

    include "funkcije/funkcije_korisnici.php";

    if(!empty($_GET["odjava"]))
    {
        unset($_SESSION["aktivni_korisnik"]);
        unset( $_SESSION["aktivni_korisnik_ime_prezime"] );
        unset($_SESSION["aktivni_korisnik_id"] );
        unset($_SESSION["aktivni_korisnik_tip"]);
        session_destroy();
        header("Location:index.php");
        exit;
    }

    if(!empty($_POST)) 
    {
        $korisnicko_ime = $_POST['korisnicko_ime'];
        $lozinka = $_POST['lozinka'];

        $greskaPoruka = "";
        
        if(!empty($korisnicko_ime) and !empty($lozinka))
        {
            $auth = autentifikacija($korisnicko_ime, $lozinka);
            
            if($auth)
            {
                header("Location: index.php");
                exit;
            }
            else
            {
                $greskaPoruka = "Korisničko ime ili lozinka neispravni";
            }
        }
        else
        {
            $greskaPoruka ="Molimo unestire korisničko ime i lozinku";
        }
    }
    $title="- Login";
    $trenutna_stranica="login";
    include "includes/header.php";
    include "includes/navigacija.php";
?>

<section id="login">
    <form action="login.php" class="login-forma" method="POST">
        <div class="forma-stil">
            <h1>Login</h1>

            <?php 
                if(!empty($greskaPoruka))
                {
                    echo "<p style='color:red;'>$greskaPoruka</p>";
                }
            ?>
            <input type="text" name="korisnicko_ime" value="" placeholder="Korisničko ime"/>
            <br>
            <input type="password" name="lozinka" value="" placeholder="Lozinka"/>

            <input type="submit" value="Login" class="login-gumb">
        </div>
    </form>
</section>
    
<?php
include "includes/footer.php";
?>





