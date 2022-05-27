<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    //
    public function index()
    {
        $doctors = Doctor::all();

        $dataPoints = [];

        foreach ($doctors as $doctor) {
            
            $dataPoints[] = array(
                "name" => $doctor['name'],
                "data" => [
                    intval($doctor['term1_marks']),
                    intval($doctor['term2_marks']),
                    intval($doctor['term3_marks']),
                    intval($doctor['term4_marks']),
                 
                ],
            );
        }

        return view("bar-graph", [
            "data" => json_encode($dataPoints),
            "terms" => json_encode(array(
                "Term 1",
                "Term 2",
                "Term 3",
                "Term 4"
             
            )),
        ]);
    }
}

