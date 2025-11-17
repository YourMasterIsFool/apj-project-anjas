<?php

namespace Modules\Lalin\Http\Controllers;

use App\Data\Request\PaginationRequest;
use App\Helper\ResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Modules\Lalin\app\Data\Traffic\Request\CreateTrafficRequestData;
use Modules\Lalin\app\Service\Jalan\JalanService;
use Modules\Lalin\app\Service\Traffic\TrafficService;
use Modules\Lalin\enum\TrafficType;

class WarningController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    use ResponseTrait;
    public function __construct(
        private TrafficService $service,
        private JalanService $jalan_service

    ) {}
    public function index(Request $request)
    {

        $params = PaginationRequest::from($request);
        $data = $this->service->get_list_traffic($params, TrafficType::Warning);
        // Controller
        return Inertia::render('lalin/warning/pages/Index', [
            "data" => $data,
            "list_jalan" => $this->jalan_service->get_list_jalan()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        $list_jalan = $this->jalan_service->get_list_jalan();
        return Inertia::render(
            'lalin/warning/pages/Form',
            [
                "lamp_types" => LAMP_TYPES,
                'list_jalan' => $list_jalan
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd("test");
        $validation = CreateTrafficRequestData::from($request);
        $created = $this->service->create_traffic($validation, TrafficType::Warning);
        return redirect()->route("warning.index")->with("success", "Data Berhasil di buat");
    }

    /**
     * Show the specified resource.
     */
    public function show($id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $data = $this->service->detail($id);
        $list_jalan = $this->jalan_service->get_list_jalan();
        return Inertia::render("lalin/warning/pages/Form", [
            "data" => $data,
            'list_jalan' => $list_jalan,
            "lamp_types" => LAMP_TYPES,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validation = CreateTrafficRequestData::from($request);
        $created = $this->service->update($id, $validation);

        return redirect()->route("warning.index")->with("success", "Data Berhasil update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = $this->service->delete($id);
        return redirect()->route("warning.index")->with("success", "Successfully delete data");
    }

    public function export(Request $request)
    {

        $params = PaginationRequest::from($request);
        return $this->service->export($params, TrafficType::Warning, "warning");
    }
}
