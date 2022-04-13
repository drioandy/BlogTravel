<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService
{

    public function getByWeek()
    {
        $items = DB::table('users')
            ->where('role_id',2)
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();
        return $items;
    }
    public function getUrlKeyByField($field)
    {
        $milliseconds = round(microtime(true) * 1000);
        $urlKey = $milliseconds . "-" . str_slug($field, '-');
        return $urlKey;
    }

    public function getListUser($request ,$roleId, $perPage)
    {
        $keyword = $request['keyword'];
        if (isset($keyword)) {
            $users = User::where('email', 'like', '%' . $keyword . '%')->where('role_id', $roleId)->paginate($perPage);
            return $users;
        }
        $users = User::where('role_id', $roleId)->paginate($perPage);
        return $users;
    }

    public function storeAccount($request,$roleId)
    {
        if ($request->hasFile('avatar')) {
            $imageName = $request->file('avatar')->getClientOriginalName();
            $filename = pathinfo($imageName, PATHINFO_FILENAME);
            $extension = pathinfo($imageName, PATHINFO_EXTENSION);
            $avatarName = $filename . time() . '-' . $filename . '.' . $extension;
            $request->file('avatar')->storeAs('public/image/users/avatar', $avatarName);
//            '/storage/image/posts/thumbnail/' .
            $avatar = $avatarName;
        } else {
            $avatar = 'user-default.png';
        }
        return User::create([
            'user_name' => $request->user_name,
            'email' => $request->email,
            'url_key' => $this->getUrlKeyByField($request->user_name),
            'avatar' => $avatar,
            'role_id' => $roleId,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'dob' => $request->dob,
        ]);

        $user->save();
    }

    public function findAccount($urlKey)
    {
//        \Request::is('admin/*')
        $user = User::where('url_key', $urlKey)->first();
        if (!$user) {
            return abort(404);
        }
        $user->avatar = '/storage/image/users/avatar/' . $user->avatar;
        return $user;
    }

    public function updateUser($request, $urlKey)
    {
        $user = User::where('url_key', $urlKey)->first();
        if (!$user) {
            return abort(404);
        }
        if ($request->hasFile('avatar')) {
            $imageName = $request->file('avatar')->getClientOriginalName();
            $filename = pathinfo($imageName, PATHINFO_FILENAME);
            $extension = pathinfo($imageName, PATHINFO_EXTENSION);
            $avatarName = $filename . time() . '-' . $filename . '.' . $extension;
            $request->file('avatar')->storeAs('public/image/users/avatar', $avatarName);
//            '/storage/image/posts/thumbnail/' .
            $avatar = $avatarName;
        } else {
            $avatar = $user->avatar;
        }
        $userData = [
            'user_name' => $request->user_name,
            'dob' => $request->dob,
            'avatar' => $avatar,
            'url_key' => $this->getUrlKeyByField($request->user_name),
            'gender' => $request->gender,

        ];
        $user->update($userData);
        if ($user->avatar) {
            $user->avatar = '/storage/image/users/avatar/' . $user->avatar;
        }
        return $user;
    }

    public function deleteUser($urlKey)
    {
        $user = User::where('url_key', $urlKey)->first();
        if (!$user) {
            return abort(404);
        }
        foreach ($user->comments as $comment ){
            $comment->delete();
        }
        foreach ($user->posts as $posts ){
            $posts->delete();
        }
        return $user->delete();
    }
}
