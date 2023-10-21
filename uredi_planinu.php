<?php
    include "baza.php";

    if(session_id()=="");
    {
        session_start();
    }
    include "funkcije/funkcije_slike_planine.php";
    include "funkcije/funkcije_korisnici.php";

    $greskaPoruka = "";
    $moderatori = array();
    if(!empty($_GET["planina_id"]))
    {
        $planina = dohvati_planinu_po_id($_GET["planina_id"]);
        $moderatori = dohvati_sve_moderatore();
    }
    if(!empty($_POST) and !empty($_GET["planina_id"]))
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
            $odgovor = izmjeni_planinu($_GET["planina_id"],$nova_planina);
    
            if($odgovor)
            {
                header("Location:planine.php");
                exit;
            }
        }

    }
    if(!empty($_GET["planina_id"]) and !empty($_GET["moderator_id"]))
    {
        $dodaj_moderatora = dodaj_moderatora_planine($_GET["planina_id"], $_GET["moderator_id"]);

        if($dodaj_moderatora == true)
        {
            header("Location:uredi_planinu.php?planina_id={$_GET['planina_id']}");
            exit;
        }
    }
    if(!empty($_GET["planina_id"]) and !empty($_GET["ukloni_moderatora_id"]))
    {
        $ukloni = ukloni_moderatora_planine($_GET["planina_id"], $_GET["ukloni_moderatora_id"]);

        if($ukloni == true)
        {
            header("Location:uredi_planinu.php?planina_id={$_GET['planina_id']}");
            exit;
        }
    }
    
    $title = "- Uredi planinu";
    $trenutna_stranica = "planine";
    
    include "includes/header.php";
    include "includes/navigacija.php";
?>
    <section class="slika">

        <form action="uredi_planinu.php?planina_id=<?php echo $_GET["planina_id"]?>" method="POST" class="nova-slika-forma">
        <h1>Uredi planinu </h1>  
            <?php
                if(!empty($greskaPoruka))
                {
                    echo "<p style='color:red'>$greskaPoruka</p>";
                }
            ?>
            <label for="naziv">Naziv</label>
            <input type="text" name="naziv" value="<?php  echo $planina[0]["naziv"];?>" >
            <br>

            <label for="opis">Opis</label>
            <input type="text" name="opis" value="<?php  echo $planina[0]["opis"];?>">

            <label for="lokacija">Lokacija</label>
            <input type="text" name="lokacija" value="<?php  echo $planina[0]["lokacija"];?>" />

            <label for="geografska_sirina">Geografska širina</label>
            <input type="text" name="geografska_sirina" value="<?php  echo $planina[0]["geografska_sirina"];?>" />

            <label for="geografska_duzina">Geografska dužina</label>
            <input type="text" name="geografska_duzina" value="<?php  echo $planina[0]["geografska_duzina"];?>" />


            <input type="submit" value="Spremi planinu">
        </form>
    </section>
    
    <?php
    if(isset($_SESSION["aktivni_korisnik_tip"]) and $_SESSION["aktivni_korisnik_tip"] == 0)
    {
        $moderatori_planine = dohvati_sve_moderatore_planine($_GET["planina_id"]);
        ?>

    <section class="slika">
		<h1>Moderator planina</h1>
        
        <?php 
        if(!empty($moderatori_planine))
        {

        ?>

		<table>
			<thead>
				<tr>
					<th>Korisnik id</th>
					<th>Ime i prezime</th>
					<th>Uredi</th>
				</tr>
			</thead>		
			<tbody>
				<?php
					foreach($moderatori_planine as $moderator)
					{
						echo "<tr>";
							echo "<td>{$moderator['korisnik_id']}</td>";
							echo "<td>{$moderator['ime']} {$moderator['prezime']}</td>";
							echo "<td><a href='uredi_planinu.php?planina_id={$_GET["planina_id"]}&  _id={$moderator['korisnik_id']}'>Ukloni</a></td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>


		<?php
        }

			echo "<form action='uredi_planinu.php' method='GET'>";
				echo "<br>";
				echo "<br>";
				echo "<input type='hidden' name='planina_id' value='{$_GET['planina_id']}'>";
				echo "<select name='moderator_id'>";
				foreach($moderatori as $korisnik)
				{
					$korisnik_vec_moderator = false;
					foreach($moderatori_planine as $moderator)
					{
						if($korisnik["korisnik_id"] == $moderator["korisnik_id"])
						{
							$korisnik_vec_moderator = true;
						}
					}
					if($korisnik_vec_moderator == true)
					{
						continue;
					}
					echo "<option value='{$korisnik["korisnik_id"]}'>{$korisnik["ime"]} {$korisnik["prezime"]}</option>";
				}
				
				echo "</select>";
				
				echo "<input type='submit' value='Dodaj moderatora' />";
			echo "</form>";
		?>
			
	</section>
 

    <?php

     
    }

    ?>

<?php
    include "includes/footer.php";
?>