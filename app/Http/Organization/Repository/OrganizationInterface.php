<?php

namespace App\Http\Organization\Repository;

use App\Http\Organization\Model\Organization;
use Illuminate\Database\Eloquent\Collection;

interface OrganizationInterface {
    /**
     * Get's a organization by it's ID
     *
     * @param int|array
     *
     * @return Organization
     */
    public function get($id) : Organization;

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
     * @return Organization
     */
    public function update($id, array $data) : Organization;

    /**
     * Create a organization.
     *
     * @param array
     *
     * @return Organization
     */
    public function create($data) : Organization;

}
