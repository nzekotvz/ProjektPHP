<?php
    if(session_id()=="")
    {
        session_start();
    }

    function dohvati_sve_korisnike()
    {
        $korisnici = array();

        $veza = spajanje_na_bazu();

        $upit = "SELECT * FROM korisnik";

        $korisnici = izvrsi_upit($veza,$upit);

        zatvori_vezu_na_bazu($veza);

        return $korisnici;
    }

    function dohvati_sve_moderatore()
    {
        $korisnici = array();

        $veza = spajanje_na_bazu();

        $upit = "SELECT * FROM korisnik WHERE tip_korisnika_id=1";

        $korisnici = izvrsi_upit($veza,$upit);

        zatvori_vezu_na_bazu($veza);

        return $korisnici;
    }
    function dohvati_samo_blokirane_korisnike()
    {
        $korisnici = array();

        $veza = spajanje_na_bazu();

        $upit = "SELECT * FROM korisnik WHERE blokiran=1";

        $korisnici = izvrsi_upit($veza,$upit);

        zatvori_vezu_na_bazu($veza);

        return $korisnici;
    }

    function dohvati_korisnika_pomocu_id($korisnik_id)
    {
        $korisnik = array();

        $veza = spajanje_na_bazu();

        $upit = "SELECT korisnik_id,tip_korisnika_id,korisnicko_ime,ime,prezime,email,slika,blokiran,lozinka FROM korisnik WHERE korisnik_id=$korisnik_id";

        $korisnik = izvrsi_upit($veza,$upit);

        zatvori_vezu_na_bazu($veza);

        return $korisnik;
    }
    
    function autentifikacija($korisnicko_ime, $lozinka)
    {
        $provjera = false;

        $veza = spajanje_na_bazu();

        $korisnik = array();
        $upit = "SELECT * FROM korisnik WHERE korisnicko_ime='$korisnicko_ime' and lozinka='$lozinka'" ;

        $korisnik = izvrsi_upit($veza,$upit);
        
        if(!empty($korisnik))
        {
            $provjera=true;
            $_SESSION["aktivni_korisnik"] = $korisnik[0]["ime"];
            $_SESSION["aktivni_korisnik_ime_prezime"] = $korisnik[0]["ime"] . " " .$korisnik[0]["prezime"];
            $_SESSION["aktivni_korisnik_id"] = $korisnik[0]["korisnik_id"];
            $_SESSION["aktivni_korisnik_blokiran"] = $korisnik[0]["blokiran"];
            $_SESSION["aktivni_korisnik_tip"] = $korisnik[0]["tip_korisnika_id"];
        }

        zatvori_vezu_na_bazu($veza);

        return $provjera;
    }
    function izmjeni_korisnika($korisnik_id,$polja)
    {
        $korisnik = array();
        
        $veza = spajanje_na_bazu();
        $upit = "UPDATE korisnik SET ";

        if(!empty($polja))
        {
            $broj_polja = count($polja);
            $count = 0;

            foreach($polja as $key => $value)
            {
                if(is_string($value))
                {
                    $upit.= "$key='$value'";
                }
                else{
                    $upit.= "$key=$value";
                }
                $count++;
                if($count < $broj_polja)
                {
                    $upit.= ",";
                }
            }
        }

        $upit .= " WHERE korisnik_id=$korisnik_id";

        $korisnik = izvrsi_upit($veza, $upit, true);

        zatvori_vezu_na_bazu($veza);

        return $korisnik;
    }

    function dodaj_korisnika($polja)
    {
        $korisnik = array();
        
        $veza = spajanje_na_bazu();
        $upit = "INSERT INTO korisnik ( ";
        if(!empty($polja))
        {
            $broj_polja = count($polja);
            $count = 0;

            $vrijednosti = "";

            foreach($polja as $key => $value)
            {
                $upit.= $key;

                $vrijednosti.= "'$value'";
                $count++;
                if($count < $broj_polja)
                {
                    $upit.= ",";
                    $vrijednosti.= ",";
                }
            }
            $upit .= " ) VALUES ($vrijednosti)";
        }
    $korisnik = izvrsi_upit($veza, $upit, true);

    zatvori_vezu_na_bazu($veza);
    return $korisnik;
    }

    function dohvati_statistiku_korisnika($status)
    {
        $statistika = array();

        $veza = spajanje_na_bazu();

        $upit = "SELECT k.ime as ime, k.prezime as prezime, COUNT(*) as broj_slika FROM korisnik k, slika s WHERE status=$status and k.korisnik_id=s.korisnik_id GROUP BY k.korisnik_id ORDER BY k.prezime";

        $statistika = izvrsi_upit($veza,$upit);

        zatvori_vezu_na_bazu($veza);

        return $statistika;
    }
    
?>