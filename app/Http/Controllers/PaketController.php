<?php

namespace App\Http\Controllers;

use App\Contracts\LaundryContract;
use App\Contracts\PaketContract;
use App\Http\Requests\PaketRequest;
use App\Models\Laundry;
use App\Repositories\LaundryRepository;
use App\Repositories\PaketRepository;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    private Laundry $laundryModel;
    private PaketContract $paketRepo;
    public function __construct()
    {
        $this->laundryModel = new Laundry();
        $this->paketRepo = new PaketRepository;
    }

    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 5);

        $result = array(
            'laundry' => $this->laundryModel->all(),
            'paket' => $this->paketRepo->getAllPayload([], $perPage)['data']
        );
        $data = $result;
        return view('admin.paket.index')->with('data', $data);
    }

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
