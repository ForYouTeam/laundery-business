<?php

namespace App\Http\Controllers;

use App\Contracts\ReportContract;
use App\Http\Requests\ReportRequest;
use App\Repositories\ReportRepository;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    private ReportContract $reportRepo;
    public function __construct()
    {
        $this->reportRepo = new ReportRepository;
    }


    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 5); // Menentukan jumlah item per halaman

        $result = $this->reportRepo->getAllPayload([], $perPage);
        $data = $result['data']; // Ambil data dari hasil payload
        return view('admin.report.index')->with('data', $data);
    }


    // public function index()
    // {
    //     $data = $this->reportRepo->getAllPayload([]);
    //     return view('admin.report.index')->with('data', $data['data']);
    // }

    public function getAllData()
    {
        $result = $this->reportRepo->getAllPayload([]);

        return response()->json($result, $result['code']);
    }

    public function getDataById(int $id)
    {
        $result = $this->reportRepo->getPayloadById($id);

        return response()->json($result, $result['code']);
    }

    public function upsertData(ReportRequest $request)
    {
        $id = $request->id | null;
        $result = $this->reportRepo->upsertPayload($id, $request->all());

        return response()->json($result, $result['code']);
    }

    public function deleteData(int $id)
    {
        $result  = $this->reportRepo->deletePayload($id);
        return response()->json($result, $result['code']);
    }
}
