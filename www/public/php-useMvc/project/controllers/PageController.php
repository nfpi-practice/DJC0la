<?php

namespace Project\Controllers;

use Core\Controller;
use Project\Models\Page;
use Project\Models\Pages;

class PageController extends Controller
{
    private array $pages;

    public function __construct()
    {
        $this->pages = [
            1 => ['title' => 'страница 1', 'text' => 'текст 1'],
            2 => ['title' => 'страница 2', 'text' => 'текст 2'],
            3 => ['title' => 'страница 3', 'text' => 'текст 3'],
        ];
    }

    public function act(): string
    {
        $this->title = 'Операция act контроллера page';
        return $this->render('page/act', [
            'header' => 'список пользователей',
            'users' => ['user1', 'user2', 'user3'],
        ]);
    }

    public function show(array $params): string
    {
        $id = (int)$params['n'];
        $this->title = $this->pages[$id]['title'];

        return $this->render('page/show', [
            'text' => $this->pages[$id]['text']
        ]);
    }

    public function one(array $params): string
    {
        $id = (int)$params['id'];
        $page = (new Pages())->getById($id);

        $this->title = $page['title'];
        return $this->render('page/one', [
            'text' => $page['text'],
            'h1' => $this->title
        ]);
    }

    public function all(): string
    {
        $this->title = 'Все страницы';

        $pages = (new Pages())->getAll();
        return $this->render('page/all', [
            'pages' => $pages,
            'h1' => $this->title
        ]);
    }

    public function test(): void
    {
        $page = new Page();

        $data = $page->getById(3);
        var_dump($data);

        $data = $page->getById(5);
        var_dump($data);

        $data = $page->getByRange(2, 5);
        var_dump($data);
    }
}