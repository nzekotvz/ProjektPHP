<?php

    if(session_id()=="")
    {
        session_start();
    }

    function dohvati_sve_javne_slike()
    {
        $slike = array();

        $veza = spajanje_na_bazu();

        $upit = "SELECT * FROM slika WHERE status=1 ORDER BY datum_vrijeme_slikanja DESC";

        $slike = izvrsi_upit($veza, $upit);

        zatvori_vezu_na_bazu($veza);

        return $slike;

    }
    function dohvati_sliku_pomocu_id($slika_id)
    {
        $slike = array();

        $veza = spajanje_na_bazu();

        $upit = "SELECT * FROM slika WHERE slika_id=$slika_id";

        $slike = izvrsi_upit($veza, $upit);

        zatvori_vezu_na_bazu($veza);

        return $slike;
    }
    function dohvati_sliku_po_datumu_slikanja_od_do($slikano_od,$slikano_do)
    {
        $slike = array();

        $veza = spajanje_na_bazu();

        $upit = "SELECT * FROM slika WHERE status=1 AND datum_vrijeme_slikanja BETWEEN '$slikano_od' AND '$slikano_do'";

        $slike = izvrsi_upit($veza, $upit);

        zatvori_vezu_na_bazu($veza);

        return $slike;
    }
    function dohvati_sliku_po_nazivu_planine_i_datumu_slikanja_od_do($planina_id,$slikano_od,$slikano_do)
    {
        $slike = array();

        $veza = spajanje_na_bazu();
 
        $upit = "SELECT * FROM slika WHERE status=1 AND planina_id='$planina_id' AND datum_vrijeme_slikanja BETWEEN '$slikano_od' AND '$slikano_do'";

        $slike = izvrsi_upit($veza, $upit);

        zatvori_vezu_na_bazu($veza);

        return $slike;
    }

    function dohvati_planinu_po_id($planina_id)
    {
        $planina = array();

        $veza = spajanje_na_bazu();

        $upit = "SELECT * FROM planina WHERE planina_id=$planina_id";

        $planina = izvrsi_upit($veza, $upit);

        zatvori_vezu_na_bazu($veza);

        return $planina;
    }

    function dohvati_planinu_po_nazivu($naziv)
    {
        $planina = array();

        $veza = spajanje_na_bazu();

        $upit = "SELECT * FROM planina WHERE naziv='$naziv'";

        $planina = izvrsi_upit($veza, $upit);

        zatvori_vezu_na_bazu($veza);

        return $planina;
    }

    function dohvati_javne_slike_korisnika($korisnik_id)
    {
        $slike = array();

        $veza = spajanje_na_bazu();
        
        $upit = "SELECT * FROM slika WHERE status=1 AND korisnik_id=$korisnik_id";

        $slike = izvrsi_upit($veza,$upit);

        zatvori_vezu_na_bazu($veza);

        return $slike;
    }
    function dohvati_sve_slike_korisnika($korisnik_id)
    {
        $slike = array();

        $veza = spajanje_na_bazu();
        
        $upit = "SELECT * FROM slika WHERE korisnik_id=$korisnik_id";

        $slike = izvrsi_upit($veza,$upit);

        zatvori_vezu_na_bazu($veza);

        return $slike;
    }

    function dohvati_javne_slike_planine($planina_id)
    {
        $slike = array();

        $veza = spajanje_na_bazu();
        
        $upit = "SELECT * FROM slika WHERE status=1 AND planina_id=$planina_id";

        $slike = izvrsi_upit($veza,$upit);

        zatvori_vezu_na_bazu($veza);

        return $slike;

    }

    function dohvati_sve_planine()
    {
        $planine = array();

        $veza = spajanje_na_bazu();
        
        $upit = "SELECT * FROM planina";

        $planine = izvrsi_upit($veza,$upit);

        zatvori_vezu_na_bazu($veza);

        return $planine;
    }
    function dohvati_sve_planine_moderatora($korisnik_id)
    {
        $planine = array();

        $veza = spajanje_na_bazu();
        
        $upit = "SELECT * FROM moderator WHERE korisnik_id=$korisnik_id ";

        $planine_moderatora = izvrsi_upit($veza,$upit);
        
        foreach($planine_moderatora as $planina)
        {
            if($korisnik_id == $planina["korisnik_id"])
            {
                $planine[] = dohvati_planinu_po_id($planina["planina_id"])[0];
            }
        }
        
        zatvori_vezu_na_bazu($veza);

        return $planine;
    }
    function dohvati_sve_moderatore_planine($planina_id)
    {
        $moderatori = array();

        $veza = spajanje_na_bazu();
                
        $upit = "SELECT * FROM moderator WHERE planina_id=$planina_id";

        $moderatori_planine = izvrsi_upit($veza,$upit);
        foreach($moderatori_planine as $planina)
        {
            if($planina_id == $planina["planina_id"])
            {
                $moderatori[] = dohvati_korisnika_pomocu_id($planina["korisnik_id"])[0];
            }
        }

        zatvori_vezu_na_bazu($veza);

        return $moderatori;

    }
    function dodaj_moderatora_planine($planina_id, $moderator_id)
    {
        $veza = spajanje_na_bazu();

        $upit = "INSERT INTO moderator (`planina_id`, `korisnik_id`)
        VALUES ($planina_id, $moderator_id)";
        
        $dodaj_moderatora = izvrsi_upit($veza,$upit,true);

        zatvori_vezu_na_bazu($veza);

        return $dodaj_moderatora;
    }

    function ukloni_moderatora_planine($planina_id,$moderator_id)
    {
        $veza = spajanje_na_bazu();

        $upit = "DELETE from moderator WHERE planina_id=$planina_id AND korisnik_id=$moderator_id";
    
        $ukloni_moderatora = izvrsi_upit($veza,$upit,true);

        zatvori_vezu_na_bazu($veza);

        return $ukloni_moderatora;
    }
    function dodaj_sliku_u_bazu($nova_slika)
    {
        $veza = spajanje_na_bazu();

        $upit = "INSERT INTO slika (`planina_id`, `korisnik_id`, `naziv`, `url`, `opis`, `datum_vrijeme_slikanja`, `status`)
        VALUES ({$nova_slika['planina_id']},
        {$nova_slika['korisnik_id']},
        '{$nova_slika['naziv']}',
        '{$nova_slika['url']}',
        '{$nova_slika['opis']}',
        '{$nova_slika['datum_vrijeme_slikanja']}',
        {$nova_slika['status']}
        )"; 

       
        $slika = izvrsi_upit($veza,$upit,true);

        zatvori_vezu_na_bazu($veza);

        return $slika;
    }

    function izmjeni_sliku($slika_id, $slika_update)
    {
        $veza = spajanje_na_bazu();

        $upit = "UPDATE slika SET
        `planina_id`={$slika_update['planina_id']},
        `korisnik_id`={$slika_update['korisnik_id']},
        `naziv`='{$slika_update['naziv']}',
        `url`='{$slika_update['url']}',
        `opis`='{$slika_update['opis']}',
        `datum_vrijeme_slikanja`='{$slika_update['datum_vrijeme_slikanja']}',
        `status`={$slika_update['status']} WHERE slika_id=$slika_id
        "; 

        $slika = izvrsi_upit($veza,$upit,true);

        zatvori_vezu_na_bazu($veza);

        return $slika;
    }

    function dodaj_planinu($polja)
    {
        $korisnik = array();
        
        $veza = spajanje_na_bazu();
        $upit = "INSERT INTO planina ( ";
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

    function izmjeni_planinu($planina_id, $polja)
    {
        $veza = spajanje_na_bazu();
        
        $upit = "UPDATE planina SET ";
        if(!empty($polja));
        {
            $broj_polja = count($polja);
            $count = 0;
            foreach($polja as $key => $value)
            {
                if(is_string($value))
                {
                    $upit.= "$key='$value'";
                }
                else 
                {
                    $upit.= "$key=$value";
                }
                $count++;
                if($count < $broj_polja)
                {
                    $upit.= ",";
                }

            }
        }
        $upit .= " WHERE planina_id=$planina_id";
        $korisnik = izvrsi_upit($veza, $upit, true);
    
        zatvori_vezu_na_bazu($veza);
    
        return $korisnik;
    }
    function izmjeni_sve_slike_korisnika_u_privatne($korisnik_id)
    {
        $veza = spajanje_na_bazu();

        $upit = "UPDATE slika SET `status`=0 WHERE korisnik_id=$korisnik_id";

        $status = izvrsi_upit($veza,$upit, true);

        zatvori_vezu_na_bazu($veza);

        return $status;
    }
?>