<?php
class Tag
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function open(): string
    {
        return "<$this->name>";
    }

    public function close(): string
    {
        return "</$this->name>";
    }
}

$img = new Tag("img");
$header = new Tag("header");
print_r($img->open() . $img->close());
print_r($header->open() . "header сайта" . $header->close());