<?php

namespace App\Http\User\Repository;

use App\Http\User\Model\User;
use Illuminate\Database\Eloquent\Collection;

interface UserInterface {
    /**
     * Get's a user by it's ID
     *
     * @param int|array
     *
     * @return User
     */
    public function get($id) : User;

    /**
     * Get's all users.
     *
     * @return mixed
     */
    public function all() : Collection;

    /**
     * Deletes a user.
     *
     * @param int
     */
    public function delete($id) : void;

    /**
     * Updates a $user.
     *
     * @param int
     * @param array
     *
     * @return User
     */
    public function update($id, array $data) : User;

    /**
     * Create a user.
     *
     * @param array
     *
     * @return User
     */
    public function create($data) : User;

}
