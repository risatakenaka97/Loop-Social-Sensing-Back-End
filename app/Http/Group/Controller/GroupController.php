<?php

namespace App\Http\Group\Controller;

use App\Http\Group\Repository\GroupInterface;
use App\Http\Group\Request\GroupStoreRequest;
use Illuminate\Http\JsonResponse;
use Laravel\Lumen\Routing\Controller;

class GroupController extends Controller {

    protected GroupInterface $group;

    /**
     * GroupController constructor.
     *
     * @param GroupInterface $group
     */
    public function __construct(GroupInterface $group)
    {
        $this->group = $group;
    }

    /**
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        return response()->json($this->group->all());
    }

    /**
     * @param GroupStoreRequest $request
     *
     * @return JsonResponse
     */
    public function store(GroupStoreRequest $request) : JsonResponse
    {
        return response()->json(
            $this->group->create($request->json()->all()),
            200
        );
    }
}
