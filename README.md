# Laravel automatizált tesztelés bemutató projekt

## Óraterv

- Készítsünk egy új projektet a teszteléshez

  - A konzolban hajtsuk végre az alábbi utasítást:

        composer create-project laravel/laravel automatizalt-teszteles
  - vagy ha már ki volt adva az alábbi utasítás

        composer global require laravel/installer
  - akkor

        laravel new automatizalt-teszteles

- Készítsünk egy új php fájlt Sor.php néven az app mappán belül
  - [A fájl tartalma](app/Sor.php)
- Készítsünk egy új unit testet az elkészült osztályhoz
  - Adjuk ki az alábbi utasítást (Beszéljünk unit vs feature tesztről és a [phpunit.xml](phpunit.xml) tartarmáról)

        php artisan make:test SorTest --unit
  - Készítsük el a szükséges [teszt fájlt](tests/Unit/SorTest.php) legyen hibára futó teszteset is az elején
  - Adjuk ki az alábbi utasítást az alkalmazás teszteléséhez (A coverage kapcsolóhoz módosítani kell a php.ini fájlt, xdebug.mode -hoz coverage-t hozzá kell adni)

        php artisan test --coverage
- Készítsünk el egy alapvető navigációval rendelkező oldalt legalább 2 [viewwal](resources/views) és [útvonalak](routes/web.php) definiálásával.
- Az elkészült oldalhoz készítsünk Feature tesztet [RoutingTest](tests/Feature/RoutingTest.php) néven az alábbi utasítást kiadva

      php artisan make:test RoutingTest
- Módosítsuk a [phpunit.xml](phpunit.xml)-el belül a coverage részt, hogy a web útvonalainkat és a Sor.php-t vegye csak figyelembe a lefedetség.
- Teszteljük a navigációt is, amihez szükség lesz a [Dusk](https://github.com/laravel/dusk) Laravel könyvtárra. Telepítsük a könyvtárt majd hozzunk létre egy [Teszt osztályt](tests/Browser/NavigacioTest.php) a navigáció teszteléséhez az alábbi utasítások kiadásával

      composer require --dev laravel/dusk
      php artisan dusk:install
      php artisan dusk:make NavigacioTest
- Próbáljuk lefuttatni az elkészült teszteket az alábbi utasítás kiadásával

      php artisan dusk
- A futás hibára fog futni ugyanis a dusk böngészben próbálja megnyitni az oldalt egy .env.dusk.local nevű fájl alapján. Ha ezt a fájlt nem találja akkor az alapértelmezett .env alapján fogja megnyitni az oldalt. A teszteléshez indítsuk el a fejlesztői szervert egy külön terminál ablakban.

      php artisan serve
- Folytassuk a teszt osztály készítését egy olyan tesztesettel ami hibára fut. A hibás tesztesetről készült képernyőképek megtekinthetőek a teszt mellett található [screenshots](tests/Browser/screenshots) mappában
