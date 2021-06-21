<?php

declare(strict_types=1);

namespace App\Controller;

use App\Common\Converters\Types\Common\ToJsonConverter;
use App\Common\Merchant\Factory\MerchantGoodFactory;
use App\Service\Good\ServiceDecorator;
use App\Service\ResolverInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MerchantController extends BaseController
{
    public function __construct(
        protected ToJsonConverter $jsonConverter,
        private MerchantGoodFactory $merchantGoodFactory,
        private ServiceDecorator $service
    ) {
        parent::__construct($this->jsonConverter);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function getMerchant(Request $request, string $sku): Response
    {
        $dto = $this->buildInternalRequest(
            operation: ResolverInterface::OPERATION_GET_ONE,
            sku: $sku
        );

        $result = $this->service->behave($dto)->getResult();
        return new Response($this->jsonConverter->convert($result), Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function getMerchantGoodsList(Request $request): Response
    {
        $dto = $this->buildInternalRequest(
            operation: ResolverInterface::OPERATION_GET_LIST
        );
        $result = $this->service->behave($dto)->getResult();

        return new Response($this->jsonConverter->convert($result), Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function createMerchantGood(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $goodModel = $this->merchantGoodFactory->getGoodModel($data);

        $dto = $this->buildInternalRequest(
            operation: ResolverInterface::OPERATION_CREATE,
            model: $goodModel
        );
        $result = $this->service->behave($dto)->getResult();

        return new Response($this->jsonConverter->convert($result), Response::HTTP_CREATED);
    }

    /**
     * @Route("/merchant/{sku}", name="update_merchant")
     * @param Request $request
     * @param string $sku
     * @return Response
     */
    public function updateMerchantGood(Request $request, string $sku): Response
    {
        $data = json_decode($request->getContent(), true);
        $goodModel = $this->merchantGoodFactory->getGoodModel($data);

        $dto = $this->buildInternalRequest(
            operation: ResolverInterface::OPERATION_UPDATE,
            model: $goodModel,
            sku: $sku
        );
        $this->service->behave($dto)->getResult();

        return new Response(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/merchant/{sku}", name="remove_good")
     * @param Request $request
     * @param string $sku
     * @return Response
     */
    public function removeGood(Request $request, string $sku): Response
    {
        $dto = $this->buildInternalRequest(
            operation: ResolverInterface::OPERATION_DELETE,
            sku: $sku
        );
        $this->service->behave($dto)->getResult();

        return new Response(null, Response::HTTP_OK);
    }
}
