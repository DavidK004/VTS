
## non return to zero

## **return to zero (bolje od non return to zero)**

    zbog mnogo nula za redom se može izgubiti sinhronizacija

    rešava se "ubacivanjem" jedne jedinice nakon 5 uzastopnih nula

## non return to  zero inverted

1 menja stanje, 0 ne menja stanje

isti problem sa mnogo 0 i isto rešenje za to

## alternate mark inversion

1 menja između +V i -V a nula stavlja na 0

## HDB3 (ne ide na kolokvijum)

## phase encode (Manchester)

laka sinhronizacija

komponenta jednosmernog napona je nula

zahteva dva puta veći opseg id jednostavnog binarnog kodovanja

1 je + na - (može i obrnuto)

0 je - na + (može i obrnuto)

## *metode kodovanja očekivanja: (slajd)

# Bežične mreže

## podela:

kratke 

srednje 

velike


## bluetooth

koristi FHSS-t (frequency hop spread spectrum)

teško je prisluškivati jer se stalno menja frekvencija

kodovanje i autentikacija

## wifi

OFDM (orthological frequency division multiplex)

modifikacija FDM-a

ortogonalno je da smetnja bude najmanja moguća

# preskočili smo prezentaciju br. 3 i idemo na prezentaciju br. 4

# Ethernet

definisan je u prva dva sloja OSI-ja

full duplex ethernet (pre je koristio CSMA/CD-t) csma se ne koristi zbog switch-eva

## sastoji se iz dva podsloja

### LLC (logical link control) gornji

održava vezu sa višim slojem

uokviruje pakete sloja mreže

vrši identifikaciju mrežnog protokola

relativno je nezavisan od fizičkog sloja

softver

### MAC (media access control) donji

enkapsulacija podataka (sinhronizacioni bitovi, mac adrese, detekcija greške (crc)

Kontrola pristupa medijumu

hardver

## fomat eternet okvira

Ehernet II je najrasprostranjeniji tip (defacto standrard)

za sve tipova min i max dužina frame-a je ista (64B - 1518B) ne računajući sinhronizacione bitove

fizički sloj stavlja pauzu između

23maj.png (destination i source address su mac adrese)

ethernet II vs ieee 802.3 (802.2 header)

mac header i llc header (ieee)

ii nema llc header jer ima type

ieee ima length umesto type

ii nema length (može pronaći dužinu sa brojem bitova)

collision domain

## mac adresa 

48 bita

prva 24 (6 hex cifara bita pripadaju proizvođaču)

## ** skip 22 - 35

## usluge llc

tri mogućnosti usluge:

    nepouzdan datagram

    datagram sa potvrdom

    servis na bazi konekcije

llc zaglavlje sadrži 3 polja: 

## ARP (bitno)

u ethernet postoji source mac i destination mac

pc pošalje broadcast pitanja  (ko je na xx ip adresi, treba mi njegova mac adresa)
