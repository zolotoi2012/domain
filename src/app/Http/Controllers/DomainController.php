<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\QueryService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class DomainController extends Controller
{
    /**
     * @param Request $request
     * @param QueryService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request, QueryService $service): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validate([
            "name" => "string|required",
        ]);

        $response = $service->buildQuery($validatedData);

        return response()->json([$response->getQuery()->paginate(10)], ResponseAlias::HTTP_OK);
    }
}
