Mi az a QR-kód?

A QR-kód (Quick Response Code) egy kétdimenziós vonalkód, amely fekete és fehér kis négyzetekből áll. A hagyományos, egyirányú vonalkóddal ellentétben a QR-kód sokkal több információt képes tárolni, és bármilyen irányból beolvasható. A QR-kódba többféle adat írható: szöveg, URL cím, telefonszám, WiFi adatok, névjegykártya (vCard) és egyéb információk.

A QR-kód több szerkezeti részből áll, amelyek mindegyike fontos szerepet játszik abban, hogy a kód gyorsan, pontosan és megbízhatóan olvasható legyen – még akkor is, ha részben sérült.

------------------------------------------------------------
1. Finder pattern – három nagy négyzet a sarkokban
------------------------------------------------------------

A QR-kód bal felső, jobb felső és bal alsó sarkában három nagy fekete-fehér négyzet található. Ezek a minták segítik a telefon vagy a szkenner számára a QR-kód helyének beazonosítását, a forgatás irányának meghatározását és a perspektíva javítását. Ennek köszönhetően a QR-kód bármilyen szögből vagy elforgatva is könnyen olvasható.

------------------------------------------------------------
2. Alignment pattern – kisebb igazító négyzetek
------------------------------------------------------------

A QR-kód belsejében kisebb négyzetek is találhatók, ezeket alignment patternnek nevezzük. Ezek elsősorban nagyobb QR-kódoknál jelennek meg, és az igazítást, torzulásjavítást szolgálják. Segítik a helyes beolvasást akkor is, ha a kód görbült felületre van nyomtatva vagy ferdén fényképezték.

------------------------------------------------------------
3. Timing pattern – fekete-fehér pontokból álló vonalak
------------------------------------------------------------

A finder minták között két vonal található: egy vízszintes és egy függőleges, amelyek fekete és fehér modulok váltakozásából állnak. Ezeket timing patternnek nevezik.

Szerepük:
- a QR-kód rácsszerkezetének meghatározása,
- a sorok és oszlopok pontos beolvasása.

A szkenner ezeket használja a méret és a pozíció meghatározására.

------------------------------------------------------------
4. Quiet zone – üres, fehér margó a QR-kód körül
------------------------------------------------------------

A QR-kódot minden oldalról egy üres, fehér zóna veszi körül, ezt quiet zone-nak nevezzük. Általában legalább 4 modul széles. Nagyon fontos, mert elválasztja a QR-kódot a háttértől. Quiet zone nélkül a szkenner nem tudná megbízhatóan felismerni a kód határait.

------------------------------------------------------------
5. Data area – a kód adatterülete
------------------------------------------------------------

A QR-kód központi része sok apró fekete és fehér négyzetből áll, ezek az adatterületet (data area) alkotják. Minden modul vagy fekete (1 bit), vagy fehér (0 bit). Az ide kerülő adatok először bináris formára vannak alakítva, majd hibatűrési adatokkal kiegészítve elosztásra kerülnek a QR rácsban.

Itt tárolódnak az adatok:
- szöveg,
- URL,
- telefonszám,
- WiFi konfiguráció,
- névjegykártya adatok stb.

------------------------------------------------------------
6. Error correction – hibajavító rendszer
------------------------------------------------------------

A QR-kód beépített hibajavító rendszert használ (Reed–Solomon error correction). Ez lehetővé teszi, hogy a kód akkor is beolvasható legyen, ha részben sérült, karcos, koszos vagy egy logó takarja el.

Négy hibatűrési szint létezik: L, M, Q, H.
Minél magasabb a szint, annál jobban tűri a sérülést a QR-kód.

