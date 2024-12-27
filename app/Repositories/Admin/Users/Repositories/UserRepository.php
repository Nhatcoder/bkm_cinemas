<?php

namespace App\Repositories\Admin\Users\Repositories;

use App\Models\Role;
use App\Models\User;
use App\Repositories\Admin\Users\Interfaces\UserInterface;
use App\Repositories\Base\BaseRepository;
use App\Traits\RemoveImageTrait;

class UserRepository extends BaseRepository implements UserInterface
{
    use RemoveImageTrait;

    public function getModel()
    {
        return User::class;
    }

    public function filter($request)
    {
        $data = $this->model->newQuery();
        $data = $data->select('id', 'name', 'cinema_id', 'first_name', 'type','last_name', 'email', 'image', 'role_id', 'status')
            ->with('role');

        if ($request->name) {
            $data->whereRaw("concat(first_name, ' ', last_name) like ?", ['%' . $request->name . '%']);
            $data->orWhere('email', 'like', '%' . $request->name . '%');
        }
        if ($request->type) {
            $data->where("type", $request->type);
        }
        if (auth()->user()->cinema_id) {
            $data->where('cinema_id', auth()->user()->cinema_id);
        }
        if (!empty($request->cinema_id)) {
            $data->where('cinema_id', $request->cinema_id);
        }

        $data = $data->paginate(self::PAGINATION);
        return $data->appends([
            'name' => $request->name,
        ]);
    }
}
