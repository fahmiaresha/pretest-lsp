<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CustomerExport;
use App\Imports\CustomerImport;
use Maatwebsite\Excel\Validators\ValidationException;
use Response;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 
     */
    public function dashboard()
    {
        //menampilkan halaman dashboard
        $count_customer = DB::table('customer')->count();
        $kota_customer = DB::table('customer')
                            ->select('kota_customer',DB::raw('COUNT(kota_customer) AS kota'))
                            ->groupBy('kota_customer')
                            ->orderBy('kota', 'DESC')
                            ->get();
        // dump($kota_customer);
        return view('customer/dashboard',['count_customer'=>$count_customer,'kota_customer'=>$kota_customer]);
    }

    public function customer()
    {
        //menampilkan halaman customer
        $customer = DB::table('customer')->get();
        return view('customer/data-customer',['customer'=>$customer]);
    }

    public function store_customer(Request $request)
    {
        //menyimpan data customer
        DB::table('customer')->insert([
        'nama_customer' => $request->nama,
        'alamat_customer' => $request->alamat,
        'kota_customer' => $request->kota,
        'email_customer' => $request->email,
        'hp_customer' => $request->telp,
        'perusahaan_customer' => $request->perusahaan,
        ]);

        return redirect('/data-customer');
    }

    public function export_excel()
    {
        return Excel::download(new CustomerExport, 'data-customer.xlsx');
    }

    public function import_excel(Request $request)
    {
        // dump($request->file);
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);
        $file = $request->file('file');
        $import = new CustomerImport;
        $import->import($file);
        return redirect('/data-customer');
    }

}
