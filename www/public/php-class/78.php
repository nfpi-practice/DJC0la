<?php
require_once "class.php";

class Select extends Tag
{
    public array $elements = [];

    public function __construct()
    {
        parent::__construct("select");
    }

    public function add(Option $option): self
    {
        $this->elements[] = $option;
        parent::setText($this->getText() . $option);
        return $this;
    }

    public function open(): string
    {
        $attrName = $this->getAttr("name");
        if ($attrName) {
            if (isset($_REQUEST[$attrName])) {
                foreach ($this->elements as $element) {
                    $element->removeAttr("selected");
                    if ($element->getText() === $_REQUEST[$attrName]) {
                        $element->setSelected();
                    }
                }
            }
            $this->setText(implode('', $this->elements));
        }
        return parent::open();
    }
}

class Option extends Tag
{
    public function __construct()
    {
        parent::__construct("option");
    }

    public function __toString(): string
    {
        return $this->show();
    }

    public function setSelected(): self
    {
        $this->setAttr("selected");
        return $this;
    }
}

$form = (new Form)->setAttrs([
    'action' => '',
    'method' => 'GET'
]);

echo $form->open();
echo (new Select)->setAttr('name', 'list')
    ->add((new Option())->setText('item1'))
    ->add((new Option())->setText('item2'))
    ->add((new Option())->setText('item3'))
    ->show();
echo (new Select)->setAttr('name', 'list2')
    ->add((new Option())->setText('item1'))
    ->add((new Option())->setText('item2'))
    ->add((new Option())->setText('item3'))
    ->show();
echo new Submit;
echo $form->close();