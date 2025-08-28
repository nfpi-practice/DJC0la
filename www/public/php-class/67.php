<?php

interface iTag
{
    public function getName();
    public function getText();
    public function getAttrs();
    public function getAttr($name);
    public function show();
    public function open();
    public function close();
    public function setText($text);
    public function setAttr($name, $value = true);
    public function setAttrs($attrs);
    public function removeAttr($name);
    public function addClass($className);
    public function removeClass($className);
}

class Tag implements iTag
{
    private string $name;
    private array $attrs = [];
    private string $text = '';

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

    public function getAttrs(): array
    {
        return $this->attrs;
    }

    public function getAttr(string $name): ?string
    {
        return $this->attrs[$name] ?? null;
    }

    public function show(): string
    {
        return $this->open() . $this->text . $this->close();
    }

    public function open(): string
    {
        $name = $this->name;
        $attrsStr = $this->getAttrsStr($this->attrs);
        return "<$name$attrsStr>";
    }

    public function close(): string
    {
        $name = $this->name;
        return "</$name>";
    }

    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    public function setAttr(string $name, mixed $value = true): self
    {
        $this->attrs[$name] = $value;
        return $this;
    }

    public function setAttrs(array $attrs): self
    {
        foreach ($attrs as $name => $value) {
            $this->setAttr($name, $value);
        }
        return $this;
    }

    public function removeAttr(string $name): self
    {
        unset($this->attrs[$name]);
        return $this;
    }

    public function addClass(string $className): self
    {
        if (isset($this->attrs['class'])) {
            $classNames = explode(' ', $this->attrs['class']);
            if (!in_array($className, $classNames)) {
                $classNames[] = $className;
                $this->attrs['class'] = implode(' ', $classNames);
            }
        } else {
            $this->attrs['class'] = $className;
        }
        return $this;
    }

    public function removeClass(string $className): self
    {
        if (isset($this->attrs['class'])) {
            $classNames = explode(' ', $this->attrs['class']);
            if (in_array($className, $classNames)) {
                $classNames = $this->removeElem($className, $classNames);
                $this->attrs['class'] = implode(' ', $classNames);
            }
        }
        return $this;
    }

    private function getAttrsStr(array $attrs): string
    {
        if (!empty($attrs)) {
            $result = '';
            foreach ($attrs as $name => $value) {
                if ($value === true) {
                    $result .= " $name";
                } else {
                    $result .= " $name=\"$value\"";
                }
            }
            return $result;
        } else {
            return '';
        }
    }

    private function removeElem(string $elem, array $arr): array
    {
        $key = array_search($elem, $arr);
        array_splice($arr, $key, 1);
        return $arr;
    }
}