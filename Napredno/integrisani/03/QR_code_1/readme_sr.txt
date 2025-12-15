Šta je QR kod?

QR kod (Quick Response code) je dvodimenzionalni barkod sastavljen od crnih i belih kvadratića. Za razliku od običnog barkoda, QR kod može da se čita iz bilo kog ugla i može da sadrži mnogo više informacija. U QR kod se mogu upisivati: tekst, URL adrese, brojevi telefona, WiFi podaci, kontakt informacije (vCard) i mnogo toga drugog.

QR kod se sastoji od više strukturalnih delova. Svaki deo ima specifičnu ulogu i omogućava da se kod brzo, tačno i pouzdano skenira čak i kada je delimično oštećen.

------------------------------------------------------------
1. Finder pattern – velika kvadratna polja u tri ugla
------------------------------------------------------------

U gornjem levom, gornjem desnom i donjem levom uglu QR koda nalaze se tri velika crno-bela kvadrata. Oni služe kao orijentiri i pomažu mobilnom telefonu ili skeneru da pronađe QR kod u slici, odredi njegov položaj i ispravi rotaciju. Zahvaljujući njima QR kod može da se skenira čak i kada je okrenut, nagnut ili fotografisan pod uglom.

------------------------------------------------------------
2. Alignment pattern – manji kvadrati unutar QR koda
------------------------------------------------------------

Ovo su manji kvadrati koji služe da se QR kod pravilno poravna, posebno kod većih dimenzija QR koda. Oni pomažu da se isprave deformacije, kao što su savijanje, zakrivljenje ili fotografisanje pod uglom. Manji QR kodovi imaju jedan alignment pattern, a veći više njih.

------------------------------------------------------------
3. Timing pattern – linije crno-belih tačkica
------------------------------------------------------------

To su dve linije malih kvadratića: jedna horizontalna i jedna vertikalna, koje povezuju finder pattern elemente. One pomažu skeneru da prepozna veličinu mreže i pravilno odredi redove i kolone QR koda. Zahvaljujući ovim linijama skener može da pročita QR kod čak i kada je slika loša ili zamućena.

------------------------------------------------------------
4. Quiet zone – prazna bela margina oko QR koda
------------------------------------------------------------

Quiet zone je prazan beli prostor oko QR koda. On obično ima širinu od najmanje 4 modula. Ovaj prostor je veoma važan, jer odvaja QR kod od pozadine. Bez quiet zone, skener ne bi mogao da razlikuje QR kod od ostalih elemenata slike.

------------------------------------------------------------
5. Data area – deo QR koda koji sadrži informacije
------------------------------------------------------------

Data area predstavlja mrežu sitnih crnih i belih kvadratića koji sadrže stvarne podatke. Svaki kvadrat je ili crn (bit 1) ili beo (bit 0). Podaci koji se upisuju u QR kod najpre se pretvaraju u binarni zapis, zatim se dodaje zaštita za ispravljanje grešaka, a zatim se ti bitovi raspoređuju u QR matricu.

U data area delu se nalaze podaci kao što su tekst, URL, broj telefona, kontakt informacije, WiFi podešavanja i slično.

------------------------------------------------------------
6. Error correction – zaštita od oštećenja
------------------------------------------------------------

QR kod sadrži sistem za ispravljanje grešaka (Reed–Solomon error correction). Zahvaljujući tome, QR kod može da se pročita čak i kada je delimično oštećen, izgreban, zamazan ili kada je u sredinu postavljen logo. Postoje četiri nivoa zaštite: L, M, Q i H. Što je nivo veći, to QR kod može da podnese više oštećenja.


