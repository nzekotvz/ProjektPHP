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


    $geo_sirina = $planina[0]["geografska_sirina"];
    $geo_duzina = $planina[0]["geografska_duzina"];

    $jsonUrl = "https://api.open-meteo.com/v1/forecast?latitude=$geo_sirina&longitude=$geo_duzina&current=temperature";

    // Initialize cURL session
    $curl = curl_init($jsonUrl);

    // Set cURL options
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
		'Content-Type: application/json',
		'Accept: application/json'
	]);

    // Execute cURL session and get the response
    $response = curl_exec($curl);

    // Close cURL session
    curl_close($curl);

    // Decode JSON response
    $vrijemeDanas = json_decode($response, true);

//	print_r($vrijemeDanas);
    
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
                <p><strong>Trenutna temperatura: </strong><?php echo $vrijemeDanas["current"]["temperature"] ?> °C</p>
            </div>
        </div>
    </section>

<?php
    include "includes/footer.php";
?>