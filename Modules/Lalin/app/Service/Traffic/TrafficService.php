<?php


namespace Modules\Lalin\app\Service\Traffic;

use App\Data\Request\PaginationRequest;
use App\Exports\TrafficExport;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Lalin\app\Data\Traffic\Request\CreateTrafficRequestData;
use Modules\Lalin\app\Service\Traffic\Command\CreateTrafficService;
use Modules\Lalin\app\Service\Traffic\Command\DeleteTrafficService;
use Modules\Lalin\app\Service\Traffic\Command\UpdateTrafficService;
use Modules\Lalin\app\Service\Traffic\Query\DetailTrafficService;
use Modules\Lalin\app\Service\Traffic\Query\GetListTrafficService;
use Modules\Lalin\enum\TrafficType;

class TrafficService
{

    public function __construct(
        public GetListTrafficService $getListTrafficService,
        public CreateTrafficService $create_traffic_service,
        private DetailTrafficService $detail_traffic_service,
        private UpdateTrafficService $update_traffic_service,
        private DeleteTrafficService $delete_traffic_service,
    ) {}

    public function get_list_traffic(PaginationRequest $request, TrafficType $type)
    {
        return $this->getListTrafficService->execute($request, $type);
    }

    public function create_traffic(CreateTrafficRequestData $data, TrafficType $type)
    {
        return $this->create_traffic_service->execute($data, $type);
    }

    public function detail($id)
    {
        return $this->detail_traffic_service->execute($id);
    }

    public function update($id, CreateTrafficRequestData $data)
    {

        return $this->update_traffic_service->execute($id, $data);
    }
    public function delete($id)
    {
        return $this->delete_traffic_service->execute($id);
    }

    public function export(?PaginationRequest $pagination, TrafficType $type, string $title = "traffic")
    {

        $filename = 'data_' . $title . date('Y_m_d_His');
        $export_data = $this->getListTrafficService->execute($pagination, $type, true);
        return Excel::download(
            new TrafficExport($export_data),
            $filename . '.xlsx',
            \Maatwebsite\Excel\Excel::XLSX // jangan pakai string typo
        );
    }
}
