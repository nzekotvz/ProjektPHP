<?php
    include "baza.php";

    if(session_id()=="");
    {
        session_start();
    }
    include "funkcije/funkcije_slike_planine.php";
    include "funkcije/funkcije_korisnici.php";

    $greskaPoruka = "";
    if(!empty($_GET["korisnik_id"]))
    {
        $korisnik = dohvati_korisnika_pomocu_id($_GET["korisnik_id"]);
    }
    if(!empty($_POST) and !empty($_GET["korisnik_id"]) )
    {
        if
        (
            isset($_SESSION["aktivni_korisnik_tip"]) and $_SESSION["aktivni_korisnik_tip"] == 0 &&
            (
                empty($_POST['korisnicko_ime']) ||
                empty($_POST['lozinka']) ||
                empty($_POST['ime']) ||
                empty($_POST['prezime']) ||
                empty($_POST['email']) ||
                empty($_POST['slika'])
            )
        )
        {
            $greskaPoruka = "Molimo ispunite sva polja";
        }
        else
        {
            if($_POST["blokiran"] == 1)
            {
                izmjeni_sve_slike_korisnika_u_privatne($_GET["korisnik_id"]);
            }
            $polja = array();

            foreach($_POST as $kljuc=>$polje)
            {
                $polja[$kljuc] = $polje;
            }

            $odgovor = izmjeni_korisnika($_GET["korisnik_id"],$polja,true);
            
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

        <form action="uredi_korisnika.php?korisnik_id=<?php echo $_GET["korisnik_id"]; ?>" method="POST" class="nova-slika-forma">
            <h1>Uredi korisnika</h1>  
            
            <?php
                if(!empty($greskaPoruka))
                {
                    echo "<p style='color:red'>$greskaPoruka</p>";
                }
            ?>
            <label for="blokiran">Status korisnika</label>
            <select name="blokiran">
                <?php
                if(isset($_SESSION["aktivni_korisnik_tip"]) and $_SESSION["aktivni_korisnik_tip"] == 0)
                {
                    $selected = '';
                    if($korisnik[0]["blokiran"] == 0){
                        $selected = " selected";
                    }
                    echo '<option value="0" $selected>Nije blokiran</option>';
                }

                ?>
                
                <option value="1" <?php if($korisnik[0]["blokiran"] == 1){echo " selected";}?>>Blokiran</option>
            </select>

            <?php
            if(isset($_SESSION["aktivni_korisnik_tip"]) and $_SESSION["aktivni_korisnik_tip"] == 0)
            {
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
                echo "<input type='text' name='korisnicko_ime' value='{$korisnik[0]['korisnicko_ime']}'/>"; 
                
                echo "<label for='lozinka'>Lozinka</label>";
                echo "<input type='password' name='lozinka' value='{$korisnik[0]['lozinka']}'/>"; 

                echo "<label for='ime'>Ime</label>";
                echo "<input type='text' name='ime' value='{$korisnik[0]['ime']}'/>"; 

                echo "<label for='prezime'>Prezime</label>";
                echo "<input type='text' name='prezime' value='{$korisnik[0]['prezime']}'/>"; 

                echo "<label for='email'>Email</label>";
                echo "<input type='text' name='email' value='{$korisnik[0]['email']}'/>"; 

                echo "<label for='slika'>Slika</label>";
                echo "<input type='text' name='slika' value='{$korisnik[0]['slika']}'/>";     
            }



            ?>

            <input type="submit" value="Spremi korisnika"/>
        </form>
    </section>

<?php
    include "includes/footer.php";
?>