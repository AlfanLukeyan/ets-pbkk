<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    public function index()
    {
        $medical_records = MedicalRecord::all();
        return view('medical-records.index', [
            'medical_records' => $medical_records],
        );
    }

    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('medical-records.create', [
            'patients' => $patients,
            'doctors' => $doctors
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'diagnosis' => 'required',
            'temperature' => 'required|numeric|between:35,45.5',
            'image' => 'required|image|mimes:pdf,jpeg,png,jpg|max:10048',
            'patient_id' => 'required',
            'doctor_id' => 'required',
        ]);

        $imagePath = $request->file('image')->store('prescriptions', 'public');
        $validatedData['image'] = $imagePath;

        $create = MedicalRecord::create($validatedData);

        if ($create) {
            return redirect()->route('medical-records.index')->with('success', 'New medical record has been added!');
        }

        return redirect()->route('medical-records.index')->with('Failed', 'Error creating new medical record');
    }

    public function show(MedicalRecord $medical_record)
    {
        return view('medical-records.show', ['medical_record' => $medical_record]);
    }

    public function edit(MedicalRecord $medical_record)
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('medical-records.edit', [
            'diagnosis' => $medical_record->diagnosis,
            'patients' => $patients,
            'doctors' => $doctors
        ]);
    }

    public function update(Request $request, MedicalRecord $medical_record)
    {
        $rules = [
            'diagnosis' => 'required',
            'temperature' => 'required|numeric|between:35,45.5',
            'patient_id' => 'required',
            'doctor_id' => 'required',
        ];

        $validatedData = $request->validate($rules);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:pdf,jpeg,png,jpg|max:10048',
            ]);
            $imagePath = $request->file('image')->store('prescriptions', 'public');
            $validatedData['image'] = $imagePath;
        }

        $update = MedicalRecord::where('id', $medical_record->id)->update($validatedData);

        if ($update) {
            return redirect()->route('medical-records.index')->with('success', 'Medical record has been updated!');
        }

        return redirect()->route('medical-records.index')->with('Failed', 'Error updating medical record');
    }

    public function destroy(MedicalRecord $medical_record)
    {
        $delete = MedicalRecord::destroy($medical_record->id);

        if ($delete) {
            return redirect()->route('medical-records.index')->with('success', 'Medical record has been deleted!');
        }

        return redirect()->route('medical-records.index')->with('Failed', 'Error deleting medical record');
    }
}
