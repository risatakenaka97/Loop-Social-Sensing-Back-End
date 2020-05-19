<?php

namespace App\Http\Organization\Repository;


use App\Http\Organization\Model\Organization;
use Illuminate\Database\Eloquent\Collection;

class OrganizationRepository implements OrganizationInterface {

    /**
     * @inheritDoc
     */
    public function get($id) : Organization
    {
        return Organization::find($id);
    }

    /**
     * @inheritDoc
     */
    public function all() : Collection
    {
        return Organization::orderBy('updated_at', 'desc')->get();
    }

    /**
     * @inheritDoc
     */
    public function delete($id) : void
    {
        Organization::find(!is_array($id) ? [$id] : $id)
            ->each
            ->delete();
    }

    /**
     * @inheritDoc
     */
    public function update($id, array $data) : Organization
    {
        $this->get($id)->update($data);
    }

    /**
     * @inheritDoc
     */
    public function create($data) : Organization
    {
        $organization = Organization::create($data);
        $organization->administrator->update([
            'organization_id' => $organization->id
        ]);
        return $organization;
    }
}
