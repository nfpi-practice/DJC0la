<?php

class Tag
{
    private string $name;
    private array $attrs = [];

    public function __construct(string $name)
    {
        $this->name = $name;
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

    public function setAttrs(string $attr, string $value): self
    {
        $this->attrs[$attr] = $value;
        return $this;
    }

    public function open(): string
    {
        return "<$this->name{$this->getAttrsStr()}>";
    }

    public function close(): string
    {
        return "</$this->name>";
    }

    public function removeAttr(string $attr): self
    {
        unset($this->attrs[$attr]);
        return $this;
    }
}

$tag = new Tag("font");
print_r($tag->setAttrs("size", "10px")->setAttrs("color", "green")
        ->setAttrs("id", "fontId")->removeAttr("id")
        ->open() . "HELLO" . $tag->close());