<?php

namespace App\Http\Controllers;

use App\Contracts\MemberContract;
use App\Http\Requests\MemberRequest;
use App\Repositories\MemberRepository;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    private MemberContract $memberRepo;
    public function __construct()
    {
        $this->memberRepo = new MemberRepository;
    }

    public function getAllData()
    {
        $result = $this->memberRepo->getAllPayload([]);

        return response()->json($result, $result['code']);
    }

    public function getDataById(int $id)
    {
        $result = $this->memberRepo->getPayloadById($id);

        return response()->json($result, $result['code']);
    }

    public function upsertData(MemberRequest $request)
    {
        $id = $request->id | null;
        $result = $this->memberRepo->upsertPayload($id, $request->all());

        return response()->json($result, $result['code']);
    }

    public function deleteData(int $id)
    {
        $result  = $this->memberRepo->deletePayload($id);
        return response()->json($result, $result['code']);
    }
}
