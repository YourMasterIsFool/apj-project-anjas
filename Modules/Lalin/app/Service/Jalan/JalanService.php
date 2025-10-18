<?php


namespace Modules\Lalin\app\Service\Jalan;

use App\Data\Request\PaginationRequest;
use Modules\Lalin\app\Data\Jalan\Request\CreateJalanRequestData;
use Modules\Lalin\app\Service\Jalan\Command\CreateJalanService;
use Modules\Lalin\app\Service\Jalan\Command\DeleteJalanService;
use Modules\Lalin\app\Service\Jalan\Command\UpdateJalanService;
use Modules\Lalin\app\Service\Jalan\Query\DetailJalanService;
use Modules\Lalin\app\Service\Jalan\Query\GetListJalanService;


class JalanService
{

    public function __construct(
        public GetListJalanService $getListJalanService,
        public CreateJalanService $create_jalan_service,
        private DetailJalanService $detail_jalan_service,
        private UpdateJalanService $update_jalan_service,
        private DeleteJalanService $delete_jalan_service,
    ) {}

    public function get_list_jalan(PaginationRequest $request)
    {
        return $this->getListJalanService->execute($request);
    }

    public function create_jalan(CreateJalanRequestData $data)
    {
        return $this->create_jalan_service->execute($data);
    }

    public function detail($id)
    {
        return $this->detail_jalan_service->execute($id);
    }

    public function update($id, CreateJalanRequestData $data)
    {

        return $this->update_jalan_service->execute($id, $data);
    }
    public function delete($id)
    {
        return $this->delete_jalan_service->execute($id);
    }
}
