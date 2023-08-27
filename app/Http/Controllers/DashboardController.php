<?php

namespace App\Http\Controllers;

use App\Models\Laundry;
use App\Models\Member;
use App\Models\Order;
use App\Models\Paket;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::count();
        $loundry = Laundry::count();
        $member = Member::count();
        $order = Order::count();
        $paket = Paket::count();
        $report = Report::count();


        return response()->json([
            'code' => 200,
            'message' => 'success count',
            'data' => [
                'user' => $user,
                'loundry' => $loundry,
                'member' => $member,
                'order' => $order,
                'paket' => $paket,
                'report' => $report,

            ]
        ]);
    }
}
