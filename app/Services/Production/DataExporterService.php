<?php
namespace App\Services\Production;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use App\Services\DataExporterServiceInterface;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class DataExporterService implements DataExporterServiceInterface
{
    // code here
    protected $filename = 'export.xlsx';
    protected $excludedColumns = [];
    protected $includedColumns = [];
    protected $originalValueColumns = [];
    protected $columnCallbacks = [];
    protected $customHeadings = [];
    protected $selectedColumns = [];
    protected $columnColors = [];
    protected $columnWidths = [];
    protected $mergedCells = [];
    protected $sheetName = 'Sheet1';  // default sheet name
    protected $fontName = 'Arial';  // Default font name
    protected $fontSize = 12;       // Default font size
    protected $fontRange = null;    // Default to apply to entire sheet
    protected $fontColor = null;
    protected $folder = '';  // this will store the sub-folder name inside storage
    protected $methodDownload = 0; // default 0 is download now or 1 downloads save file
    protected $cellColor = '006600'; // default cell color
    protected $cellTextColor = 'FFFFFFFF'; // default cell text color white
    /**
     * @param string $filename
     * @return $this
     */
    public function filename(string $filename)
    {
        $this->filename = $filename;
        return $this;
    }

    /**
     * @param array $columns
     * @return $this
     */
    public function except(array $columns)
    {
        $this->excludedColumns = $columns;
        return $this;
    }

    /**
     * @param array $columns
     * @return $this
     */
    public function only(array $columns)
    {
        $this->includedColumns = $columns;
        return $this;
    }

    /**
     * @param array $columns
     * @return $this
     */
    public function originalValue(array $columns)
    {
        $this->originalValueColumns = $columns;
        return $this;
    }

    /**
     * @param string $column
     * @param callable $callback
     * @return $this
     */
    public function column(string $column, callable $callback)
    {
        $this->columnCallbacks[$column] = $callback;
        return $this;
    }

    /**
     * @param array $headings
     * @return $this
     */
    public function headings(array $headings)
    {
        $this->customHeadings = $headings;
        return $this;
    }

    /**
     * @param array $columns
     * @return $this
     */
    public function columns(array $columns)
    {
        $this->selectedColumns = $columns;
        return $this;
    }

    /**
     * @param string $column
     * @param string $color
     * @return $this
     */
    public function setColumnColor(string $column, string $color)
    {
        $this->columnColors[$column] = $color;
        return $this;
    }

    /**
     * @param string $column
     * @param float $width
     * @return $this
     */
    public function setColumnWidth(string $column, float $width)
    {
        $this->columnWidths[$column] = $width;
        return $this;
    }

