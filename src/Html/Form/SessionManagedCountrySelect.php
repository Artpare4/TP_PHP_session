<?php

namespace Html\Form;

use Service\Exception\SessionException;
use Service\Session;

class SessionManagedCountrySelect extends CountrySelect
{
    /**
     * @throws SessionException
     */
    public function __construct(string $name, string $firstOption, string $defaultCode)
    {
        parent::__construct($name, $firstOption, $defaultCode);
        $session = new Session();
        $session->start();
        $this->setSelectedCodeFromSession();
        $this->setSelectedCodeFromRequest();
        $this->saveSelectedCodeIntoSession();
    }

    public function saveSelectedCodeIntoSession(): void
    {
        if (isset($_SESSION)) {
            $_SESSION[$this->getName()] = $this->getSelectedCode();
        }
    }

    public function setSelectedCodeFromSession(): void
    {
        if (isset($_SESSION)) {
            $this->setSelectedCode($_SESSION[$this->getName()]);
        }
    }
}
