<?php
require_once '67.php';

class Image extends Tag
{
    public function __construct()
    {
        $this->setAttr("src", "")->setAttr("alt", "");
        parent::__construct("img");
    }
    public function __toString()
    {
        return parent::open();
    }
}

echo (new Image())->setAttr('src', 'img/img.jpeg')->setAttrs(["width" => 200, "height" => 100]);