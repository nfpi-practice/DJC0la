<?php

class Tag
{
    private string $name;
    private array $attrs;

    public function __construct(string $name, array $attrs = [])
    {
        $this->name = $name;
        $this->attrs = $attrs;
    }

    public function getAttrsStr(): string
    {
        $str = "";
        if (!empty($this->attrs)) {
            foreach ($this->attrs as $key => $value) {
                $str .= " $key='$value'";
            }
        }
        return $str;
    }

    public function open(): string
    {
        return "<$this->name{$this->getAttrsStr()}>";
    }

    public function close(): string
    {
        return "</$this->name>";
    }
}

$tag = new Tag("font", ["color" => "black", "size" => "15"]);
print_r($tag->open() . "hello" . $tag->close());