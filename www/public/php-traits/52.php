<?php

trait Trait1
{
    public function method1()
    {
        return 1;
    }
}

var_dump(trait_exists('Trait1'));
var_dump(trait_exists('Trait2'));

echo '<br>';

print_r(get_declared_traits());