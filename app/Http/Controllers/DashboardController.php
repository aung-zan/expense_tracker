<?php

namespace App\Http\Controllers;

use App\Http\Requests\DashboardRequest;
use App\Http\Services\DashboardService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    /**
     * Display the dashboard view.
     */
    public function dashboard()
    {
        return view('dashboard.dashboard');
    }

    /**
     * Return the data for the dashboard view.
     */
    public function getDashboardData(DashboardRequest $request)
    {
        $userId = auth()->user()->id;
        $date = $request->get('date') ?? Carbon::now()->format('Y-m');

        $dashboardData = $this->dashboardService->overviewData($userId, $date);

        return response()->json($dashboardData, 200);
    }
}
