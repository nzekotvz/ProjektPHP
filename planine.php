<?php
    include "baza.php";

    if(session_id()=="");
    {
        session_start();
    }
    include "funkcije/funkcije_slike_planine.php";
    include "funkcije/funkcije_korisnici.php";

    
    $planine = array();

    if(isset($_SESSION["aktivni_korisnik_tip"]) and $_SESSION["aktivni_korisnik_tip"] == 1)
    {
        $planine = dohvati_sve_planine_moderatora($_SESSION['aktivni_korisnik_id']);
        
    }
    elseif(isset($_SESSION["aktivni_korisnik_tip"]) and $_SESSION["aktivni_korisnik_tip"] == 0)
    {
        $planine = dohvati_sve_planine();
    }
    $title = "- Planine";
    $trenutna_stranica = "planine";
    
    include "includes/header.php";
    include "includes/navigacija.php";

?>
    <section id="planine">

        <div class="header">
            <h1>Planine</h1>
        </div>
        
        <div class="actions">
            <?php
                if(isset($_SESSION["aktivni_korisnik_tip"]) and $_SESSION["aktivni_korisnik_tip"] == 0)
                {
                    echo '<a href="nova_planina.php">Nova planina</a>';
                }
            ?>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Naziv</th>
                    <th>Opis</th>
                    <th>Lokacija</th>
                    <th>Geografska širina</th>
                    <th>Geografska dužina</th>
                    <?php
                        if(isset($_SESSION["aktivni_korisnik_tip"]) and $_SESSION["aktivni_korisnik_tip"] == 0)
                        {
                            echo "<th>Akcije</th>";
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($planine as $planina)
                    {
                        echo "<tr>";
                        echo  "<td><a href='galerija.php?planina_id={$planina['planina_id']}'>{$planina['naziv']}</a></td>";
                        echo  "<td>{$planina['opis']}</td>";
                        echo  "<td>{$planina['lokacija']}</td>";
                        echo  "<td>{$planina['geografska_sirina']}</td>";
                        echo  "<td>{$planina['geografska_duzina']}</td>";
                        if(isset($_SESSION["aktivni_korisnik_tip"]) and $_SESSION["aktivni_korisnik_tip"] == 0)
                        {
                            echo  "<td><a href='uredi_planinu.php?planina_id={$planina['planina_id']}'>Uredi</a></td>";
                        }
                        
                        echo "</tr>";
                    }
                ?>
            </tbody>

        </table>


    </section>

<?php
    include "includes/footer.php";
?>