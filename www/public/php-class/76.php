<?php
require_once "class.php";

class Textarea extends Tag
{
    public function __construct()
    {
        parent::__construct("textarea");
    }

    public function show(): string
    {
        $attrName = $this->getAttr('name');
        if ($attrName) {
            if (isset($_REQUEST[$attrName])) {
                $this->setText($_REQUEST[$attrName]);
            } else {
                $this->setText("");
            }
        }
        return parent::show();
    }
}

echo (new Textarea)->show();

echo (new Textarea)->setAttr('name', 'text')->show();

echo (new Textarea)
    ->setAttr('name', 'text')
    ->setText('hello')
    ->show();

$form = (new Form)->setAttrs(['action' => '', 'method' => 'GET']);

echo $form->open();
echo (new Input)->setAttr('name', 'user');
echo (new Textarea)->setAttr('name', 'message')->show();
echo new Submit;
echo $form->close();