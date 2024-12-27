<?php

namespace App\Services\Auth\Client\Registers\Services;

use App\Models\User;
use App\Repositories\Auth\Client\Registers\Interfaces\RegisterInterface;
use App\Services\Auth\Client\Registers\Interfaces\RegisterServiceInterface;
use App\Services\Base\BaseService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class RegisterService extends BaseService implements RegisterServiceInterface
{
    public function getRepository()
    {
        return RegisterInterface::class;
    }

    public function create(&$request)
    {
        $data = [
            'role_id' => 0,
            'city_id' => $request->city_id,
            'name' => $request->name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date_birth' => Carbon::createFromFormat('d-m-Y', $request->date_birth)->format('Y-m-d'),
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
            'type' => User::TYPE_MEMBER,
            'membership_level' => 'member',
            'is_terms_accepted' => $request->is_terms_accepted ?? 0,
            'is_subscribed_promotions' => $request->is_subscribed_promotions ?? 0
        ];

        return $this->repository->create($data);
    }
}
