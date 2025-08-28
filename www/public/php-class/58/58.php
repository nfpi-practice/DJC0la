<?php
require_once "iFile.php";

class File implements iFile
{
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function getPath(): string
    {
        return $this->filePath;
    }

    public function getDir(): string
    {
        return pathinfo($this->filePath, PATHINFO_DIRNAME);
    }

    public function getName(): string
    {
        return pathinfo($this->filePath, PATHINFO_FILENAME);
    }

    public function getExt(): string
    {
        return pathinfo($this->filePath, PATHINFO_EXTENSION);
    }

    public function getSize(): int
    {
        return filesize($this->filePath);
    }

    public function getText(): string
    {
        return file_get_contents($this->filePath);
    }

    public function setText(string $text): void
    {
        file_put_contents($this->filePath, $text);
    }

    public function appendText(string $text): void
    {
        file_put_contents($this->filePath, file_get_contents($this->filePath) . " " . $text, FILE_APPEND);
    }

    public function copy(string $copyPath): bool
    {
        return copy($this->filePath, $copyPath);
    }

    public function delete(): bool
    {
        return unlink($this->filePath);
    }

    public function rename(string $newName): void
    {
        $newPath = "files/" . $newName;
        rename($this->filePath, $newPath);
        $this->filePath = $newPath;
    }

    public function replace(string $newPath): void
    {
        $newFullPath = "files/" . $newPath;
        rename($this->filePath, $newFullPath);
        $this->filePath = $newFullPath;
    }

    public function printDirFiles(string $folder = "files"): string
    {
        $str = "";
        $files = array_diff(scandir($folder), ['..', '.']);
        foreach ($files as $file) {
            $str .= $file . " ";
        }
        return trim($str);
    }
}