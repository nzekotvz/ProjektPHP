<?php
    include "baza.php";

    if(session_id()=="");
    {
        session_start();
    }
    include "funkcije/funkcije_slike_planine.php";
    include "funkcije/funkcije_korisnici.php";

    $title = "- Statistika";
    if(isset($_GET["status"]) and $_GET["status"] == 0)
    {
        $trenutna_stranica = "statistika_privatnih_slika";
    }
    else
    {
        $trenutna_stranica = "statistika_javnih_slika";
    }

    
    include "includes/header.php";
    include "includes/navigacija.php";

    if(isset($_SESSION['aktivni_korisnik_tip']) and $_SESSION["aktivni_korisnik_tip"] <= 0)
    {
        if(isset($_GET["status"]))
        {
            $korisnici = dohvati_statistiku_korisnika($_GET["status"]);
        }
    }
?>

    <div class="header">
        <?php
            if(isset($_GET["status"]) and $_GET["status"] == 0)
            {
                echo "<h1>Statistika privatnih slika </h1>";
            }
            elseif(isset($_GET["status"]) and $_GET["status"] == 1)
            {
                echo "<h1>Statistika javnih slika </h1>";
            }

        ?>
    </div>
   
    <section id="planine">
        <table>
            <thead>
                <tr>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Broj slika</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($korisnici as $korisnik)
                    {
                        echo "<tr>";
                        echo  "<td>{$korisnik['ime']}</td>";
                        echo  "<td>{$korisnik['prezime']}</td>";
                        echo  "<td>{$korisnik['broj_slika']}</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>


    </section>

<?php
    include "includes/footer.php";
?>