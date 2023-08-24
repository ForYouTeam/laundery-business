<?php

namespace App\Http\Controllers;

use App\Contracts\PaketContract;
use App\Http\Requests\PaketRequest;
use App\Repositories\PaketRepository;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    private PaketContract $paketRepo;
    public function __construct()
    {
        $this->paketRepo = new PaketRepository;
    }

    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 5); // Menentukan jumlah item per halaman

        $result = $this->paketRepo->getAllPayload([], $perPage);
        $data = $result['data']; // Ambil data dari hasil payload
        return view('admin.paket.index')->with('data', $data);
    }

    // public function index()
    // {
    //     $data = $this->paketRepo->getAllPayload([]);
    //     return view('admin.paket.index')->with('data', $data['data']);
    // }

    public function getAllData()
    {
        $result = $this->paketRepo->getAllPayload([]);

        return response()->json($result, $result['code']);
    }

    public function getDataById(int $id)
    {
        $result = $this->paketRepo->getPayloadById($id);

        return response()->json($result, $result['code']);
    }

    public function upsertData(PaketRequest $request)
    {
        $id = $request->id | null;
        $result = $this->paketRepo->upsertPayload($id, $request->all());

        return response()->json($result, $result['code']);
    }

    public function deleteData(int $id)
    {
        $result  = $this->paketRepo->deletePayload($id);
        return response()->json($result, $result['code']);
    }
}
