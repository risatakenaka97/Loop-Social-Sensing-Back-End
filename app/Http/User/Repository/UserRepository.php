<?php

namespace App\Http\User\Repository;


use App\Http\User\Model\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserInterface {

    /**
     * @inheritDoc
     */
    public function get($id) : User
    {
        return User::find($id);
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
    public function update($id, array $data) : User
    {
        $this->get($id)->update($data);
    }

    /**
     * @inheritDoc
     */
    public function create($data) : User
    {
        return User::create($data);
    }
}
