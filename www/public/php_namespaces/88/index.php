<?php

require_once "core/users/data.php";

use \Core\Users\Data;

require_once "core/admins.php";

use \Core\Admin\Controller;

class Test
{
    public function __construct()
    {
        $data1 = new Data('user1');
        $data2 = new Data('user3');
        $data3 = new Data('user3');
    }
}

new Test();

class Page extends Controller
{
    public function method4()
    {
        return 4;
    }
}

require_once "core/users/storage.php";

use \Core\Users\Storage\Data1;
use \Core\Admin\Model;

class Test1
{
    public function __construct()
    {
        $model = new Model;
        $data = new Data1;
    }
}

new Test1();

require_once "core/storage/model.php";
use \Core\Storage\Model1;

new Model1();