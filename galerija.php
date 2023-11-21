<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
	include "baza.php";

	if(session_id()=="");
	{
		session_start();
	}
	
	include "funkcije/funkcije_slike_planine.php";
	include "funkcije/funkcije_korisnici.php";

	if( !empty($_GET["naziv_planine"]) or !empty($_GET["vrijeme_slikanja_od"]) or !empty($_GET["vrijeme_slikanja_do"]) )
	{
		if( !empty($_GET["naziv_planine"]) and !empty($_GET["vrijeme_slikanja_od"]) and !empty($_GET["vrijeme_slikanja_do"]) )
		{
			$vrijeme_od_timestamp = strtotime($_GET["vrijeme_slikanja_od"]);
			$datum_za_bazu_od = date("Y-m-d H:i:s", $vrijeme_od_timestamp);

			$vrijeme_do_timestamp = strtotime($_GET["vrijeme_slikanja_do"]);
			$datum_za_bazu_do = date("Y-m-d H:i:s", $vrijeme_do_timestamp);
			
			$planina = dohvati_planinu_po_nazivu($_GET["naziv_planine"]);
			if(!empty($planina[0]["planina_id"]))
			{
				$slike = dohvati_sliku_po_nazivu_planine_i_datumu_slikanja_od_do(
					$planina[0]["planina_id"],
					$datum_za_bazu_od,
					$datum_za_bazu_do
				);
			}
			else
			{
				$slike = array();
			}
		}
		elseif( !empty($_GET["naziv_planine"]) )
		{
			$planina = dohvati_planinu_po_nazivu($_GET["naziv_planine"]);
			if(!empty($planina[0]["planina_id"]))
			{
				$slike = dohvati_javne_slike_planine($planina[0]["planina_id"]);
			}
			else
			{
				$slike = array();
			}
		}
		elseif( !empty($_GET["vrijeme_slikanja_od"]) and !empty($_GET["vrijeme_slikanja_do"]) )
		{
			$vrijeme_od_timestamp = strtotime($_GET["vrijeme_slikanja_od"]);
			$datum_za_bazu_od = date("Y-m-d H:i:s", $vrijeme_od_timestamp);

			$vrijeme_do_timestamp = strtotime($_GET["vrijeme_slikanja_do"]);
			$datum_za_bazu_do = date("Y-m-d H:i:s", $vrijeme_do_timestamp);
			
			$slike = dohvati_sliku_po_datumu_slikanja_od_do(
				$datum_za_bazu_od,
				$datum_za_bazu_do
			);
		}
	}
	else if(!empty($_GET["korisnik_id"]))
	{
		$slike = dohvati_javne_slike_korisnika($_GET["korisnik_id"]);
	}
	else if(!empty($_GET["planina_id"]))
	{
		$slike = dohvati_javne_slike_planine($_GET["planina_id"]);
	}
	else
	{
		$slike = dohvati_sve_javne_slike();
	}


	$slike_ulogiranog_korisnika = array();
	if(isset($_SESSION["aktivni_korisnik_id"]))
	{
		$slike_ulogiranog_korisnika = dohvati_sve_slike_korisnika($_SESSION["aktivni_korisnik_id"]);
	}

	$title = "-Galerija";
	$trenutna_stranica = "galerija";

	include "includes/header.php";
	include "includes/navigacija.php";
	
?>
	<section id="Galerija">
		
		<div class="sadrzaj">
			<div class="header">
				<h1>Galerija</h1>
			</div>

		<form action="galerija.php" method="GET">
			<label for="naziv_planine">Naziv planine</label>
			<input type="text" name="naziv_planine" value="<?php
			if( !empty($_GET["naziv_planine"]))
			{
				echo $_GET["naziv_planine"];
			}
			?>">
			
			
			<label for="vrijeme_slikanja_od">Vrijeme slikanja od:</label>
			<input type="text" name="vrijeme_slikanja_od" value="<?php 
			if( !empty($_GET["vrijeme_slikanja_od"]))
			{
				echo $_GET["vrijeme_slikanja_od"];
			}
			?>" placeholder="01.10.2020 12:00:00">

			<label for="vrijeme_slikanja_do">Vrijeme slikanja do:</label>
			<input type="text" name="vrijeme_slikanja_do" value="<?php 
			if( !empty($_GET["vrijeme_slikanja_do"]))
			{
				echo $_GET["vrijeme_slikanja_do"];
			}
			?>" placeholder="15.10.2020 10:00:00">

			<input type="submit" value="Filtiraj">
		</form>

			<?php
				if(!empty($slike_ulogiranog_korisnika) and empty($_GET))
				{
					echo "<div class='privatne-slike'>";
					echo "<h2>Privatne slike</h2>";
					foreach($slike_ulogiranog_korisnika as $slika)
					{
						echo"<div class='slika-okvir'>";
						echo    "<div class='galerija-slika'>";
						echo        "<a href='slika.php?slika_id={$slika['slika_id']}'>";
						echo            "<img src='{$slika['url']}' alt=''>";
						echo        "</a>";
						echo    "</div>";
					$timestamp = strtotime($slika['datum_vrijeme_slikanja']);
					$novi_format_datuma = date("d.m.Y H:i:s", $timestamp);
						echo	"<div class='desc'>";
						echo 		"<p>Status: {$slika["status"]}</p>";
						echo     	"<p>Datum slike: $novi_format_datuma</p>";
						echo		"<a href='uredi_sliku.php?slika_id={$slika['slika_id']}' class='gumb-uredi'>Uredi</a>";
						echo 	"</div>";
						echo"</div>";
					}

					echo "</div>";
				}
			?>
			
			<div class="javne-slike">
			<br>
			<br>
			<br>
				<?php
					echo "<h2>Javne slike</h2>";
					foreach($slike as $slika)
					{
						echo"<div class='slika-okvir'>";
						echo    "<div class='galerija-slika'>";
						echo        "<a href='slika.php?slika_id={$slika['slika_id']}'>";
						echo            "<img src='{$slika['url']}' alt=''>";
						echo        "</a>";
						echo    "</div>";
					$timestamp = strtotime($slika['datum_vrijeme_slikanja']);
					$novi_format_datuma = date("d.m.Y H:i:s", $timestamp);
						echo	"<div class='desc'>";
						echo     	"<p>Datum slike: $novi_format_datuma</p>";
						
						if(isset($_SESSION["aktivni_korisnik_tip"]) and $_SESSION["aktivni_korisnik_tip"] <=1)
						{	
							$korisnik = dohvati_korisnika_pomocu_id($slika["korisnik_id"]);
							echo "<p>Fotografija korisnika:<a href='galerija.php?korisnik_id={$korisnik[0]['korisnik_id']}'>{$korisnik[0]['ime']} {$korisnik[0]['prezime']}</a></p>";
						}

						echo 	"</div>";
						echo"</div>";
					}
				?>
			</div>
		</div>
	</section>


<?php
	include "includes/footer.php";
?>