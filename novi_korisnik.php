<?php
    include "baza.php";

    if(session_id()=="");
    {
        session_start();
    }
    include "funkcije/funkcije_slike_planine.php";
    include "funkcije/funkcije_korisnici.php";

    $greskaPoruka = "";
    
    if(!empty($_POST))
    {
        if
        (
            empty($_POST['korisnicko_ime']) ||
            empty($_POST['lozinka']) ||
            empty($_POST['ime']) ||
            empty($_POST['prezime']) ||
            empty($_POST['email']) ||
            empty($_POST['slika']) 
        )
        {
            $greskaPoruka = "Molimo ispunite sva polja";
        }
        else
        {
            $novi_korisnik = array(
                "blokiran"=>$_POST['blokiran'],
                "tip_korisnika_id"=>$_POST['tip_korisnika_id'],
                "korisnicko_ime"=>$_POST['korisnicko_ime'],
                "lozinka"=>$_POST['lozinka'],
                "ime"=>$_POST['ime'],
                "prezime"=>$_POST['prezime'],
                "email"=>$_POST['email'],
                "slika"=>$_POST['slika']
            );
    
            $odgovor = dodaj_korisnika($novi_korisnik,true);

            if($odgovor)
            {
                header("Location:korisnici.php");
                exit;
            }
        }

    }

    
    $title = "- Uredi korisnika";
    $trenutna_stranica = "korisnici";
    
    include "includes/header.php";
    include "includes/navigacija.php";


?>
    <section class="slika">

        <form action="novi_korisnik.php" method="POST" class="nova-slika-forma">
            <h1>Novi korisnik</h1>  
            <?php
                if(!empty($greskaPoruka))
                {
                    echo "<p style='color:red'>$greskaPoruka</p>";
                }
                if(isset($_SESSION["aktivni_korisnik_tip"]) and $_SESSION["aktivni_korisnik_tip"] == 0)
                {
            ?>
            <label for="blokiran">Status korisnika</label>
            <select name="blokiran">
                <option value="0" >Nije blokiran</option>
                <option value="1" >Blokiran</option>
            </select>
            <?php
                $tip_korisnika = array(
                    0 => "Administrator",
                    1 => "Moderator",
                    2 => "Korisnik",
                );

                echo "<label for='tip_korisnika_id'>Tip korisnika</label>";
                echo "<select name='tip_korisnika_id'>";
                    foreach($tip_korisnika as $tip =>$label)
                    {
                        $selected ='';

                        if($tip == intval($korisnik[0]["tip_korisnika_id"]) )
                        {
                            $selected = " selected";
                        }
                        echo "<option value='$tip' $selected>{$label}</option>";
                    }
                echo "</select>";
                echo "<br>";

                echo "<label for='korisnicko_ime'>Korisničko ime</label>";
                echo "<input type='text' name='korisnicko_ime' value=''/>"; 
                
                echo "<label for='lozinka'>Lozinka</label>";
                echo "<input type='password' name='lozinka' value=''/>"; 

                echo "<label for='ime'>Ime</label>";
                echo "<input type='text' name='ime' value=''/>"; 

                echo "<label for='prezime'>Prezime</label>";
                echo "<input type='text' name='prezime' value=''/>"; 

                echo "<label for='email'>Email</label>";
                echo "<input type='text' name='email' value=''/>"; 

                echo "<label for='slika'>Slika</label>";
                echo "<input type='text' name='slika' value=''/>";     
            }



            ?>

            
            <input type="submit" value="Spremi sliku"/>
        </form>
    </section>

<?php
    include "includes/footer.php";
?>