<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\JsonExport;

use Illuminate\Support\Facades\Validator;


class JsonController extends Controller
{
    public function uploadJson(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'json_file' => 'required|mimes:json|max:10000'
        ]);
  // Check if validation fails
  if ($validator->fails()) {
    return redirect()->back()->withErrors($validator)->withInput();
}

        $json = json_decode(file_get_contents($request->file('json_file')), true);

        // Export JSON data to Excel
        return Excel::download(new JsonExport($json), 'data.xlsx');
    }



}
