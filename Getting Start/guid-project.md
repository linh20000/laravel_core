## Basic using export excel

implementation service provider 

`` use App\Services\DataExporterServiceInterface; ``
- get all attributes by model
- this->userRepository->getBlankModel()->getFillable()
```
    $exporter = $this->dataExporterService;
    $exporter->filename('test1.xlsx')
        ->except(['column1', 'column2'])
        ->only(['column3', 'column4'])
        ->setSheetName('CustomSheetName')
        ->originalValue(['column1', 'column2'])
        ->headings()
        ->setFont('Times New Roman', 20, 'A1')  // Setting font for range A1:C10
        ->setFolder('exports/users')
        ->setColumnColor('A', 'FFFF0000') // Set column A with red color
         // Set column B width to 20
        ->mergeCells('A1:B1') // Merge cells from A1 to B1
        ->column('column_5', function ($value, $original) {
            return $value;
        })
        
        ->except(['password','email_verified_at', 'created_at', 'updated_at'])
                ->column('name', function($value, $row) {
                    return strtoupper($value);
                })
        ->export($users->toArray()['data']);
```


## Injection package 
 - https://github.com/mewebstudio/captcha
 - 
