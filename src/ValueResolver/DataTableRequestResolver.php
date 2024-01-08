<?php

namespace App\ValueResolver;

use App\DTO\Request\DataTableRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;

class DataTableRequestResolver implements ValueResolverInterface
{
    public function supports(Request $request, ArgumentMetadata $argumentMetadata)
    {
        return $argumentMetadata->getType() === DataTableRequest::class;
    }

    public function resolve(Request $request, ArgumentMetadata $argument): iterable
    {
        $queryParameter = $request->query->all();
        if ($this->supports($request, $argument)) {
            yield new DataTableRequest(
                $queryParameter['draw'] ?? null,
                $queryParameter['start'] ?? 0,
                $queryParameter['length'] ?? DataTableRequest::MAX_RESULTS,
                $queryParameter['columns'] ?? null,
                $queryParameter['order'] ?? null
            );
        }
    }
}
