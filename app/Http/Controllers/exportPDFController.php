<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class exportPDFController extends Controller
{
    function index()
    {
        $student_data = $this->get_student_data(); 
        // gọi phương thức get_student_data() để lấy dữ liệu học sinh từ csdl và gán kết quả vào biến $student_data
        return view('exportPDF')->with('student_data', $student_data);
    }
    function get_student_data()
    {
        $student_data = DB::table('students_data')->get();
        //dùng để truy vấn cơ sở dữ liệu và lấy dữ liệu sinh viên từ bảng "students_data".

        return $student_data;
    }
    function pdf()
    {
        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML($this->convert_student_data_to_html());
        return $pdf->stream();
    }

    function convert_student_data_to_html()
    {
        $student_data = $this->get_student_data();
        $output = '
        <h3 align="center">Student Data</h3>
        <table width="100%" style="border-collapse: collapse; border: 0px;">
        <tr>
            <th style="border: 1px solid; padding:10px;" width="5%">ID</th>
            <th style="border: 1px solid; padding:10px;" width="8%">Name</th>
            <th style="border: 1px solid; padding:10px;" width="12%">Birthday</th>
            <th style="border: 1px solid; padding:10px;" width="10%">Email</th>
            <th style="border: 1px solid; padding:10px;" width="8%">Phone</th>
            <th style="border: 1px solid; padding:10px;" width="30%">Address</th>
        </tr>
     ';
        foreach ($student_data as $student => $value) {
            $output .= '
      <tr>
       <td style="border: 1px solid; padding:10px;">' . $value->id . '</td>
       <td style="border: 1px solid; padding:10px;">' . $value->name . '</td>
       <td style="border: 1px solid; padding:10px;">' . $value->birthday . '</td>
       <td style="border: 1px solid; padding:10px;">' . $value->email . '</td>
       <td style="border: 1px solid; padding:10px;">' . $value->phonenumber . '</td>
       <td style="border: 1px solid; padding:10px;">' . $value->address . '</td>

      </tr>
      ';
        }
        $output .= '</table>';
        return $output;
    }
}
