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
            //throw $th;
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
            //return response()->json($student, 201);
            return response()->json([
        'message' => 'Student saved successfully!',
        'data' => [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
        ],
    ], 201);
        } catch (\Throwable $th) {
           throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
        $student = Student::findOrFail($id); // Try to find student by ID

        return response()->json([
            'message' => 'Student retrieved successfully!',
            'data' => $student,
        ]);
    } catch (\Throwable $th) {
        return response()->json([
            'message' => 'Student not found',
            'error' => $th->getMessage(),
        ], 404);
    }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $request->validate([
                'first_name' => 'required|string',
                'last_name'  => 'required|string'
            ]);

            $student = Student::findOrFail($id);
            $student->update([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
            ]);
            return response()->json([
                'message' => 'Student updated sucessfully!',
                'data' => $student,

            ]);

        }catch(\Throwable $th){
            return response()->json([
                'message' => 'Failed to updated student',
                'error' => $th ->getMessage(),
            ], 500);

        }
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
{
    try {
        $student = Student::findOrFail($id);
        $student->delete();

        return response()->json([
            'message' => 'Student deleted successfully!',
            'data' => $student,
            
        ]);
    } catch (\Throwable $th) {
        return response()->json([
            'message' => 'Failed to delete student',
            'error' => $th->getMessage(),
        ], 500);
    }
}

    // public function destroy(string $id)
    // {
    //     //
    // }

   }

    
