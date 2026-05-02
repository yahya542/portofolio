<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the certificates.
     */
    public function index()
    {
        $certificates = Certificate::orderBy('order_number')->get();
        return view('admin.certificates.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new certificate.
     */
    public function create()
    {
        return view('admin.certificates.create');
    }

    /**
     * Store a newly created certificate.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date_obtained' => 'required|string',
            'credential_id' => 'nullable|string|max:255',
            'image_path' => 'required|string',
            'order_number' => 'integer',
        ]);

        Certificate::create($validated);

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate created successfully.');
    }

    /**
     * Display the specified certificate.
     */
    public function show(Certificate $certificate)
    {
        return view('admin.certificates.show', compact('certificate'));
    }

    /**
     * Show the form for editing the specified certificate.
     */
    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.edit', compact('certificate'));
    }

    /**
     * Update the specified certificate.
     */
    public function update(Request $request, Certificate $certificate)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date_obtained' => 'required|string',
            'credential_id' => 'nullable|string|max:255',
            'image_path' => 'required|string',
            'order_number' => 'integer',
        ]);

        $certificate->update($validated);

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate updated successfully.');
    }

    /**
     * Remove the specified certificate.
     */
    public function destroy(Certificate $certificate)
    {
        $certificate->delete();

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate deleted successfully.');
    }
}
