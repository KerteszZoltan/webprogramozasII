# Webprogramozás 2 Beadandó feladat
### Használt programok:
Visual Studio Code
WAMPServer64
### Funkciók

A weboldal Bejelentkezés / Regisztráció után használható. A weboldal arra szolgál, hogy a felhasználó a teendőit kezelje, napló bejegyzéseket írjon. Lehetőség van mind a teendőt, naplót és a felhasználó adatait kilistázni, hozzáadni, módosítani, törölni. Amit törlésnek hívunk a teendőknél igazából egy elrejtés, ami azt jelenti, hogy amikor a felhasználó "törli" a teendőjét az továbbra láthatatlanná válik, de az adatbázisban bennemarad. A felhasználónak lehetősége van a képeit feltölteni a szerverre és megnézni, törölni.

Az oldalnak vannak olyan további funkciói, mint például egy szorzótábla.

### Szerver jellemzők
Sql Server: Mysql

### Adatbázis
MYSQL port: 3308
Felhasználónév: root
Jelszó: 
Adatbázis név: Beadando
Táblák: Felhasznalok, Todos

Tábla szerkezet: 

|Tábla|Mező név|Tulajdonságok|
|------------|--------|------------------------|
|Felhasznalok||UTF8_hungarian_ci|
||FID|id, int, auto_increment
||Fnev|text, not_null
||Fjelszo|text, not_null
|
|Todos| |UTF8_hungarian_ci|
||TID|id, int, auto_increment
||FID|Felhasznalok.FID
||Tleiras|text, not_null
||TActive|int, not_null
|
|Kepek| | |
||KID|id, int, auto_increment
||FID|int, auto_increment
||kep|varchar(255), not_null
|
|Kategoriak| |UTF8_hungarian_ci|
|
||KID|id, int, auto_increment
||Knev|varchar(255), not_null
|
|Bejegyzesek| |UTF8_hungarian_ci|
||BID|id, int, auto_increment
||FID|int, not_null
||Btema|varchar(255), not_null
||Bejegyzes|TEXT, not_null
||Bletrehozas|TEXT, not_null
||Bmodositas|TEXT, not_null

### Megvalósított modulok
- Bejelentkezés/Regisztráció
  - Profil létrehozás
- Szorzótábla
- Teendők
  -  módosítása, törlése
- Kategória
  - Kiírása
- Napló bejegyzések
  - Hozzáadása, kiírása, módosítása, törlése
- Képek
  - Feltöltése, tárolása, törlése
- Profil
  - Adatok kiírása, módosítása, profil törlése

### Tesztek
Következő böngészőkben tesztelve:
- Oprea
- Firefox
- Google Chrome



