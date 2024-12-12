<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enum\EntityType;
use App\Services\DataProviderInterface;
use App\Services\Registry;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Request;

final class SearchController extends Controller
{
    public function __construct(private readonly Registry $requestRegistry)
    {
    }
    /**
     * @param EntityType $entityType
     * @param Request $request
     * @param DataProviderInterface $service
     * @return \Illuminate\Support\Collection
     */
    public function search(EntityType $entityType, Request $request, DataProviderInterface $service): Collection
    {
        /** @var FormRequest $req */
        $req = $this->requestRegistry->get($entityType->value);

        try {
            $request->validate($req->rules());
        } catch (ValidationException $exception) {
            return collect($exception->errors());
        } catch (\Throwable $exception) {
            return collect($exception->getMessage());
        }

        return $service->getDataByFilters($entityType, $request);
    }
}
