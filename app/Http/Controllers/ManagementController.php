<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Status;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    public function status()
    {
        $statuses = Status::all();

        return view('home', ['statuses' => $statuses]);
    }
}
