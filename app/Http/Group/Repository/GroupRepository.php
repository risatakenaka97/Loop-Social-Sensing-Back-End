<?php

namespace App\Http\Group\Repository;


use App\Http\Group\Model\Group;
use Illuminate\Database\Eloquent\Collection;

class GroupRepository implements GroupInterface {

    /**
     * @inheritDoc
     */
    public function get($id) : Group
    {
        return Group::find($id);
    }

    /**
     * @inheritDoc
     */
    public function all() : Collection
    {
        return Group::orderBy('updated_at', 'desc')->get();
    }

    /**
     * @inheritDoc
     */
    public function delete($id) : void
    {
        Group::find(!is_array($id) ? [$id] : $id)
            ->each
            ->delete();
    }

    /**
     * @inheritDoc
     */
    public function update($id, array $data) : Group
    {
        $this->get($id)->update($data);
    }

    /**
     * @inheritDoc
     */
    public function create($data) : Group
    {
        $group = Group::create($data);
        $group->administrator->update([
            'group_id' => $group->id
        ]);
        return $group;
    }
}
