<?php
    include "baza.php";

    if(session_id()=="");
    {
        session_start();
    }
    include "funkcije/funkcije_slike_planine.php";
    include "funkcije/funkcije_korisnici.php";

    $title = "- Korisnici";
    $trenutna_stranica = "korisnici";
    
    include "includes/header.php";
    include "includes/navigacija.php";

    if(isset($_SESSION['aktivni_korisnik_tip']) and $_SESSION["aktivni_korisnik_tip"] <= 1)
    {
        if(isset($_GET["samo_blokirani"]) and $_SESSION["aktivni_korisnik_tip"] == 0)
        {
            $korisnici = dohvati_samo_blokirane_korisnike();
        }
        else
        {
            $korisnici = dohvati_sve_korisnike();
            
        }
    }
?>

    <div class="header">
        <h1>Korisnici</h1>
    </div>
    <div class="actions">
        <?php
        if(isset($_SESSION['aktivni_korisnik_tip']) and $_SESSION["aktivni_korisnik_tip"] == 0)
        {
            echo '<a href="novi_korisnik.php">Novi korisnik</a>';
        }
        echo "<br>";
        if(!isset($_GET["samo_blokirani"]) and isset($_SESSION['aktivni_korisnik_tip']) and $_SESSION["aktivni_korisnik_tip"] == 0)
        {
            echo "<a href='korisnici.php?samo_blokirani=true'>Prikaži samo blokirane</a>";
        }
        elseif(isset($_GET["samo_blokirani"]) and isset($_SESSION['aktivni_korisnik_tip']) and $_SESSION["aktivni_korisnik_tip"] == 0)
        {
            echo "<a href='korisnici.php'>Prikaži sve</a>";
        }

        ?>
    </div>
    <section id="planine">
        <table>
            <thead>
                <tr>
                    <th>Slika</th>
                    <th>Korisnik id</th>
                    <th>Korisničko ime</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Email</th>
                    <th>Blokiran</th>
                    <th>Uredi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($korisnici as $korisnik)
                    {
                        echo "<tr>";
                        echo  "<td><img src='{$korisnik['slika']}'/></td>";
                        echo  "<td>{$korisnik['korisnik_id']}</td>";
                        echo  "<td>{$korisnik['korisnicko_ime']}</td>";
                        echo  "<td>{$korisnik['ime']}</td>";
                        echo  "<td>{$korisnik['prezime']}</td>";
                        echo  "<td>{$korisnik['email']}</td>";
                        echo  "<td>{$korisnik['blokiran']}</td>";
                        echo  "<td><a href='uredi_korisnika.php?korisnik_id={$korisnik['korisnik_id']}'>Uredi</a></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>


    </section>

<?php
    include "includes/footer.php";
?>