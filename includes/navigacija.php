<nav>
    <div class="nav-lijevi">
        <ul>
            
            <li>
                <a href="index.php" 
                <?php
                    if($trenutna_stranica == "naslovnica")
                    {
                        echo 'class="active"';
                    }
                ?>
                >Naslovnica</a>
            </li>
            <li>
                <a href="galerija.php"
                <?php
                    if($trenutna_stranica == "galerija")
                    {
                        echo 'class="active"';
                    }
                ?>
                >Galerija</a>
            </li>
            <li>
                <a href="o_autoru.html">O autoru</a>
            </li>

        <?php
            if(isset($_SESSION["aktivni_korisnik_tip"]) and $_SESSION["aktivni_korisnik_blokiran"] !=1 )
            {
        ?>
            <li>
                <a href="nova_slika.php"
                <?php
                    if($trenutna_stranica == "nova_slika")
                    {
                        echo 'class="active"';
                    }
                ?>
                >Nova slika</a>
            </li>
        <?php
            }
        ?>

<?php
            if(isset($_SESSION["aktivni_korisnik_tip"]) and ($_SESSION["aktivni_korisnik_tip"]) <=1)
            {
        ?>
            <li>
                <a href="planine.php"
                <?php
                    if($trenutna_stranica == "planine")
                    {
                        echo 'class="active"';
                    }
                ?>
                >Planina</a>
            </li>

            <li>
                <a href="korisnici.php"
                <?php
                    if($trenutna_stranica == "korisnici")
                    {
                        echo 'class="active"';
                    }
                ?>
                >Korisnici</a>
            </li>
        <?php
            }
            if(isset($_SESSION["aktivni_korisnik_tip"]) and ($_SESSION["aktivni_korisnik_tip"]) == 0)
            {
        ?>
            <li>
                <a href="statistika.php?status=1"
                <?php
                    if($trenutna_stranica == "statistika_javnih_slika")
                    {
                        echo 'class="active"';
                    }
                ?>
                >Statistika javnih slika</a>
            </li>
            <li>
                <a href="statistika.php?status=0"
                <?php
                    if($trenutna_stranica == "statistika_privatnih_slika")
                    {
                        echo 'class="active"';
                    }
                ?>
                >Statistika privatnih slika</a>
            </li>
        <?php
            }
        ?>
        </ul>
    </div>
    
    <div class="nav-desni">
        <div class="login-logout">
                <?php
                    if(!empty($_SESSION["aktivni_korisnik"]))
                    {
                        echo "<p>Pozdrav {$_SESSION['aktivni_korisnik']}, <a href='login.php?odjava=true' style='color:aqua'>Odjavi se </a></p>";
                    }
                    else 
                    {
                        echo "<p><a href='login.php' style='color:white'>Prijava</a></p>";
                    }
                ?>
        </div>
    </div>
</nav>