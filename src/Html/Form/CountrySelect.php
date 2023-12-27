<?php

namespace Html\Form;

use Entity\Collection\CountryCollection;

class CountrySelect
{
    private string $name;
    private string $firstOption;
    private string $selectedCode;

    public function __construct(string $name, string $firstOption, string $selectedCode)
    {
        $this->name = $name;
        $this->firstOption = $firstOption;
        $this->selectedCode = $selectedCode;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): CountrySelect
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstOption(): string
    {
        return $this->firstOption;
    }

    public function setFirstOption(string $firstOption): CountrySelect
    {
        $this->firstOption = $firstOption;

        return $this;
    }

    public function getSelectedCode(): string
    {
        return $this->selectedCode;
    }

    public function setSelectedCode(string $selectedCode): CountrySelect
    {
        $this->selectedCode = $selectedCode;

        return $this;
    }

    public function toHtml(): string
    {
        $html = <<<HTML
        <label>
        <select name="{$this->name}">
        <option value="">{$this->firstOption}</option>
HTML;
        $listepays = new CountryCollection();
        $liste = $listepays->findAll();
        foreach ($liste as $pays) {
            if ($pays->getCode() == $this->selectedCode) {
                $html .= <<<HTML
            <option value="{$pays->getCode()}" selected>{$pays->getName()}</option>
HTML."\n";
            } else {
                $html .= <<<HTML
            <option value="{$pays->getCode()}">{$pays->getName()}</option>
HTML."\n";
            }
        }
        $html .= <<<HTML
        </select>
        </label>
HTML;

        return $html;
    }

    public function setSelectedCodeFromRequest(): void
    {
        if (isset($_REQUEST[$this->name])) {
            $this->selectedCode = $_REQUEST[$this->name];
        }
    }
}
