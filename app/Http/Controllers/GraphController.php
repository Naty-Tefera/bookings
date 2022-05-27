<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class GraphController extends Controller
{
    //
    public function index()
    {
        $data['pieChart'] = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->whereYear('created_at', date('Y'))
            ->groupBy('month_name')
            ->orderBy('count')
            ->get();

        return view('pie-chart', $data);
    }
}
