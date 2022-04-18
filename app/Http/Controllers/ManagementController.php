<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\SalesManagementRequest;

class ManagementController extends Controller
{
    public function status()
    {
        $statuses = Status::all();

        return view('home', ['statuses' => $statuses]);
    }

    public function index()
    {

    }
    public function create(SalesManagementRequest $request)
    {
        $form = $request->all();
        Customer::create($form);
        return redirect('/home');
    }
}
