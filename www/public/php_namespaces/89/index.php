<?php

require_once 'resource/controller.php';
require_once 'resource/model.php';

use \Resource\Controller\Page as PageController;
use \Resource\Model\Page as PageModel;

class Test
{
    public function __construct()
    {
        $pageController = new PageController();
        $pageModel = new PageModel();
    }
}

new Test();

require_once "data/controller.php";
require_once "data/model.php";

use Project\Data\Controller\Page as PageProjectController;
use Project\Data\Controller\Page as PageProjectModel;

class Test1
{
    public function __construct()
    {
        $pageController = new PageProjectController();
        $pageModel = new PageProjectModel();
    }
}

new Test1();