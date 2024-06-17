<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show(Request $request)
    {

        $data = $request->validate([

            'company_id' => 'required|integer|exists:companies,id',
            'date_star' => ['required', 'date_format:Y-m-d', 'before_or_equal:date_end'],
            'date_end' => ['required', 'date_format:Y-m-d', 'after_or_equal:date_star'],

        ]);

        dd($data);

    }
}
