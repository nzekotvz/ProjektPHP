<?php
    include "baza.php";

    if(session_id()=="");
    {
        session_start();
    }
    include "funkcije/funkcije_slike_planine.php";
    include "funkcije/funkcije_korisnici.php";

    $slika = array();
    if(!empty($_GET["slika_id"]))
    {
        $slika = dohvati_sliku_pomocu_id($_GET["slika_id"]);
        
        $korisnik=array();
        if(!empty($slika))
        {
            $korisnik = dohvati_korisnika_pomocu_id($slika[0]['korisnik_id']);
            $planina = dohvati_planinu_po_id(($slika[0]['planina_id']));
        }
    }

    $title = "- Detalji slike";
    $trenutna_stranica = "";
    
    include "includes/header.php";
    include "includes/navigacija.php";

?>
    <section class="slika-detalji">
        <div class="header">
            <h1>Detalji slike</h1>
        </div>
        <div class="slika-detalji">
            <div class="slika-prikaz">
                <img src="<?php echo $slika[0]['url'] ?>" alt="">
            </div>

            <div class="sidebar">
                <p>
                    <strong>Korisnik: </strong>
                    <?php
                        echo "<a href='galerija.php?korisnik_id={$korisnik[0]['korisnik_id']}'>";
                        echo $korisnik[0]["ime"] . " ". $korisnik[0]["prezime"];
                        echo "</a>";
                    ?>
                </p>
                <p>
                    <strong>Naziv planine: </strong> 
                    <?php 
                        echo "<a href='galerija.php?planina_id={$planina[0]['planina_id']}'>";
                        echo $planina[0]["naziv"];
                        echo "</a>";
                    ?>
                </p>
                <p><strong>Opis planine: </strong> <?php echo $planina[0]["opis"] ?></p>


                <p><strong>Naziv: </strong> <?php echo $slika[0]["naziv"] ?></p>
                <p><strong>Opis slike: </strong><?php echo $slika[0]["opis"] ?></p>
            </div>
        </div>
    </section>

<?php
    include "includes/footer.php";
?>