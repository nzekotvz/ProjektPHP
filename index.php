<?php
    include "baza.php";
    if(session_id()=="")
    {
        session_start();
    }
    $title = "- Naslovnica";
    $trenutna_stranica="naslovnica";
    include "includes/header.php";
    include "includes/navigacija.php";
?>

<section id="naslovni-blok">
    <div class="naslovna-slika">
        <img src="images/header-img.jpg" >
    </div>

    <div class="naslov">
        <h1>Hrvatske planine</h1>
    </div>
</section>

<section id="kratki-tekst">
    <div class="text">
        <p>
            Hrvatska je srednjoeuropska i mediteranska zemlja, istodobno i planinska i nizinska, primorska i kontinentalna, ljepotom jedinstvena, a brojnošću i raznolikošću prirodnih fenomena jedna od najbogatijih u Europi. <br>
            <br>
            Posebno mjesto na zemljovidu Hrvatske svakako imaju naše planine. Iako se ne ističu visinom svojih vrhova, a ima među njima gora i brda posve beznačajne visine, nije pretjerano reći da malo koja zemlja na svijetu ima tako lijepe i zanimljive planine. Vidici na more, slikovite šume i livade, impresivne stijene, nasljeđe povijesti i mnogo drugih pojava i fenomena mogu se obilaziti godinama i desetljećima a da istraživanje nikada ne postane dosadno ili bude iscrpljeno.<br>
            <br>
            Najviše hrvatske planine pripadaju Dinarskom gorju, tipičnom području dubokoga krša s oštrim krškim oblicima, oskudicom vode, zanimljivom vegetacijom i razmjerno surovom klimom. Protežu se smjerom sjeverozapad-jugoistok u nekoliko usporednih nizova, koji počinju s otočnim planinama. Dinaridi su svojom visinom i duljinom oštar zid prodoru mediteranskih utjecaja u unutrašnjost.<br>
            <br>
            Planine kontinentalne Hrvatske posve su drukčije. Njihov smjer pružanja nije jedinstven, ali se nigdje ne podudara s dinarskim. Mahom su stare geološke građe, blažih strmina, razmjerno niske te bogate vodom i vegetacijom. Imaju brojne vodne tokove koji su kroz stoljeća usjekli duboke doline i tako stvorili šarolik reljef. Uglavnom su pokrivene šumom, a osobito su zanimljiva ona mjesta na kojima se javljaju slikovite stijene, duboki kanjoni i pitome livade.
        </p>


    </div>


</section>
<?php
include "includes/footer.php";
?>





