<?php

namespace Modules\Lalin\Http\Controllers;

use App\Data\Request\PaginationRequest;
use App\Helper\ResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Modules\Lalin\app\Data\Apj\Request\CreateApjRequestData;
use Modules\Lalin\app\Data\Apj\Request\GetListApjRequestData;
use Modules\Lalin\app\Service\Apj\ApjService;
use Modules\Lalin\app\Service\Jalan\JalanService;

class ApjController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    use ResponseTrait;
    public function __construct(
        private ApjService $service,
        private JalanService $jalan_service
    ) {}
    public function index(Request $request)
    {

        $params = GetListApjRequestData::from($request);
        $data = $this->service->get_list_apj($params);
        $list_jalan = $this->jalan_service->get_list_jalan();
        // Controller
        return Inertia::render('lalin/apj/pages/Index', [
            "data" => $data,
            "list_jalan" => $list_jalan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list_jalan = $this->jalan_service->get_list_jalan();
        return Inertia::render('lalin/apj/pages/Form', [
            "list_jalan" => $list_jalan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd("test");
        $validation = CreateApjRequestData::from($request);
        $created = $this->service->create_apj($validation);

        return redirect()->route("apj.index")->with("success", "Data Berhasil di buat");
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
        return Inertia::render("lalin/apj/pages/Form", [
            "data" => $data,
            "list_jalan" => $list_jalan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validation = CreateApjRequestData::from($request);
        $created = $this->service->update($id, $validation);

        return redirect()->route("apj.index")->with("success", "Data Berhasil update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = $this->service->delete($id);
        return redirect()->route("apj.index")->with("success", "Successfully delete data");
    }
    public function export(Request $request)
    {

        $params = GetListApjRequestData::from($request);
        return $this->service->export($params, "apj");
    }
}
