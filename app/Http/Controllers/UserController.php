<?php

namespace App\Http\Controllers;

use App\Contracts\UserContract;
use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use App\Models\User; // Pastikan namespace dan model yang digunakan sesuai
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;

class UserController extends Controller
{
    private UserContract $userRepo;
    public function __construct()
    {
        $this->userRepo = new UserRepository;
    }

    public function index()
    {
        $result = $this->userRepo->getAllPayload([]); // Mengambil data dari payload
        $data = $result['data']; // Ambil data dari hasil payload
        return view('admin.user.index', compact('data'));
    }

    public function getAllData()
    {
        $result = $this->userRepo->getAllPayload([]);

        return response()->json($result, $result['code']);
    }

    public function getDataById(int $id)
    {
        $result = $this->userRepo->getPayloadById($id);

        return response()->json($result, $result['code']);
    }

    public function upsertData(UserRequest $request)
    {
        $id = $request->id | null;
        $result = $this->userRepo->upsertPayload($id, $request->all());

        return response()->json($result, $result['code']);
    }

    public function deleteData(int $id)
    {
        $result  = $this->userRepo->deletePayload($id);
        return response()->json($result, $result['code']);
    }

    // seacrs
    
    // andsearcs
}
