<?php

namespace App\Imports;

use App\Services\Cms\Example;

class ExampleImport
{
    // https://makitweb.com/import-csv-data-to-mysql-database-with-laravel/
    const CSV_SEPARATOR = ";";

    public static function importFromRequest(string $key)
    {
        if (request()->hasFile('example_file')) {

            $file = request()->file($key);

            // File Details
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();

            // Valid File Extensions
            $valid_extension = ["csv"];

            // Check file extension
            if (in_array(strtolower($extension), $valid_extension)) {

                // File upload location
                $location = 'upload/temp';

                // Upload file
                $file->move($location, $filename);

                // Import CSV to Database
                $filepath = public_path($location . "/" . $filename);

                // Reading file
                $file = fopen($filepath, "r");

                $importData_arr = [];
                $i = 0;

                while (($filedata = fgetcsv($file, 1000, static::CSV_SEPARATOR)) !== false) {
                    $num = count($filedata);

                    // Skip first row (Remove below comment if you want to skip the first row)
                    /*if($i == 0){
                       $i++;
                       continue;
                    }*/
                    for ($c = 0; $c < $num; $c++) {
                        $importData_arr[$i][] = $filedata [$c];
                    }
                    $i++;
                }
                fclose($file);

                dd($importData_arr);

                // Insert to MySQL database
                foreach ($importData_arr as $row) {

                    Plan::create([
                        'col_name_1' => $row[0],
                        'col_name_2' => $row[1],
                        'col_name_3' => $row[2],
                    ]);

                }
            }
        }
    }
}
