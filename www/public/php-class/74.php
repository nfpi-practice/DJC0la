<?php
require_once "class.php";

class Password extends Input
{
    public function __construct()
    {
        $this->setAttr("type", "password");
        parent::__construct();
    }
}

echo new Password;

echo (new Password)->setAttr('name', 'passw');

$form = (new Form)->setAttrs([
    'action' => 'test.php',
    'method' => 'GET'
]);

echo $form->open();
echo (new Input)->setAttr('name', 'login');
echo (new Password)->setAttr('name', 'passw');
echo new Submit;
echo $form->close();