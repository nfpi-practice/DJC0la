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

$form = (new Form)->setAttrs(['action' => '', 'method' => 'GET']);

echo $form->open();
echo (new Input)->setAttr('name', 'input1');
echo (new Input)->setAttr('name', 'input2');
echo (new Input)->setAttr('name', 'input3');
echo (new Input)->setAttr('name', 'input4');
echo (new Input)->setAttr('name', 'input5');
echo (new Input)->setAttr('type', 'submit');
echo $form->close();

if (!empty($_REQUEST)) {
    $sum = (int)$_REQUEST["input1"] +
        (int)$_REQUEST["input2"] +
        (int)$_REQUEST["input3"] +
        (int)$_REQUEST["input4"] +
        (int)$_REQUEST["input5"];
} else {
    $sum = 0;
}

print_r("<br>Numbers sum: " . $sum);