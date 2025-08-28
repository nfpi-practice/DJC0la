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

    public function setAttr(string $attr, string $value): self
    {
        $this->attrs[$attr] = $value;
        return $this;
    }

    public function setAttrs(array $attrs): self
    {
        foreach ($attrs as $key => $value) {
            $this->setAttr($key, $value);
        }
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
print_r($tag->setAttrs(["size" => "10px", "color" => "green"])
        ->setAttr("id", "fontId")->removeAttr("id")
        ->open() . "hello" . $tag->close());