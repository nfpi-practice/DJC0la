<?php
require_once "67.php";

class Form extends Tag
{
    public function __construct()
    {
        parent::__construct('form');
    }
}

class Input extends Tag
{
    public function __construct()
    {
        parent::__construct('input');
    }

    public function open(): string
    {
        $inputName = $this->getAttr('name');
        if ($inputName) {
            if (isset($_REQUEST[$inputName])) {
                $value = $_REQUEST[$inputName];
                $this->setAttr('value', $value);
            }
        }
        return parent::open();
    }

    public function __toString(): string
    {
        return $this->open();
    }
}

class Submit extends Input
{
    public function __construct()
    {
        parent::__construct();
        $this->setAttr("type", "submit");
    }
}

$form = (new Form)->setAttrs(['action' => 'test.php', 'method' => 'GET']);

echo $form->open();
echo (new Input)->setAttr('name', 'year');
echo new Submit;
echo $form->close();