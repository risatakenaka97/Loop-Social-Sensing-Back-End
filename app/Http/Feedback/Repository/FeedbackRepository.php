<?php

namespace App\Http\Feedback\Repository;

use App\Http\Feedback\Model\Feedback;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class FeedbackRepository implements FeedbackInterface {

    /**
     * @inheritDoc
     */
    public function get($id) : Feedback
    {
        $id = !is_array($id) ? [$id] : $id;
        $review = Feedback::find($id);
        if (count($review) === 0) {
            throw new NotFoundHttpException("Not found");
        }
        return $review;
    }

    /**
     * @inheritDoc
     */
    public function all() : Collection
    {
        return Feedback::orderBy('updated_at', 'desc')->get();
    }

    /**
     * @inheritDoc
     */
    public function delete($id) : void
    {
        $reviews = $this->get($id);
        foreach($reviews as $review) {
            $review->each->delete();
        }
    }

    /**
     * @inheritDoc
     */
    public function update($id, array $data) : void
    {
        $reviews = $this->get($id);
        foreach($reviews as $review) {
            $review->update($data);
        }
    }

    /**
     * @inheritDoc
     */
    public function create($data) : void
    {
        $review = Feedback::create($data);
        $review->feedback()->create($review->toArray());
    }
}
