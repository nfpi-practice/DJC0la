<?php
class FileManipulator
{
    public function create(string $filePath): void
    {
        file_put_contents($filePath, '');
    }

    public function delete(string $filePath): void
    {
        unlink($filePath);
    }

    public function copy(string $filePath, string $copyPath): void
    {
        copy($filePath, $copyPath);
    }

    public function rename(string $filePath, string $newName): void
    {
        rename($filePath, pathinfo($filePath, PATHINFO_DIRNAME) . "/" . $newName);
    }

    public function replace(string $filePath, string $newPath): void
    {
        rename($filePath, $newPath);
    }

    public function weigh(string $filePath): string
    {
        return filesize($filePath) . " Bytes";
    }
}

$file = new FileManipulator();
$file->create('files/file1.txt');
file_put_contents('files/file1.txt', 'hello world');
$file->copy('files/file1.txt', "files/file2.txt");
$file->delete('files/file1.txt');
$file->rename('files/file2.txt', 'file.txt');
print_r($file->weigh('files/file.txt'));