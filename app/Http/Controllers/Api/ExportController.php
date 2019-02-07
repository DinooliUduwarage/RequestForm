<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\DepartmentExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
     /**
    * @return \Illuminate\Support\Collection
    */
    public function exportView()
    {
       return view('export');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new DepartmentExport, 'users.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    
}
