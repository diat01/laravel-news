<?php

namespace App\Http\Api\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *   version="v1",
 *   title="Laravel News API Documentation",
 *   description="Swagger doc for Laravel News",
 *   @OA\License(
 *     name="Apache 2.0",
 *     url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *   )
 * )
 * @OA\Server(
 *   url=L5_SWAGGER_CONST_HOST,
 *   description="Laravel News API Server"
 * )
 * @OA\Parameter(
 *   parameter="per_page",
 *   in="query",
 *   name="per_page",
 *   description="Per page number for pagination",
 *   @OA\Schema(
 *     type="int",
 *     default=15
 *   )
 * ),
 * @OA\Parameter(
 *   parameter="page",
 *   in="query",
 *   name="page",
 *   description="Page number for pagination",
 *   @OA\Schema(
 *     type="int",
 *     default=1
 *   )
 * ),
 * @OA\Schema (
 *     schema="pagination_links",
 *     description="Pagination links",
 *     @OA\Property (property="url", type="string"),
 *     @OA\Property (property="label", type="string"),
 *     @OA\Property (property="active", type="boolean")
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function response($data = [], $status = 200, array $headers = [], $options = 0): JsonResponse
    {
        $data = [
            'success' => true,
            'data'    => $data
        ];

        return response()
            ->json($data, $status, $headers, $options);
    }
}
