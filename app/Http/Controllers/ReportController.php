<?php

namespace App\Http\Controllers;

use App\Contracts\ReportContract;
use App\Http\Requests\ReportRequest;
use App\Models\Member;
// use App\Models\Report;
use App\Repositories\ReportRepository;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    private Member $memberModel ;
    private ReportContract $reportRepo;
    public function __construct()
    {
        $this->memberModel = new Member() ;
        $this->reportRepo = new ReportRepository;
    }


    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 5);

        $result = array(
            'member' => $this->memberModel->all(),
            'report' => $this->reportRepo->getAllPayload([], $perPage)['data']
        );
        $data = $result;
        return view('admin.report.index')->with('data', $data);
    }

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
