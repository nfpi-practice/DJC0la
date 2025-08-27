<?php
require_once "67.php";

class ListItem extends Tag
{
    public function __construct()
    {
        parent::__construct('li');
    }

    public function __toString(): string
    {
        return $this->show();
    }
}

class HtmlList extends Tag
{
    private array $items = [];

    public function __toString(): string
    {
        return $this->show();
    }

    public function addItem(ListItem $li): self
    {
        $this->items[] = $li;
        return $this;
    }

    public function show(): string
    {
        $str = $this->open();
        foreach ($this->items as $item) {
            $str .= $item;
        }
        $str .= $this->close();
        return $str;
    }
}

class Image extends Tag
{
    public function __construct()
    {
        $this->setAttr("src", "")->setAttr("alt", "");
        parent::__construct("img");
    }

    public function __toString(): string
    {
        return parent::open();
    }
}

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

class Form extends Tag
{
    public function __construct()
    {
        parent::__construct('form');
    }
}

class Input extends Tag
{
    public function __construct()
    {
        parent::__construct('input');
    }

    public function open(): string
    {
        $inputName = $this->getAttr('name');
        if ($inputName) {
            if (isset($_REQUEST[$inputName])) {
                $value = $_REQUEST[$inputName];
                $this->setAttr('value', $value);
            }
        }
        return parent::open();
    }

    public function __toString(): string
    {
        return $this->open();
    }
}

class Submit extends Input
{
    public function __construct()
    {
        $this->setAttr("type", "submit");
        parent::__construct();
    }
}

class Password extends Input
{
    public function __construct()
    {
        $this->setAttr("type", "password");
        parent::__construct();
    }
}

class Hidden extends Input
{
    public function __construct()
    {
        $this->setAttr('type', 'hidden');
        parent::__construct();
    }
}

class Textarea extends Tag
{
    public function __construct()
    {
        parent::__construct("textarea");
    }

    public function show(): string
    {
        $attrName = $this->getAttr('name');
        if ($attrName) {
            if (isset($_REQUEST[$attrName])) {
                $this->setText($_REQUEST[$attrName]);
            } else {
                $this->setText("");
            }
        }
        return parent::show();
    }
}

class Checkbox extends Tag
{
    public function __construct()
    {
        $this->setAttr('type', 'checkbox');
        $this->setAttr('value', '1');
        parent::__construct('input');
    }

    public function open(): string
    {
        $name = $this->getAttr('name');
        if ($name) {
            $hidden = (new Hidden)
                ->setAttr('name', $name)
                ->setAttr('value', '0');
            if (isset($_REQUEST[$name])) {
                $value = $_REQUEST[$name];
                if ($value == 1) {
                    $this->setAttr('checked');
                } else {
                    $this->removeAttr('checked');
                }
            }
            return $hidden->open() . parent::open();
        } else {
            return parent::open();
        }
    }

    public function __toString(): string
    {
        return $this->open();
    }
}

class Radio extends Checkbox
{
    public function __construct()
    {
        parent::__construct();
        $this->setAttr('type', 'radio')->setAttr('value', '0');
    }

    public function __toString(): string
    {
        return $this->open();
    }
}

class Select extends Tag
{
    public array $elements = [];

    public function __construct()
    {
        parent::__construct("select");
    }

    public function add(string $text): self
    {
        $this->elements[] = $text;
        parent::setText($this->getText() . $text);
        return $this;
    }

    public function open(): string
    {
        $attrName = $this->getAttr("name");
        if ($attrName) {
            if (isset($_REQUEST["$attrName"])) {
                foreach ($this->elements as $element) {
                    $element->removeAttr("selected");
                    if ($element->getText() === $_REQUEST["$attrName"]) {
                        $element->setSelected();
                    }
                }
            }
            $this->setText(implode('', $this->elements));
        }
        return parent::open();
    }
}

class Option extends Tag
{
    public function __construct()
    {
        parent::__construct("option");
    }

    public function __toString(): string
    {
        return $this->show();
    }

    public function setSelected(): self
    {
        $this->setAttr("selected");
        return $this;
    }
}

class TagHelper
{
    public function open(string $tagName, array $attrs = []): string
    {
        $str = $this->getAttrsStr($attrs);
        return "<$tagName$str>";
    }

    public function close(string $tagName): string
    {
        return "</$tagName>";
    }

    public function show(string $tagName, string $text): string
    {
        return "<$tagName>$text</$tagName>";
    }

    public function getAttrsStr(array $attrs): string
    {
        $str = "";
        if (!empty($attrs)) {
            foreach ($attrs as $name => $value) {
                if ($value === true) {
                    $str .= " $name";
                } else {
                    $str .= " $name=\"$value\"";
                }
            }
        }
        return $str;
    }
}