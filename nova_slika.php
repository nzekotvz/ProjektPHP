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
            empty($_POST['planina_id']) ||
            empty($_POST['korisnik_id']) ||
            empty($_POST['naziv']) ||
            empty($_POST['url']) ||
            empty($_POST['opis']) ||
            empty($_POST['datum_vrijeme_slikanja']) 
        )
        {
            $greskaPoruka = "Molimo ispunite sva polja";
        }
        else
        {
            if(!empty($_POST["datum_vrijeme_slikanja"]))
            {
                $timestamp = strtotime($_POST["datum_vrijeme_slikanja"]);
                $datum_za_bazu = date("Y-m-d H:i:s", $timestamp);
            }
            $nova_slika = array(
                "planina_id" => $_POST["planina_id"],
                "korisnik_id" => $_POST["korisnik_id"],
                "naziv" => $_POST["naziv"],
                "url" => $_POST["url"],
                "opis" => $_POST["opis"],
                "datum_vrijeme_slikanja" => $datum_za_bazu,
                "status" => 1
            );
            
            $odgovor = dodaj_sliku_u_bazu($nova_slika);

            if($odgovor)
            {
                header("Location:galerija.php");
                exit;
            }

        }

        
    }
    
    $title = "- Nova slika";
    $trenutna_stranica = "nova_slika";
    
    include "includes/header.php";
    include "includes/navigacija.php";

    $planine = dohvati_sve_planine();

?>
    <section class="slika">

        <form action="nova_slika.php" method="POST" class="nova-slika-forma">
            <h1>Nova slika</h1>  

            <?php

            if(!empty($greskaPoruka))
            {
                echo '<p style="color:red;">Potrebno je unijeti sve podatke.</p>';
            }

            ?>

            <label for="planina_id">Planina</label>
            <select name="planina_id">
            <?php
                foreach($planine as $planina)
                {
                    echo "<option value='{$planina['planina_id']}'>{$planina['naziv']}</option>";
                }
            ?>
            </select>

            <br>

            <label for="korisnik_id">Korisnik id</label>
            <input type="text" name="korisnik_id" value="<?php echo $_SESSION['aktivni_korisnik_id']; ?>" readonly onclick='return false;'/>
            <br>

            <label for="naziv">Naziv</label>
            <input type="text" name="naziv" value="" />
            <br>

            <label for="url">Url</label>
            <input type="text" name="url" value="" />
            
            <br>
            <label for="opris">Opis</label>
            <textarea name="opis" rows="5"></textarea>
            <br>

            <p>Datumi se    unose u formatu dd.mm.yyyy hh:mm:ss, npr. "01.01.2021. 12:12:12"</p>
            <label for="datum_vrijeme_slikanja">Datum i vrijeme slikanja</label>
            <input type="text" name="datum_vrijeme_slikanja" value=""/>
            <br>
            <input type="submit" value="Spremi sliku">
        </form>
    </section>

<?php
    include "includes/footer.php";
?>