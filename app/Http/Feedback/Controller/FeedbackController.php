<?php

namespace App\Http\Feedback\Controller;

use App\Http\Feedback\Repository\FeedbackInterface;
use App\Http\Feedback\Request\FeedbackStoreRequest;
use Illuminate\Http\JsonResponse;
use Laravel\Lumen\Routing\Controller;

class FeedbackController extends Controller {

    protected FeedbackInterface $feedback;

    /**
     * GroupController constructor.
     *
     * @param FeedbackInterface $feedback
     */
    public function __construct(FeedbackInterface $feedback)
    {
        $this->feedback = $feedback;
    }

    /**
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        return response()->json($this->feedback->all());
    }

    /**
     * @param FeedbackStoreRequest $request
     *
     * @return void
     */
    public function store(FeedbackStoreRequest $request)
    {
        $this->feedback->create($request->json()->all());
    }
}
