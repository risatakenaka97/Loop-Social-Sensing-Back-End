<?php

namespace App\Http\Group\Repository;

use App\Http\Group\Model\Group;
use Illuminate\Database\Eloquent\Collection;

interface GroupInterface {
    /**
     * Get's a organization by it's ID
     *
     * @param int|array
     *
     * @return Group
     */
    public function get($id) : Group;

    /**
     * Get's all organizations.
     *
     * @return mixed
     */
    public function all() : Collection;

    /**
     * Deletes a organization.
     *
     * @param int
     */
    public function delete($id) : void;

    /**
     * Updates a $organization.
     *
     * @param int
     * @param array
     *
     * @return Group
     */
    public function update($id, array $data) : Group;

    /**
     * Create a organization.
     *
     * @param array
     *
     * @return Group
     */
    public function create($data) : Group;

}
