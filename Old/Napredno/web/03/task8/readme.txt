moj password za bazu je root i username je root pa sam to promenio u config.php
index.php
    deklarisali smo striktne tipove
    uključimo config i functions fajlove kako bi ih mogli koristiti ovde
    uzmemo sve podatke iz baze podataka uz pomoć getData funkcije da bismo mogli kasnije ispisati sve podatke
    obični "boiler plate" html i nekoliko stilova za ulepšavanje tabele
    otvaramo formu koja šalje svoje podatke na process.php post metodom
    nakon forme imamo ispis svih podataka iz tabele gde pomoću foreach ispisujemo svaki red posebno, a ako nemamo podataka to nam i ispiše

config.php
    osnovni config za bazu podataka

functions.php
    funkcije za bazu podataka dobijene u zadatku malo promenjene jer je dodat globalni pdo za lakši development
    funkcija processText prvo čuva original, pa izbacimo prazne karaktere uz pomoć trim explode filter i implode, nakon toga sa str replace zamenimo a i A sa @, sa ucwords stavimo veliko početno slovo na svaku reč, skraćujemo text na 100 karaktera ako ima više uz pomoć mb strlen i mb substr i na kraju vraćamo niz sa originalnim textom editovanim textom i dužinom editovanog texta
    
process.php
    uzimamo text iz POST-a (ako postoji)
    šaljemo text u bazu podataka 
    ispisujemmo to što smo poslali u bazu
    link ka index stranici