<?php
    define("POSLUZITELJ","mysql");
    define("BAZA","iwa_2020_vz_projekt");
    define("BAZA_KORISNIK","root");
    define("BAZA_LOZINKA","m11");

    function spajanje_na_bazu()
    {
        $veza=mysqli_connect(POSLUZITELJ,BAZA_KORISNIK,BAZA_LOZINKA);

        if($veza)
        {
            mysqli_select_db($veza,BAZA);
            mysqli_set_charset($veza,"utf8");
        }
        else
        {
            echo "Greška prilikom spajanja na bazu:" .mysqli_connect_error();
            die();
        }

        return $veza;
    }
    
    function izvrsi_upit($veza,$upit,$insert_or_update = false)
    {
        $rezultat=mysqli_query($veza,$upit);
        
        if($insert_or_update)
        {
            return $rezultat;
        }
        else
        {
            $rows = array();
            if(!empty($rezultat))
            {
                while ($row = mysqli_fetch_assoc($rezultat))
                {
                    $rows[] = $row;
                }
            }
            return $rows;
        }

    }


    function zatvori_vezu_na_bazu($veza)
    {
        mysqli_close($veza);
    }


?>