<?php

namespace App\Http\User\Repository;


use App\Http\User\Model\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserInterface {

    /**
     * @inheritDoc
     */
    public function get($id) : User
    {
        return User::findorFail($id);
    }

    /**
     * @inheritDoc
     */
    public function all() : Collection
    {
        return User::orderBy('updated_at', 'desc')->get();
    }

    /**
     * @inheritDoc
     */
    public function delete($id) : void
    {
        User::find(!is_array($id) ? [$id] : $id)
            ->each
            ->delete();
    }

    /**
     * @inheritDoc
     */
    public function update($id, array $data) : void
    {
        $user = $this->get($id);
        $user->update($data);
    }

    /**
     * @inheritDoc
     */
    public function create($data) : void
    {
        User::create($data);
    }

    /**
     * @inheritDoc
     */
    public function tokenArray(string $token) : array
    {
        $user = Auth::user();
        $organization = Auth::user()->organization;
        return [
            'token' => $token,
            'token_type' => 'Bearer',
            'created_at' => time(),
            'expires_in' => Auth::factory()->getTTL() * env('JWT_TTL', 60),
            'first_entrance' => $user->first_entrance,
            'organization' => $organization,
            'admin' => $organization->user_id === Auth::id(),
            'name' => $user->firstName
        ];
    }

}
