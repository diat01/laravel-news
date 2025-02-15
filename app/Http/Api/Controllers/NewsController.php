<?php

namespace App\Http\Api\Controllers;

use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Get (
 *     path="/api/news",
 *     tags={"News"},
 *     summary="Get all news paginated",
 *     @OA\Parameter (ref="#/components/parameters/page"),
 *     @OA\Response (
 *      response="200",
 *      description="success",
 *      @OA\JsonContent (
 *          @OA\Property (property="success", type="boolean", example="true"),
 *          @OA\Property (
 *              property="data",
 *              type="array",
 *              collectionFormat="multi",
 *              @OA\Items (
 *                  @OA\Property (property="data", type="array", collectionFormat="multi", @OA\Items(ref="#/components/schemas/NewsDataResource")),
 *                  @OA\Property (property="current_page", type="int"),
 *                  @OA\Property (property="first_page_url", type="string"),
 *                  @OA\Property (property="from", type="int"),
 *                  @OA\Property (property="last_page", type="int"),
 *                  @OA\Property (property="last_page_url", type="string"),
 *                  @OA\Property (property="next_page_url", type="string"),
 *                  @OA\Property (property="path", type="string"),
 *                  @OA\Property (property="per_page", type="int"),
 *                  @OA\Property (property="prev_page_url", type="string"),
 *                  @OA\Property (property="to", type="int"),
 *                  @OA\Property (property="total", type="int"),
 *                  @OA\Property (property="links", type="array", collectionFormat="multi", @OA\Items(ref="#/components/schemas/pagination_links"))
 *              )
 *         )
 *      )
 *     )
 * )
 */
class NewsController extends Controller
{
    public function index(): JsonResponse
    {
        $news = News::latest()->paginate();

        return $this->response(NewsResource::collection($news)->resource);
    }
}
