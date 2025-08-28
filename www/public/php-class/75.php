<?php
require_once "class.php";

class Hidden extends Input
{
    public function __construct()
    {
        $this->setAttr('type', 'hidden');
        parent::__construct();
    }
}

echo new Hidden;

echo (new Hidden)->setAttr('name', 'id');

$form = (new Form)->setAttrs([
    'action' => 'test.php',
    'method' => 'GET'
]);

echo $form->open();
echo (new Hidden)->setAttr('name', 'id')->setAttr('value', '2003');
echo (new Input)->setAttr('name', 'year');
echo new Submit;
echo $form->close();