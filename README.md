# Laravel automatizált tesztelés bemutató projekt

## Óraterv

### Unit Test

- Készítsünk egy új projektet a teszteléshez

  - A konzolban hajtsuk végre az alábbi utasítást:

    ```bash
    composer create-project laravel/laravel automatizalt-teszteles
    ```

  - vagy ha már ki volt adva az alábbi utasítás

    ```bash
    composer global require laravel/installer
    ```

  - akkor

    ```bash
    laravel new automatizalt-teszteles
    ```

- Készítsünk egy új php fájlt Sor.php néven az app mappán belül

  - [A fájl tartalma](app/Sor.php)
- Készítsünk egy új unit testet az elkészült osztályhoz

  - Adjuk ki az alábbi utasítást (Beszéljünk unit vs feature tesztről és a [phpunit.xml](phpunit.xml) tartarmáról)

    ```bash
    php artisan make:test SorTest --unit
    ```

  - Készítsük el a szükséges [teszt fájlt](tests/Unit/SorTest.php) legyen hibára futó teszteset is az elején
  - Adjuk ki az alábbi utasítást az alkalmazás teszteléséhez (A coverage kapcsolóhoz módosítani kell a php.ini fájlt, xdebug.mode -hoz coverage-t hozzá kell adni)

    ```bash
    php artisan test --coverage
    ```

### Feature Test

- Készítsünk el egy alapvető navigációval rendelkező oldalt legalább 2 [viewwal](resources/views) és [útvonalak](routes/web.php) definiálásával.
- Az elkészült oldalhoz készítsünk Feature tesztet [RoutingTest](tests/Feature/RoutingTest.php) néven az alábbi utasítást kiadva

    ```bash
    php artisan make:test RoutingTest
    ```

- Módosítsuk a [phpunit.xml](phpunit.xml)-el belül a coverage részt, hogy a web útvonalainkat és a Sor.php-t vegye csak figyelembe a lefedetség.

### Dusk

- Teszteljük a navigációt is, amihez szükség lesz a [Dusk](https://github.com/laravel/dusk) Laravel könyvtárra. Telepítsük a könyvtárt majd hozzunk létre egy [Teszt osztályt](tests/Browser/NavigacioTest.php) a navigáció teszteléséhez az alábbi utasítások kiadásával

    ```bash
    composer require --dev laravel/dusk
    php artisan dusk:install
    php artisan dusk:make NavigacioTest
    ```

- Próbáljuk lefuttatni az elkészült teszteket az alábbi utasítás kiadásával

    ```bash
    php artisan dusk
    ```

- A futás hibára fog futni ugyanis a dusk böngészben próbálja megnyitni az oldalt egy .env.dusk.local nevű fájl alapján. Ha ezt a fájlt nem találja akkor az alapértelmezett .env alapján fogja megnyitni az oldalt. A teszteléshez indítsuk el a fejlesztői szervert egy külön terminál ablakban.

    ```bash
    php artisan serve
    ```

- Folytassuk a teszt osztály készítését egy olyan tesztesettel ami hibára fut. A hibás tesztesetről készült képernyőképek megtekinthetőek a teszt mellett található [screenshots](tests/Browser/screenshots) mappában

### Model test

- Készítsünk egy új modelt Article névvel, migrációval, factoryval és seederrel az alábbi parancs kiadásával:

    ```bash
    php artisan make:model Article -mfs
    ```

- Hozzunk létre egy feature tesztet a modelt teszteléséhez ArticleTest néven

    ```bash
    php artisan make:test ArticleTest
    ```

- Készítsük el és futtassuk le a [migrációt](database/migrations/2022_02_22_123111_create_articles_table.php)

    ```bash
    php artisan migrate
    ```

- Készítsük el az első tesztesetünket az [ArticleTest](tests/Feature/ArticleTest.php) állományból.
  
  - [Konfiguráljunk](phpunit.xml) külön tesztkörnyezetet csak az ArticleTest futtatásához, állítsuk át, hogy a lefedettség csak azon php fileokat vizsgálja a database és app mappákból, ami Article szóval kezdődik.
  - Az elkészített tesztet futtassuk is.

    ```bash
    php artisan test --coverage --testsuite=Article
    ```

    - A tesztesetnek hibára kell futnia hiszen a factorynak még nincs tartalma.
  - Készítsük el az [ArticleFactory-t](database/factories/ArticleFactory.php)
    - Futtassuk az előző parancsot, ezúttal sikeres kimenettel.
  - Készítsük el a második tesztesetünket is, majd futtassuk le.
    - Ismét hibára fog futni, hiszen nem volt még seeder létrehozva.
  - Egészítsük ki a [ArticleSeeder](database/seeders/ArticleSeeder.php) és a [DatabaseSeeder](database/seeders/DatabaseSeeder.php) állományokat a szükséges sorokkal.
    - Futassuk újbol a tesztet.
    - Vegyük észre, hogy a teszt továbbra is hibára fut, és az adatbázisban a rekordok száma minden teszteléssel tovább nő.
    - A konfigurációs fájlban állítsuk be, hogy az adatbázis memóriában tárolt sqlite adatbázis legyen. A teszt továbbra is hibára fut így vonjuk vissza a beállítást.
    - Vegyük használatba a RefreshDatabase névteret a tesztesetünkben, majd futassuk újra a tesztet.
      - A teszt ezúttal nem fog hibára futni, viszont az adatbázisunk kiürül.
      - Az előző észrevételeink alapján kombináljuk a kettőt: RefreshDatabase és memóriában tárolt sqlite adatbázissal futassuk a teszteket.
    - Készítsük el az utolsó tesztesetünket. Ehhez a [modelben](app/Models/Article.php) létre kell hoznunk egy új függvényt.
    - Futtassuk újra a tesztesetünket.
      - Debuggerrel nézzük meg, hogy mi történik a teszt futása alatt.
