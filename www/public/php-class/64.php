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
                if ($value === true) {
                    $str .= " $key";
                } else {
                    $str .= " $key='$value'";
                }
            }
        }
        return $str;
    }

    public function setAttr(string $attr, mixed $value): self
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

print_r((new Tag("input"))->setAttr("name", "name1")->open());
print_r((new Tag("input"))->setAttr("name", "name2")->open());