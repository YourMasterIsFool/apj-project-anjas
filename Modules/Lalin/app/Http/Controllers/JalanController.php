<?php

namespace Modules\Lalin\Http\Controllers;

use App\Data\Request\PaginationRequest;
use App\Helper\ResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Modules\Lalin\app\Data\Jalan\Request\CreateJalanRequestData;
use Modules\Lalin\app\Service\Jalan\JalanService;

class JalanController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    use ResponseTrait;
    public function __construct(
        private JalanService $service
    ) {}
    public function index(Request $request)
    {

        $params = PaginationRequest::from($request);
        $data = $this->service->get_list_jalan($params);
        // Controller
        return Inertia::render('lalin/jalan/pages/Index', [
            "data" => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('lalin/jalan/pages/Form');
    }

    /**
     * Store a newly created resource in  storage.
     */
    public function store(Request $request)
    {
        $validation = CreateJalanRequestData::from($request);
        $created = $this->service->create_jalan($validation);

        return redirect()->route("jalan.index")->with("success", "Data Berhasil di buat");
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

        return Inertia::render("lalin/jalan/pages/Form", [
            "data" => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validation = CreateJalanRequestData::from($request);
        $created = $this->service->update($id, $validation);

        return redirect()->route("jalan.index")->with("success", "Data Berhasil update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = $this->service->delete($id);
        return redirect()->route("jalan.index")->with("success", "Successfully delete data");
    }

    public function export(Request $request)
    {

        $params = PaginationRequest::from($request);
        return $this->service->export($params);
    }
}
