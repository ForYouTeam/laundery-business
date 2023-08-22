<?php

namespace App\Http\Controllers;

use App\Contracts\OrderContract;
use App\Http\Requests\OrderRequest;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private OrderContract $orderRepo;
    public function __construct()
    {
        $this->orderRepo = new OrderRepository;
    }

    public function index()
    {
        return view('admin.order.index');
    }

    public function getAllData()
    {
        $result = $this->orderRepo->getAllPayload([]);

        return response()->json($result, $result['code']);
    }

    public function getDataById(int $id)
    {
        $result = $this->orderRepo->getPayloadById($id);

        return response()->json($result, $result['code']);
    }

    public function upsertData(OrderRequest $request)
    {
        $id = $request->id | null;
        $result = $this->orderRepo->upsertPayload($id, $request->all());

        return response()->json($result, $result['code']);
    }

    public function deleteData(int $id)
    {
        $result  = $this->orderRepo->deletePayload($id);
        return response()->json($result, $result['code']);
    }
}
