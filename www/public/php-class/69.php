<?php
require_once "67.php";

class Link extends Tag
{
    const ACTIVE_ATTR = 'active';

    public function __construct()
    {
        parent::__construct("a");
        $this->setAttr("href", "");
    }

    public function open(): string
    {
        $this->activateSelf();
        return parent::open();
    }

    private function activateSelf(): void
    {
        if ($this->getAttr('href') === $_SERVER['REQUEST_URI']) {
            $this->addClass(self::ACTIVE_ATTR);
        }
    }
}

echo (new Link)
    ->setAttr('href', 'menu.php')
    ->setAttr('class', 'link1 link2')
    ->setText('index')
    ->show();