    /**
     * @param string $range
     * @return $this
     */
    public function mergeCells(string $range)
    {
        $this->mergedCells[] = $range;
        return $this;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setSheetName(string $name)
    {
        $this->sheetName = $name;
        return $this;
    }

    /**
     * @param string $folder
     * @return $this
     */
    public function setFolder(string $folder)
    {
        $this->folder = $folder;
        return $this;
    }


    /**
     * @return string
     */
    public function getFullPath(): string
    {
        $path = storage_path($this->folder);
        return rtrim($path, '/') . '/' . $this->filename;
    }

    /**
     * @param string $name
     * @param int $size
     * @param string|null $range
     * @return $this
     */
    public function setFont(string $name, int $size, ?string $range = null)
    {
        $this->fontName = $name;
        $this->fontSize = $size;
        $this->fontRange = $range;
        return $this;
    }

    /**
     * @param string $color
     * @return $this
     */
    public function setFontColor(string $color)
    {
        $this->fontColor = $color;
        return $this;
    }

    /**
     * @param int $methodDownload
     * @return $this
     */
    public function methodDownload (int $methodDownload) {
        $this->methodDownload = $methodDownload;
        return $this;
    }


    /**
     * @param $data
     * @return bool
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function export($data)
    {
        if (!is_array($data) && !$data[0]) {
            return false;
        }

        if (!empty($this->includedColumns) || !empty($this->excludedColumns) || !empty($this->columnCallbacks)) {
            $data = $this->filterAndTransformData($data);
        }

        $spreadsheet = new Spreadsheet();
        $worksheet = $spreadsheet->getActiveSheet();

        // Set the sheet name
        $worksheet->setTitle($this->sheetName);

        // Filter data based on included and excluded columns...
        // Apply column callbacks...
        // Logic to write data into $worksheet...

        // Check if custom headings are set
        if (!empty($this->customHeadings)) {
            $colNum = 1;
            foreach ($this->customHeadings as $heading) {
                $worksheet->setCellValueByColumnAndRow($colNum, 1, $heading); // setCellValue
                // set wrap text, front size, front name, color text
                $worksheet->getStyleByColumnAndRow($colNum, 1)->getAlignment()->setWrapText(true);
                $worksheet->getRowDimension(1)->setRowHeight(-1);
                $worksheet->getColumnDimensionByColumn($colNum)->setAutoSize(true);
                $worksheet->getStyleByColumnAndRow($colNum, 1)
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB($this->cellColor);

                $worksheet->getStyleByColumnAndRow($colNum, 1)
                    ->getFont()
                    ->getColor()
                    ->setARGB($this->cellTextColor);

                $worksheet->getStyleByColumnAndRow($colNum, 1)->getFont()->setName($this->fontName);
                $worksheet->getStyleByColumnAndRow($colNum, 1)->getFont()->setSize($this->fontSize);
                if ($this->fontColor) {
                    $worksheet->getStyleByColumnAndRow($colNum, 1)->getFont()->getColor()->setARGB($this->fontColor);
                }
                // end wrap text, front size, front name, color text

                $colNum++;
            }
            // Adjust the row number for data to start from the next row after the headings
            $startingRow = 2;
        } else {

            $colNum = 1;
            foreach ($data[0] as $heading => $value) {
                $worksheet->setCellValueByColumnAndRow($colNum, 1, $heading); // setCellValue

                // set wrap text, front size, front name, color text
                $worksheet->getStyleByColumnAndRow($colNum, 1)->getAlignment()->setWrapText(true);
                $worksheet->getRowDimension(1)->setRowHeight(-1);
                $worksheet->getColumnDimensionByColumn($colNum)->setAutoSize(true);
                $worksheet->getStyleByColumnAndRow($colNum, 1)
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB($this->cellColor);

                $worksheet->getStyleByColumnAndRow($colNum, 1)
                    ->getFont()
                    ->getColor()
                    ->setARGB($this->cellTextColor);

                $worksheet->getStyleByColumnAndRow($colNum, 1)->getFont()->setName($this->fontName);
                $worksheet->getStyleByColumnAndRow($colNum, 1)->getFont()->setSize($this->fontSize);
                if ($this->fontColor) {
                    $worksheet->getStyleByColumnAndRow($colNum, 1)->getFont()->getColor()->setARGB($this->fontColor);
                }
                // end wrap text, front size, front name, color text

                $colNum++;
            }

            $startingRow = 2;
        }

        // start
        // $startingRow Bắt đầu từ dòng thứ 2 vì dòng đầu tiên là tiêu đề nếu có
        foreach ($data as $item) {
            $colNumber = 1;
            foreach ($item as $value) {
                $worksheet->setCellValueByColumnAndRow($colNumber, $startingRow, $value);

                // set wrap text, front size, front name, color text
                $worksheet->getStyleByColumnAndRow($colNumber, $startingRow)->getAlignment()->setWrapText(true);
                $worksheet->getRowDimension($startingRow)->setRowHeight(-1);
                $worksheet->getColumnDimensionByColumn($colNumber)->setAutoSize(true);

                $worksheet->getStyleByColumnAndRow($colNumber, $startingRow)->getFont()->setName($this->fontName);
                $worksheet->getStyleByColumnAndRow($colNumber, $startingRow)->getFont()->setSize($this->fontSize);
                if ($this->fontColor) {
                    $worksheet->getStyleByColumnAndRow($colNumber, $startingRow)->getFont()->getColor()->setARGB($this->fontColor);
                }
                // end wrap text, front size, front name, color text

                $colNumber++;
            }
            $startingRow++;
        }

        // end

        // Apply column colors
        if (!empty($this->columnColors)) {
            foreach ($this->columnColors as $column => $color) {
                $worksheet->getStyle($column)
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB($color);
            }
        }

        // Apply column widths
        if (!empty($this->columnWidths)) {
            foreach ($this->columnWidths as $column => $width) {
                $worksheet->getColumnDimension($column)->setWidth($width);
            }
        }

        // Merge cells
        if (!empty($this->mergedCells)) {
            foreach ($this->mergedCells as $range) {
                $worksheet->mergeCells($range);
            }
        }

        // Apply font settings
        if ($this->fontRange) {
            $worksheet->getStyle($this->fontRange)->getFont()->setName($this->fontName);
            $worksheet->getStyle($this->fontRange)->getFont()->setSize($this->fontSize);
            // Apply font settings
            if ($this->fontColor) {
                $worksheet->getStyle($this->fontRange)->getFont()->getColor()->setARGB($this->fontColor);
            }
        }

        // save excel
        if ($this->methodDownload == 1) {
            $this->exportFile($spreadsheet);
        } else {
            $this->downloadHeader($spreadsheet);
        }


    }

    /**
     * @param $spreadsheet
     * @return void
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     * download now
     */
    protected function downloadHeader ($spreadsheet) {
        // Send the headers
        header("Content-Type: application/vnd.ms-excel; charset=utf-8");
        header("Content-Disposition: attachment; filename=" . $this->filename);
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private", false);

        // Write the content to the browser
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit; // This is important to ensure no additional output is added
    }

    /**
     * @param $spreadsheet
     * @return string
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    protected function exportFile($spreadsheet) : string {

        try {
            $fullPath = $this->getFullPath();

            // Check and create directory if not exists
            $directory = dirname($fullPath);

            if (!is_dir($directory)) {
                mkdir($directory, 0775, true);
            }

            $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
            $writer->save($fullPath);

            unset($writer);

            return file_exists($fullPath);

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage);
        }

    }

    /**
     * @param array $data
     * @return array
     */
    protected function filterAndTransformData(array $data) : array
    {
        foreach ($data as $rowKey => $row) {
            // Filter data based on included and excluded columns
            if (!empty($this->includedColumns)) {
                $row = array_intersect_key($row, array_flip($this->includedColumns));
            }

            if (!empty($this->excludedColumns)) {
                $row = array_diff_key($row, array_flip($this->excludedColumns));
            }

            // Apply column callbacks
            foreach ($this->columnCallbacks as $column => $callback) {
                if (isset($row[$column])) {
                    $row[$column] = $callback($row[$column], $row);
                }
            }

            $data[$rowKey] = $row;
        }

        return $data;
    }

}
