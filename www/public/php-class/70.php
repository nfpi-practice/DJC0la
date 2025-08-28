<?php
require_once "67.php";

class ListItem extends Tag
{
    public function __construct()
    {
        parent::__construct('li');
    }

    public function __toString(): string
    {
        return $this->show();
    }
}

class HtmlList extends Tag
{
    private array $items = [];

    public function __toString(): string
    {
        return $this->show();
    }

    public function addItem(ListItem $li): self
    {
        $this->items[] = $li;
        return $this;
    }

    public function show(): string
    {
        $str = $this->open();
        foreach ($this->items as $item) {
            $str .= $item;
        }
        $str .= $this->close();
        return $str;
    }
}

class Ul extends HtmlList
{
    public function __construct()
    {
        parent::__construct('ul');
    }
}

class Ol extends HtmlList
{
    public function __construct()
    {
        parent::__construct('ol');
    }
}

$list = new Ul();

echo $list->setAttr('class', 'a')
    ->addItem((new ListItem())->setText('item1')->setAttr('class', 'first'))
    ->addItem((new ListItem())->setText('item2'))
    ->addItem((new ListItem())->setText('item3'));

$list = new Ol();

echo $list->setAttr('class', 'a')
    ->addItem((new ListItem())->setText('item1')->setAttr('class', 'first'))
    ->addItem((new ListItem())->setText('item2'))
    ->addItem((new ListItem())->setText('item3'));