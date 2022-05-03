<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\SalesManagementRequest;
use App\Http\Requests\StatusRequest;

class ManagementController extends Controller
{
    public function index()
    {
        $statuses = Status::all();
        $customers = Customer::all();
        $users = Auth::user();
        $status_id1 = Customer::where('user_id', $users->id)->where('status_id', '1')->get();
        $status_id2 = Customer::where('user_id', $users->id)->where('status_id', '2')->get();
        $status_id3 = Customer::where('user_id', $users->id)->where('status_id', '3')->get();
        $status_id4 = Customer::where('user_id', $users->id)->where('status_id', '4')->get();
        $status_id5 = Customer::where('user_id', $users->id)->where('status_id', '5')->get();

        $param = [
            'input' => '',
            'statuses' => $statuses,
            'customers' => $customers,
            'users' => $users,
            'companies1' => $status_id1,
            'companies2' => $status_id2,
            'companies3' => $status_id3,
            'companies4' => $status_id4,
            'companies5' => $status_id5,
        ];

        return view('home', $param);
    }




    // 検索
    public function find()
    {
        $statuses = Status::all();
        $param = [
            'input' => '',
            'statuses' => $statuses,
        ];

        return view('find', $param);
    }

    public function search(Request $request)
    {
        $statuses = Status::all();
        $users = Auth::user();
        $items1 = Customer::where('company', 'LIKE', "%{$request->search}%")->where('status_id', '1')->where('user_id', $users->id)->orWhere('name', 'LIKE', "%{$request->search}%")->where('status_id', '1')->where('user_id', $users->id)->get();
        $items2 = Customer::where('company', 'LIKE', "%{$request->search}%")->where('status_id', '2')->where('user_id', $users->id)->orWhere('name', 'LIKE', "%{$request->search}%")->where('status_id', '2')->where('user_id', $users->id)->get();
        $items3 = Customer::where('company', 'LIKE', "%{$request->search}%")->where('status_id', '3')->where('user_id', $users->id)->orWhere('name', 'LIKE', "%{$request->search}%")->where('status_id', '3')->where('user_id', $users->id)->get();
        $items4 = Customer::where('company', 'LIKE', "%{$request->search}%")->where('status_id', '4')->where('user_id', $users->id)->orWhere('name', 'LIKE', "%{$request->search}%")->where('status_id', '4')->where('user_id', $users->id)->get();
        $items5 = Customer::where('company', 'LIKE', "%{$request->search}%")->where('status_id', '5')->where('user_id', $users->id)->orWhere('name', 'LIKE', "%{$request->search}%")->where('status_id', '5')->where('user_id', $users->id)->get();

        $param = [
            'statuses' => $statuses,
            'input' => $request->search,
            'items1' => $items1,
            'items2' => $items2,
            'items3' => $items3,
            'items4' => $items4,
            'items5' => $items5,
        ];
        
        return view('find', $param);
    }




    // 設定画面
    public function setting()
    {
        $statuses = Status::all();
        $customers = Customer::all();
        $param = [
            'statuses' => $statuses,
            'customers' => $customers,
        ];

        return view('setting', $param);
    }

    public function status_update(StatusRequest $request)
    {
        Status::where('id', '1')->update(['status'=>$request->status1]);
        Status::where('id', '2')->update(['status'=>$request->status2]);
        Status::where('id', '3')->update(['status'=>$request->status3]);
        Status::where('id', '4')->update(['status'=>$request->status4]);
        Status::where('id', '5')->update(['status'=>$request->status5]);

        return redirect('/setting');
    }




    // データの追加・更新・削除
    public function create(SalesManagementRequest $request)
    {
        $form = $request->all();
        Customer::create($form);
        return redirect('/home');
    }

    public function update(SalesManagementRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Customer::where('id', $request->id)->update($form);
        return redirect('/home');
    }

    public function delete(Request $request)
    {
        Customer::find($request->id)->delete();
        return redirect('/home');
    }


    public function welcome(User $user)
    {
        
    }
}
