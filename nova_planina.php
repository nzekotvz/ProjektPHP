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
            empty($_POST['naziv']) ||
            empty($_POST['opis']) ||
            empty($_POST['lokacija']) ||
            empty($_POST['geografska_sirina']) || 
            empty($_POST['geografska_duzina']) 
        )
        {
            $greskaPoruka = "Molimo ispunite sva polja";
        }
        else
        {
            $nova_planina = array(
                "naziv" => $_POST["naziv"],
                "opis" => $_POST["opis"],
                "lokacija" => $_POST["lokacija"],
                "geografska_sirina" => $_POST["geografska_sirina"],
                "geografska_duzina" => $_POST["geografska_duzina"],
            );
            
            $odgovor = dodaj_planinu($nova_planina);
    
            if($odgovor)
            {
                header("Location:planine.php");
                exit;
            }
        }

      
    }
    $title = "- Nova planina";
    $trenutna_stranica = "planine";
    
    include "includes/header.php";
    include "includes/navigacija.php";
?>
    <section class="slika">

        <form action="nova_planina.php" method="POST" class="nova-slika-forma">
            <h1>Nova planina </h1>  

            <?php

            if(!empty($greskaPoruka))
            {
                echo '<p style="color:red;">Potrebno je unijeti sve podatke.</p>';
            }

            ?>

            <label for="naziv">Naziv</label>
            <input type="text" name="naziv" value="" />
            <br>

            <label for="opis">Opis</label>
            <input type="text" name="opis" value="" />

            <label for="lokacija">Lokacija</label>
            <input type="text" name="lokacija" value="" />
            
            <label for="geografska_sirina">Geografska širina</label>
            <input type="text" name="geografska_sirina" value="" />

            <label for="geografska_duzina">Geografska dužina</label>
            <input type="text" name="geografska_duzina" value="" />

        
            <input type="submit" value="Spremi planinu">
        </form>
    </section>

<?php
    include "includes/footer.php";
?>