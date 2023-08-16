<?php

namespace App\Repositories;

use App\Contracts\LaundryContract;
use App\Models\Laundry;
use App\Traits\HttpResponseModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class LaundryRepository implements LaundryContract
{
    use HttpResponseModel;

    private Laundry $laundryModel;
    public function __construct()
    {
        $this->laundryModel = new Laundry();
    }
    public function getAllPayload(array $payload)
    {
        try {

            $data = $this->laundryModel->all();

            return $this->success($data, "success getting data");
        } catch (\Throwable $th) {

            return $this->error($th->getMessage(), 500, $th, class_basename($this), __FUNCTION__);
        }
    }

    public function getPayloadById(int $id)
    {
        try {

            $find = $this->laundryModel->whereId($id)->first();

            if (!$find) {
                return $this->error('laundry not found', 404);
            }

            return $this->success($find, "success getting data");
        } catch (\Throwable $th) {

            return $this->error($th->getMessage(), 500, $th, class_basename($this), __FUNCTION__);
        }
    }

    public function upsertPayload($id, array $payload)
    {
        try {

            if ($id) {

                $find = $this->getPayloadById($id);

                if ($find['code'] !== 200) {
                    return $find;
                }

                $payload['updated_at'] = Carbon::now();

                $result = [
                    'data' => $this->laundryModel->whereId($id)->update($payload),
                    'message' => 'Updated data successfully'
                ];
            } else {

                $result = [
                    'data' => $this->laundryModel->create($payload),
                    'message' => 'Created data successfully'
                ];
            }

            return $this->success($result['data'], $result['message']);
        } catch (\Throwable $th) {

            return $this->error($th->getMessage(), 500, $th, class_basename($this), __FUNCTION__);
        }
    }

    public function deletePayload(int $id)
    {
        try {

            $find = $this->getPayloadById($id);

            if ($find['code'] != 200) {
                return $find;
            }

            $data = $this->laundryModel->whereId($id)->delete();

            return $this->success($data, "success deleting data");
        } catch (\Throwable $th) {

            return $this->error($th->getMessage(), 500, $th, class_basename($this), __FUNCTION__);
        }
    }
}
