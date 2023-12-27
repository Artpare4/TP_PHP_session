<?php

declare(strict_types=1);

use Html\AppWebPage;
use Html\Form\SessionManagedCountrySelect;

$webPage = new AppWebPage('Country selector');

$select = new SessionManagedCountrySelect('country', 'Pays', 'fr');


$webPage->appendContent(
    <<<HTML
    <form class="country-selector">
        {$select->toHtml()}
        <input type="submit" value="Choisir">
        
    </form>
    HTML
);

echo $webPage->toHTML();

## {$webPage->appendContent('<pre>'.print_r($_SESSION, true).'</pre>')}
## Pour voir la tableau des données de session