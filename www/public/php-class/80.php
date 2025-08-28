<?php
require_once "class.php";

class FormHelper extends TagHelper
{
    public function openForm(array $attrs = []): string
    {
        return $this->open("form", $attrs);
    }

    public function closeForm(): string
    {
        return $this->close("form");
    }

    public function input(array $attrs = []): string
    {
        if (isset($attrs["name"])) {
            $name = $attrs["name"];
            if (isset($_REQUEST[$name])) {
                $attrs["value"] = $_REQUEST[$name];
            }
        }
        return $this->open("input", $attrs);
    }

    public function password(array $attrs = []): string
    {
        $attrs["type"] = "password";
        return $this->input($attrs);
    }

    public function hidden(array $attrs = []): string
    {
        $attrs["type"] = "hidden";
        return $this->open("input", $attrs);
    }

    public function submit(array $attrs = []): string
    {
        $attrs["type"] = "submit";
        return $this->open("input", $attrs);
    }

    public function checkbox(array $attrs = []): string
    {
        $attrs['type'] = 'checkbox';
        $attrs['value'] = 1;
        if (isset($attrs['name'])) {
            $name = $attrs['name'];
            if (isset($_REQUEST[$name]) and $_REQUEST[$name] == 1) {
                $attrs['checked'] = true;
            }
            $hidden = $this->hidden(['name' => $name, 'value' => '0']);
        } else {
            $hidden = '';
        }
        return $hidden . $this->open('input', $attrs);
    }

    public function textarea(array $attrs = []): string
    {
        $str = "";
        if (isset($attrs['name'])) {
            $name = $attrs['name'];
            if (isset($_REQUEST[$name])) {
                $str = $_REQUEST[$name];
            }
        }
        return $this->open('textarea', $attrs) . $str . $this->close('textarea');
    }

    public function select(array $attrs = [], array $attributes = []): string
    {
        $str = '';
        $name = "";
        if (isset($attrs['name'])) {
            $name = $attrs['name'];
        }
        foreach ($attributes as $attr) {
            $text = $attr['text'];
            $optionAttrs = $attr['attrs'];
            unset($optionAttrs['selected']);
            if ($optionAttrs["value"] === $_REQUEST[$name]) {
                $optionAttrs["selected"] = true;
            }
            $str .= $this->open('option', $optionAttrs) . $text . $this->close('option');
        }
        return $this->open('select', $attrs) . $str . $this->close('select');
    }
}

$fh = new FormHelper();

echo $fh->openForm(['action' => '', 'method' => 'GET']);
echo $fh->input(['name' => 'year']);
echo $fh->checkbox(['name' => 'check']);
echo $fh->textarea(['name' => 'comment']);
echo $fh->select(
    ['name' => 'list', 'class' => 'eee'],
    [
        ['text' => 'item1', 'attrs' => ['value' => '1']],
        ['text' => 'item2', 'attrs' => ['value' => '2', 'selected' => true]],
        ['text' => 'item3', 'attrs' => ['value' => '3', 'class' => 'last']],
    ]
);
echo $fh->submit();
echo $fh->closeForm();