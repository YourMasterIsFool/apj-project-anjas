<?php


namespace Modules\Lalin\app\Service\Apj;

use App\Data\Request\PaginationRequest;
use Modules\Lalin\app\Data\Apj\Request\CreateApjRequestData;
use Modules\Lalin\app\Service\Apj\Command\CreateApjService;
use Modules\Lalin\app\Service\Apj\Command\DeleteApjService;
use Modules\Lalin\app\Service\Apj\Command\UpdateApjService;
use Modules\Lalin\app\Service\Apj\Query\DetailApjService;
use Modules\Lalin\app\Service\Apj\Query\GetListApjService;


class ApjService
{

    public function __construct(
        public GetListApjService $getListApjService,
        public CreateApjService $create_apj_service,
        private DetailApjService $detail_apj_service,
        private UpdateApjService $update_apj_service,
        private DeleteApjService $delete_apj_service,
    ) {}

    public function get_list_apj(PaginationRequest $request)
    {
        return $this->getListApjService->execute($request);
    }

    public function create_apj(CreateApjRequestData $data)
    {
        return $this->create_apj_service->execute($data);
    }

    public function detail($id)
    {
        return $this->detail_apj_service->execute($id);
    }

    public function update($id, CreateApjRequestData $data)
    {

        return $this->update_apj_service->execute($id, $data);
    }
    public function delete($id)
    {
        return $this->delete_apj_service->execute($id);
    }
}
