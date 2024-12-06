<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\QueryService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class DomainController extends Controller
{
    public function index(Request $request, QueryService $service, string $name): \Illuminate\Http\JsonResponse
    {
        $response = $service->buildQuery($request->all(), $name);

        return response()->json([$response->getQuery()->paginate(10)], ResponseAlias::HTTP_OK);
    }
}
