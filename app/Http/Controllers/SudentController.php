<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Exception;
use Illuminate\Http\Request;

class SudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        try {
       
            $studentList = Student::all();
            return response()->json($studentList, 200);
        } catch (Exception $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'first_name' => 'required|string'
            ]);
            $student = Student::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name')
            ]);
            return response()->json($student, 201);
        } catch (Exception $ex) {
           return response()->json($ex->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

   }

    
