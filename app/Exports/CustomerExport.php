<?php

namespace App\Exports;


use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;


class CustomerExport implements FromView
{
    use Exportable;
    public function view(): View
    {
        $customer = DB::table('customer')->get();
        return view('customer/export-customer',['customer'=>$customer]);
    }
}
