<?php
    include "baza.php";

    if(session_id()=="");
    {
        session_start();
    }
    include "funkcije/funkcije_slike_planine.php";
    include "funkcije/funkcije_korisnici.php";

    $greskaPoruka = "";
    if(!empty($_GET["slika_id"]))
    {
        $slika = dohvati_sliku_pomocu_id($_GET["slika_id"]);
    }
    if(!empty($_POST) and !empty($_GET["slika_id"]))
    {
        if
        (
            empty($_POST['planina_id']) OR
            empty($_POST['naziv']) OR
            empty($_POST['url']) OR
            empty($_POST['opis']) OR
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
                "status" => $_POST["status"]
            );
            $odgovor = izmjeni_sliku($_GET["slika_id"],$nova_slika, true);
    
            if($odgovor)
            {
                header("Location:galerija.php");
                exit;
            }
        }

    }
    
    $title = "- Uredi sliku";
    $trenutna_stranica = "uredi_sliku";
    
    include "includes/header.php";
    include "includes/navigacija.php";

    $planine = dohvati_sve_planine();

?>
    <section class="slika">

        <form action="uredi_sliku.php?slika_id=<?php echo $_GET["slika_id"]?>" method="POST" class="nova-slika-forma">
            <h1>Uredi sliku</h1>  
            
                <?php
                    if(!empty($greskaPoruka))
                    {
                        echo "<p style='color:red'>$greskaPoruka</p>";
                    }
                ?>
            <label for="status">Status</label>
            <select name="status" id="">
                <?php if($slika[0]["status"] == 0){echo "selected";}?>

                <option value="0" <?php if($slika[0]["status"] == 0){echo " selected";}?>>Privatna</option>
                <option value="1" <?php if($slika[0]["status"] == 1){echo " selected";}?>>Javna</option>
            </select>
                
            <label for="planina_id">Planina</label>
            <select name="planina_id">
            <?php
                foreach($planine as $planina)
                {
                    $selected = "";
                    if($planina["planina_id"] == $slika[0]["planina_id"])
                    {
                        $selected = " selected";
                    }


                    echo "<option value='{$planina['planina_id']}' $selected>{$planina['naziv']}</option>";
                }
            ?>
            </select>

            <br>

            <label for="korisnik_id">Korisnik id</label>
            <input type="text" name="korisnik_id" value="<?php echo $_SESSION['aktivni_korisnik_id']; ?>" readonly onclick='return false;'/>
            <br>

            <label for="naziv">Naziv</label>
            <input type="text" name="naziv" value="<?php echo $slika[0]["naziv"]; ?>" />
            <br>

            <label for="url">Url</label>
            <input type="text" name="url" value="<?php echo $slika[0]["url"]; ?>" />
            
            <br>
            <label for="opris">Opis</label>
            <textarea name="opis" rows="5"><?php echo $slika[0]["opis"]; ?></textarea>
            <br>

            <p>Datumi se unose u formatu dd.mm.yyyy hh:mm:ss, npr. "01.01.2021. 12:12:12"</p>
            <label for="datum_vrijeme_slikanja">Datum i vrijeme slikanja</label>
            <input type="text" name="datum_vrijeme_slikanja" value="<?php 
                $timestamp = strtotime($slika[0]['datum_vrijeme_slikanja']);
                $novi_format_datuma = date("d.m.Y H:i:s", $timestamp);
                echo $novi_format_datuma; 
            ?>"/>
            <br>
            <input type="submit" value="Spremi sliku">
        </form>
    </section>

<?php
    include "includes/footer.php";
?>