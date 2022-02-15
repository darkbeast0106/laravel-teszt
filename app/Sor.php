<?php
namespace App;

class Sor
{
    /**
     * @var array
     */
    private $items = [];

    /**
     * Létrehoz egy sort a megadott elemekkel
     *
     * @param array $items
     * A sor elemeit tartalmazó tömb. Ha nincs megadva akkor üres sor jön létre.
     */
    public function __construct($items = []) {
        $this->items = $items;
    }

    /**
     * Ellenőrzi, hogy a megadott elem a sorban van-e
     *
     * @param string $item
     * @return bool Igaz, ha az elem benne van a sorban
     */
    public function benneVan($item)
    {
        return in_array($item, $this->items);
    }

    /**
     * Kiveszi az első elemet a sorból
     *
     * @return string|null
     * Az első elem a sorból, ha van elem benne, vagy null ha nincs.
     */
    public function kivesz()
    {
        return array_shift($this->items);
    }

    /**
     * Hozzáad egy új elemet a sor végére
     *
     * @param string $item Az elem ami bekerül a sorba
     */
    public function hozzaad($item)
    {
        array_push($this->items, $item);
    }
}


?>
