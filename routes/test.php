<?php

use Illuminate\Support\Facades\Route;
Route::get("pesapal",[\App\Http\Controllers\PesapalController::class,'initiatePayment']);

Route::get("pusher",function (){
    event(new \App\Events\P9ChargesPaidEvent('hello world','B20C4A9A1FI'));
});

Route::get("excel",function (){

    $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    $activeWorksheet = $spreadsheet->getActiveSheet();
    $activeWorksheet->setCellValue([5,7], 'Hello World !');

//    $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    $spreadsheet->createSheet()->setTitle("closer");
    $spreadsheet->setActiveSheetIndex(1);
    $activeWorksheet = $spreadsheet->getActiveSheet();
    $activeWorksheet->setCellValue('A1', 'Hello sadasdads !');

    $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
    $writer->save('hello world.xlsx');


});

Route::get("shits",function (){

    $fileName = "members-data_" . date('Y-m-d') . ".xls";

// Column names
    $fields = array('ID', 'FIRST NAME', 'LAST NAME', 'EMAIL', 'GENDER', 'COUNTRY', 'CREATED', 'STATUS');

// Display column names as first row
    $excelData = implode("\t", array_values($fields)) . "\n";

// Fetch records from database

        $excelData .= 'No records found...'. "\n";

    // Headers for download
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$fileName\"");

// Render excel data
    echo $excelData;
});

Route::get("sheet",function (){
    $objPHPExcel = new PHPExcel();

    // Add a new worksheet to the workbook
    $objPHPExcel->createSheet();

// Add another worksheet to the workbook, at index 0
    $objPHPExcel->createSheet(0);

    // Set the second worksheet as the active worksheet
    $objPHPExcel->setActiveSheetIndex(1);
    // Set the active worksheet
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setTitle('Name of Sheet 1');

// Add some data to cell A1
    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Hello, world!');

// Set the active worksheet to the second worksheet
    $objPHPExcel->setActiveSheetIndex(1);
    $objPHPExcel->getActiveSheet()->setTitle('Name of Sheet 2');

// Add some data to cell B2
    $objPHPExcel->getActiveSheet()->setCellValue('B2', 'Goodbye, world!');


    // Save the Excel file to the output stream
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
});

Route::get("sheets",function (){
    $objPHPExcel = new PHPExcel();

// Create a first sheet, representing sales data
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Something');

// Rename sheet
    $objPHPExcel->getActiveSheet()->setTitle('Name of Sheet 1');

// Create a new worksheet, after the default sheet
    $objPHPExcel->createSheet();

// Add some data to the second sheet, resembling some different data types
    $objPHPExcel->setActiveSheetIndex(1);
    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'More data');

// Rename 2nd sheet
    $objPHPExcel->getActiveSheet()->setTitle('Second sheet');

// Redirect output to a client’s web browser (Excel5)
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="name_of_file.xls"');
    header('Cache-Control: max-age=0');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
});

Route::get("/",function (){




    $p9 = \App\Models\P9::first();

    trigger_mpesa_stk_push($p9->mpesa_phone??$p9->phone,$p9->amount,$p9->code);



    $fileName = 'patients_template.csv';


    $headers = array(
        "Content-type" => "text/csv",
        "Content-Disposition" => "attachment; filename=$fileName",
        "Pragma" => "no-cache",
        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
        "Expires" => "0"
    );


    $columns = array('Name', 'Phone number', 'Gender (male or female)', 'County (eg Nairobi)', "Sub County eg Kasarani", "Health Unit", "Language (eg English)", "Content Types (comma separated - all for content types)");

    if (auth()->user()->role_id == Role::whereName(Role::ROLES['ADMIN'])->value("id"))
        $organization = Organization::first();
    else
        $organization = get_default_organization();

    if ($organization->has_chv) {
        $columns = array_merge($columns, [
            "CHV Phone number"
        ]);
    }
    if ($organization->has_kids) {
        $eg_edd = now()->addWeeks(18)->copy()->format("Y-m-d");
        $eg_dob = now()->subWeeks(30)->format("Y-m-d");
        $columns = array_merge($columns, [
            "EDD (expected delivery date, eg $eg_edd)",
            "Child's Date of birth eg $eg_dob",
            "Child's First name",
            "Child's Middle name",
            "Child's gender (male or female)",
        ]);
    }
    if (has_additional_patient_custom_fields($organization->id)) {
        $columns = array_merge($columns, [
            "study id",
            "contact 1",
        ]);
    }

    $callback = function () use ($columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        fclose($file);
    };

    return response()->stream($callback, 200, $headers);














    $file_name ="file_name.xls";
    $excel_file="Your Html Table Code";
    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=$file_name");
    echo $excel_file;




    header('Content-type: application/excel');
    $filename = 'filename.xls';
    header('Content-Disposition: attachment; filename='.$filename);

    $data = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">
<head>
    <!--[if gte mso 9]>
    <xml>
        <x:ExcelWorkbook>
            <x:ExcelWorksheets>
                <x:ExcelWorksheet>
                    <x:Name>Sheet 1</x:Name>
                    <x:WorksheetOptions>
                        <x:Print>
                            <x:ValidPrinterInfo/>
                        </x:Print>
                    </x:WorksheetOptions>
                </x:ExcelWorksheet>
            </x:ExcelWorksheets>
        </x:ExcelWorkbook>
    </xml>
    <![endif]-->
</head>

<body>
   <table><tr><td>Cell 1</td><td>Cell 2</td></tr></table>
</body></html>';

    echo $data;

    dd("clloser");





    $fileName = "closer.csv";

    $headers = array(
        "Content-type" => "text/csv",
        "Content-Disposition" => "attachment; filename=$fileName",
        "Pragma" => "no-cache",
        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
        "Expires" => "0"
    );

    echo "closer";

    head($headers);

    $test="<table  ><tr><td>Cell 1</td><td>Cell 2</td></tr></table>";
    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=$fileName");
    echo $test;

    $file="demo.xls";
    $test="<table  ><tr><td>Cell 1</td><td>Cell 2</td></tr></table>";
    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=$file");
    echo $test;




    (parse_str('foo[]=1&foo[]=2&foo[]=3',$results));

    dd($results);
    dd(urldecode("https://closer.com?coe=df&foo=bar"));

    dd(explode("&",urldecode("_token=c1co3W9ditkzhyzHzaS0QPdVGGKFiMx7c2n05zZy&code=B20C4A9A1F4&income_name%5B%5D=&income_amount%5B%5D=&income_expense_amount%5B%5D=&withholding_tax%5B%5D=&allowance_name%5B%5D=&allowance_amount%5B%5D=&deduction_name%5B%5D=&deduction_amount%5B%5D=&deduction_name%5B%5D=&deduction_amount%5B%5D=")));

    //generate pdf..
    $p9 = \App\Models\P9::query()->orderByDesc("id")->skip(1)->first();
//    return view("tax_return.p9_pdf",compact("p9"));
//    dd($data);
    $pdf = PDF::loadView("tax_return.p9_pdf",compact("p9"));

    return $pdf->download("p.pdf");


    dd("clsoer");


});
