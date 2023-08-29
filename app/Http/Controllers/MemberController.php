<?php

namespace App\Http\Controllers;

use App\Contracts\MemberContract;
use App\Http\Requests\MemberRequest;
use App\Models\Laundry;
use App\Models\User;
use App\Repositories\MemberRepository;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    private Laundry $laundryModel;
    private User $userModel;
    private MemberContract $memberRepo;
    public function __construct()
    {
        $this->laundryModel = new Laundry();
        $this->userModel = new User();
        $this->memberRepo = new MemberRepository;
    }

    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 5); // Menentukan jumlah item per halaman

        $result = array(
            'laundry' => $this->laundryModel->all(),
            'user' => $this->userModel->all(),
            'member' => $this->memberRepo->getAllPayload([], $perPage)['data'],

        );
        $data = $result;
        return view('admin.member.index')->with('data', $data);
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
