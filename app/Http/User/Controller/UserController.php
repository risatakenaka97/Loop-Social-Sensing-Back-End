<?php

namespace App\Http\User\Controller;

use App\Http\User\Repository\UserInterface;
use App\Http\User\Request\UserLoginRequest;
use App\Http\User\Request\UserStoreRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Lumen\Http\Request;
use Laravel\Lumen\Routing\Controller;

class UserController extends Controller {

    protected UserInterface $user;

    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    /**
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        return response()->json($this->user->all());
    }

    /**
     *
     * @param UserStoreRequest $request
     *
     */
    public function store(UserStoreRequest $request)
    {
        $this->user->create($request->json()->all());
    }

    /**
     * login user
     *
     * @param UserLoginRequest $request
     *
     * @return JsonResponse
     */
    public function login(UserLoginRequest $request) : JsonResponse
    {
        $credentials = $request->only(['email', 'password']);

        if(!$token = Auth::attempt($credentials)){
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        if (!Auth::user()->approved) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return response()->json($this->user->tokenArray($token));
    }

    /**
     * Get info about user
     *
     * @param $id
     *
     * @return JsonResponse
     */
    public function info($id) : JsonResponse
    {
        return response()->json($this->user->get($id));
    }

    /**
     * @param Request $request
     * @param int     $id
     */
    public function updateUser(Request $request, $id = NULL) : void
    {
        $userInfo = $request->json()->all();
        $this->user->update($id ?? Auth::id(), $userInfo);
    }
}
