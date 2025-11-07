# mrežni uređaji
## Ripiter
## Koncentrator(hub)
## Most(bridge)
brigde i switch rade skoro isto
rade u link layer (sloj  veze)
raspolažu tabelama o mac adresama (port i MAC adresa)
određuje na kom portu je koji uređaj povezan (šta je na portu 1, 2, 3...)
### switch uči mac adrese (na kojim su portovima)
kada npr računar pošalje paket u frame-u je mac adresa pošaljioca i primaoca
switch prema pošiljaocu odredi na kom port je  računar koji šalje podatak
switch gleda adresu primaoca i onda šalje svima paket 
povremeno izbriše i gradi novu tabelu
u link layer je (sloj veze)
SAT ili MAC tabela (swithch raspolaže njome)
switch sam podržava tabelu portova i mac adresa učenjem
switch deli mrežu na koalizione domene
svaki interfejs je sada kolizioni domen (collision domain)
mac adresa je fizička adresa računara (fabrički upisana)

redundansa (rezervni mostovi/swirchevi)
petlja
STP spanning tree protocol 

baferi

## ruter(router)
radi u sloju mreže (3. sloj)
ima tabelu na osnovu koje određuje gde ide paket (ip tabela)
donosi odluku u sloju mreže na osnovu ip adrese
softver za usmeravanje (routing software)

## mrežni prolaz(gateway)
na najvišim slojevima (layers)

# fizički sloj
najniži sloj u osi modelu
neodvojan je od link layera


## najznačajnije karakteristike kanala
### šum
odnos signal i šuma (signal to noise ratio S/N)

### širina kanala (koliko bitova može da prođe u sekundi)
propusna moć u hz se meri


### šema kodovanja
0 je -12V a 1 je 12V (nije uvek isto)
može i više bitova (00 01 10 11; 000 001...)

shannon:
maksimalna brzina podataka = H log2 (1 + S/N) [b/s]


nyquist teorema:
ako signal ima V različitih dikretnih  nivoa
maksimalna brzina podataka = 2Hlog2V [b/s]



