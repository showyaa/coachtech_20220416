<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\SalesManagementRequest;

class ManagementController extends Controller
{
    public function index()
    {
        $statuses = Status::all();
        $customers = Customer::all();
        $status_id1 = Customer::where('status_id', '1')->get();
        $status_id2 = Customer::where('status_id', '2')->get();
        $status_id3 = Customer::where('status_id', '3')->get();
        $status_id4 = Customer::where('status_id', '4')->get();
        $status_id5 = Customer::where('status_id', '5')->get();

        return view('home', 
        [
            'statuses' => $statuses,
            'customers' => $customers,
            'companies1'=> $status_id1,
            'companies2'=> $status_id2,
            'companies3'=> $status_id3,
            'companies4'=> $status_id4,
            'companies5'=> $status_id5
        ]);
    }

    public function create(SalesManagementRequest $request)
    {
        $form = $request->all();
        Customer::create($form);
        return redirect('/home');
    }
}
