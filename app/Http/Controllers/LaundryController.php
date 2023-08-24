<?php

namespace App\Http\Controllers;

use App\Contracts\LaundryContract;
use App\Http\Requests\LaundryRequest;
use App\Repositories\LaundryRepository;
use Illuminate\Http\Request;

class LaundryController extends Controller
{
    private LaundryContract $laundryRepo;
    public function __construct()
    {
        $this->laundryRepo = new LaundryRepository;
    }

    public function index()
    {
        $result = $this->laundryRepo->getAllPayload([]); // Mengambil data dari payload
        $data = $result['data']; // Ambil data dari hasil payload
        return view('admin.laundry.index', compact('data'));
    }

    public function getAllData()
    {

        $result = $this->laundryRepo->getAllPayload([]);

        return response()->json($result, $result['code']);
    }

    public function getDataById(int $id)
    {
        $result = $this->laundryRepo->getPayloadById($id);

        return response()->json($result, $result['code']);
    }

    public function upsertData(LaundryRequest $request)
    {
        $id = $request->id | null;
        $result = $this->laundryRepo->upsertPayload($id, $request->all());

        return response()->json($result, $result['code']);
    }

    public function deleteData(int $id)
    {
        $result  = $this->laundryRepo->deletePayload($id);
        return response()->json($result, $result['code']);
    }
}
