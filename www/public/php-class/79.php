<?php

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

$th = new TagHelper();

echo $th->open('form', ['action' => 'test.php', 'method' => 'GET']);
echo $th->open('input', ['name' => 'year']);
echo $th->open('input', ['type' => 'submit']);
echo $th->close('form');