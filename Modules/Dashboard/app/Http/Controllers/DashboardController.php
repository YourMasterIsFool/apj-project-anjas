<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Modules\Dashboard\app\Service\Query\GetTotalApjService;
use Modules\Dashboard\app\Service\Query\GetTotalJalanService;
use Modules\Dashboard\app\Service\Query\GetTotalTrafficService;
use Modules\Lalin\enum\TrafficType;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(
        private GetTotalApjService $get_total_apj_service,
        private GetTotalTrafficService $get_total_traffic_service,
        private GetTotalJalanService $get_total_jalan_service


    ) {}
    public function index()
    {
        return Inertia::render('dashboard/pages/index', [
            "data" => [
                "total_apj" => $this->get_total_apj_service->execute(),
                "total_traffic" => $this->get_total_traffic_service->execute(TrafficType::Traffic),
                "total_warning" => $this->get_total_traffic_service->execute(TrafficType::Warning),
                "total_jalan" => $this->get_total_jalan_service->execute(),

            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('dashboard::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('dashboard::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {}
}
