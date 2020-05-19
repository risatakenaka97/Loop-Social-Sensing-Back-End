<?php

namespace App\Http\Organization\Controller;

use App\Http\Organization\Repository\OrganizationInterface;
use App\Http\Organization\Request\OrganizationStoreRequest;
use Illuminate\Http\JsonResponse;
use Laravel\Lumen\Routing\Controller;

class OrganizationController extends Controller {

    protected OrganizationInterface $organization;

    /**
     * GroupController constructor.
     *
     * @param OrganizationInterface $organization
     */
    public function __construct(OrganizationInterface $organization)
    {
        $this->organization = $organization;
    }

    /**
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        return response()->json($this->organization->all());
    }

    /**
     * @param OrganizationStoreRequest $request
     *
     * @return JsonResponse
     */
    public function store(OrganizationStoreRequest $request) : JsonResponse
    {
        return response()->json(
            $this->organization->create($request->json()->all()),
            200
        );
    }
}
