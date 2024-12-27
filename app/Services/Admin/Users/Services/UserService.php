<?php

namespace App\Services\Admin\Users\Services;

use App\Repositories\Admin\Users\Interfaces\UserInterface;
use App\Repositories\Admin\Users\Repositories\UserRepository;
use App\Services\Admin\Users\Interfaces\UserServiceInterface;
use App\Services\Base\BaseService;
use App\Traits\RemoveImageTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Hash;

class UserService extends BaseService implements UserServiceInterface
{
    use StorageImageTrait, RemoveImageTrait;

    public function getRepository()
    {
        return UserInterface::class;
    }
    public function filter($request){
        return $this->repository->filter($request);
    }
    public function create(&$request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id ?? null,
            'cinema_id' => $request->cinema_id ?? null,
            'type' => $request->type,
            'is_terms_accepted' => 1,
            'is_subscribed_promotions' => 0
        ];

        // Xử lý upload ảnh nếu có
        $imageUploadData = $this->storageTraitUpload($request, 'image', 'public/users');

        if ($imageUploadData) {
            $data['image'] = $imageUploadData['path'];
        }

        $this->repository->create($data);

        return true;
    }

    public function update(&$request, $id)
    {
        $user = $this->repository->find($id);

        if (!$user) {
            return redirect()->route('admin.users.index')->with('status_failed', 'Không tìm thấy người dùng');
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'password' => $request->new_password ? Hash::make($request->new_password) : $user->password,
            'role_id' => $request->role_id ?? null,
            'cinema_id' => $request->cinema_id ?? null,
            'type' => $request->type,
            'is_terms_accepted' => 1,
            'is_subscribed_promotions' => 0
        ];

        if($request->hasFile('image')) {
            $this->existImage($user, 'image', 'users');

            $imageUploadData = $this->storageTraitUpload($request, 'image', 'public/users');

            $data['image'] = $imageUploadData['path'];
        }

        $this->repository->update($id, $data);

        return true;
    }

    public function changeStatus($request)
    {
        $user = $this->repository->find($request->id);

        if (!$user) {
            return redirect()->route('admin.users.index')->with('status_failed', 'Không tìm thấy người dùng');
        }

        $user->update([
            'status' => $user->status == 1 ? 0 : 1
        ]);

        return $user;
    }
}
