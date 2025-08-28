<?php

class Tag
{
    private string $name;
    private string $text;
    private array $attrs = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function getAttrs(): array
    {
        return $this->attrs;
    }

    public function getAttr(string $attr): ?string
    {
        return $this->attrs[$attr] ?? null;
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

$tag = new Tag("font");
$tag->setText("hello world");
$tag->setAttrs(["id" => "hello", "class" => "world"]);
print_r("Tag name: " . $tag->getName() . "<br>Tag text: " . $tag->getText() . "<br>Tag Attrs: " . implode(", ", $tag->getAttrs()) .
    "<br>Tag class by ID: " . $tag->getAttr("id"));