<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\JsonExport;



class JsonController extends Controller
{
    public function uploadJson(Request $request)
    {
        $request->validate([
            'json_file' => 'required|file|max:10048',
        ]);

        $json = json_decode(file_get_contents($request->file('json_file')), true);

        // Export JSON data to Excel
        return Excel::download(new JsonExport($json), 'data.xlsx');
    }
}

