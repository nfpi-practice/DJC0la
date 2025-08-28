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

    public function addClass(string $className): self
    {
        if (isset($this->attrs["class"])) {
            $classNames = explode(' ', $this->attrs['class']);
            if (!in_array($className, $classNames)) {
                $classNames[] = $className;
                $this->attrs["class"] = implode(' ', $classNames);
            }
        } else {
            $this->attrs["class"] = $className;
        }
        return $this;
    }

    public function removeClass(string $className): self
    {
        if (isset($this->attrs["class"])) {
            $classNames = $this->removeElem($className, explode(' ', $this->attrs['class']));
            $this->attrs["class"] = implode(' ', $classNames);
        }
        return $this;
    }

    private function removeElem(string $elem, array $arr): array
    {
        $key = array_search($elem, $arr);
        if ($key !== false) {
            unset($arr[$key]);
        }
        return $arr;
    }
}

echo (new Tag('input'))->addClass('a')->open();
echo (new Tag('input'))->addClass('a')->addClass('b')->open();
echo (new Tag('input'))
    ->setAttr('class', 'a b')
    ->addClass('c')->open();
echo (new Tag('input'))
    ->setAttr('class', 'a b')
    ->addClass('a')
    ->open();
echo (new Tag('input'))
    ->addClass('a')
    ->addClass('b')
    ->addClass('a')
    ->open();
echo (new Tag('input'))
    ->setAttr('class', 'a z c')
    ->removeClass('z')
    ->open();