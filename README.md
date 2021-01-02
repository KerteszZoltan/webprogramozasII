# Webprogramozás 2 Beadandó feladat
### Használt programok:
Visual Studio Code
WAMPServer64
### Funkciók

A weboldal Bejelentkezés / Regisztráció után használható. A weboldal arra szolgál, hogy a felhasználó a teendőit kezelje. Lehetőség van teendőt kilistázni, hozzáadni, módosítani, törölni. Amit törlésnek hívunk igazából egy elrejtés, ami azt jelenti, hogy amikor a felhasználó "törli" a teendőjét az továbbra láthatatlanná válik, de az adatbázisban bennemarad.

Az oldalnak vannak olyan további funkciói, mint például egy szorzótábla és egy Lottózó.

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

### Adatbázissal megvalósítani kívánt műveletek:
| Művelet | Megvalósult-e |
|---------|----------|
|Regisztráció |
|Írás |
|Olvasás |
|Módosítás |
|Törlés |

Jelzések: 
Sikeres - Y
Sikertelen - N

### Tesztek
Következő böngészőkben tesztelve:
- Oprea
- Firefox
- Google Chrome



