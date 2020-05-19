<?php

namespace App\Http\Feedback\Repository;

use App\Http\Feedback\Model\Feedback;
use Illuminate\Database\Eloquent\Collection;

interface FeedbackInterface {
    /**
     * Get's a organization by it's ID
     *
     * @param int|array
     *
     * @return Feedback|null
     */
    public function get($id) : Feedback;

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
     * @return void
     */
    public function update($id, array $data) : void;

    /**
     * Create a organization.
     *
     * @param array
     *
     * @return void
     */
    public function create($data) : void ;

}
