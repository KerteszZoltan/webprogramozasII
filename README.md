# Webprogramozás 2 Beadandó feladat
## Használt programok:
Visual Studio Code
WAMPServer64
## Funkciók

A weboldal Bejelentkezés / Regisztráció után használható. A weboldal arra szolgál, hogy a felhasználó a teendőit kezelje, napló bejegyzéseket írjon. Lehetőség van mind a teendőt, naplót és a felhasználó adatait kilistázni, hozzáadni, módosítani, törölni. Amit törlésnek hívunk a teendőknél igazából egy elrejtés, ami azt jelenti, hogy amikor a felhasználó "törli" a teendőjét az továbbra láthatatlanná válik, de az adatbázisban bennemarad. A felhasználónak lehetősége van a képeit feltölteni a szerverre és megnézni, törölni.

Az oldalon található továbbá egy szorzótábla ahol lehetőség van egy számot megszorozni annyiszor, ahányszor a felhasználó azt szeretné. Ha a felhasználó nem adja meg, hogy hányszor szorozza meg a számot alapértelmezetten 10x fogja elvégezni a szorzást a program. 

A felhasználók egymás napló bejegyzéseire, teendőire, képeire, felhasználói adatokra nem látnak rá.
A jelszót MD5-ös titkosítással tárolja a rendszer.

## Szerver jellemzők
WAMP64 Local server (3.2.0)
  - Mysql version: 8.0
  - PHP version: 7.3
  - Apache version: 2.4

## Adatbázis
MYSQL port: 3308
Felhasználónév: root
Jelszó: 
Adatbázis név: Beadando
Táblák: Felhasznalok, Todos, Kepek, Kategoriak, Bejegyzesek

Tábla szerkezet: 

|Tábla|Mező név|Tulajdonságok|
|------------|--------|------------------------|
|Felhasznalok||UTF8_hungarian_ci|
||FID|id, int, auto_increment|
||Fnev|text, not_null|
||Fjelszo|text, not_null|
||||
|Todos| |UTF8_hungarian_ci|
||TID|id, int, auto_increment|
||FID|Felhasznalok.FID|
||Tleiras|text, not_null|
||TActive|int, not_null|
||||
|Kepek| | |
||KID|id, int, auto_increment|
||FID|int, auto_increment|
||kep|varchar(255), not_null|
||||
|Kategoriak| |UTF8_hungarian_ci|
||KID|id, int, auto_increment|
||Knev|varchar(255), not_null|
||||
|Bejegyzesek| |UTF8_hungarian_ci|
||BID|id, int, auto_increment|
||FID|int, not_null|
||Btema|varchar(255), not_null|
||Bejegyzes|TEXT, not_null|
||Bletrehozas|TEXT, not_null|
||Bmodositas|TEXT, not_null|

## Megvalósított modulok
- Bejelentkezés/Regisztráció
  - Profil létrehozás
- Szorzótábla
- Teendők
  -  módosítása, törlése
- Kategória
  - Kiírása, törlése, frissítése
- Napló bejegyzések
  - Hozzáadása, kiírása, módosítása, törlése
- Képek
  - Feltöltése, tárolása, törlése az adatbázisból
- Profil
  - Adatok kiírása, módosítása, profil törlése

## Tesztek
Következő böngészőkben tesztelve:
- Oprea
- Firefox
- Google Chrome

## Önellenőrzés
#### Elvárás
1. Adatbázis + Backend + Frontend
      1.1.  Adatbázis: relációs adatbázisban (MySQL) --> kész <br>
      1.2. Backend: PHP szkript --> kész <br>
      1.3. Frontend: HTML + CSS --> kész <br>
2. Legalább 5 tábla szerepeljen az adatbázisban, amelyeken a CRUD műveletek implementálva vannak, mind backend, mind frontend szintjén. --> Bizonytalan*
3. Fájlfelöltés és kezelés funkcióját is el kell végezni.  --> kész

*-Indoklás: Mivel 4 táblán vannak implementálva a CRUD műveletek. A Képek táblához csak hozzáadni, illetve törölni lehet.

