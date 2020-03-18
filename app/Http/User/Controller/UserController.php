<?php

namespace App\Http\User\Controller;

use App\Http\User\Repository\UserInterface;
use App\Http\User\Request\UserLoginRequest;
use App\Http\User\Request\UserStoreRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Lumen\Routing\Controller;

class UserController extends Controller {

    protected $user;

    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    /**
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json($this->user->all());
    }

    /**
     *
     * @param UserStoreRequest $request
     *
     * @return JsonResponse
     */
    public function register(UserStoreRequest $request)
    {
        return response()->json($this->user->create($request->json()->all()), 200);
    }

    public function login(UserLoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if(!$token = Auth::attempt($credentials)){
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'Bearer',
            'created_at' => time(),
            'expires_in' => Auth::factory()->getTTL() * 60,
        ], 200);
    }
}
