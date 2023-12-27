<?php

namespace Entity\Collection;

use Database\MyPdo;
use Entity\Country;

class CountryCollection
{
    public function findAll(): array
    {
        $request = MyPdo::getInstance()->prepare(<<<SQL
        SELECT id,code,name FROM country ORDER BY name;
SQL);
        $request->execute();

        return $request->fetchAll(\PDO::FETCH_CLASS, Country::class);
    }
}
