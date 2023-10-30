<?php
namespace App\Services;

interface DataExporterServiceInterface
{
    // code here
    public function filename(string $filename);

    public function except(array $columns);

    public function only(array $columns);

    public function originalValue(array $columns);

    public function column(string $column, callable $callback);

    public function headings(array $headings);

    public function columns(array $columns);

    public function setColumnColor(string $column, string $color);

    public function setColumnWidth(string $column, float $width);

    public function mergeCells(string $range);

    public function setSheetName(string $name);

    public function export($data); // array or object

    public function setFolder(string $folder);

    public function getFullPath();

    public function setFont(string $name, int $size, ?string $range = null);

    public function setFontColor(string $color);

    public function methodDownload (int $methodDownload);
}
