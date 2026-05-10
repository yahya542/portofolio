<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResumeSection;
use Illuminate\Http\Request;

class ResumeSectionController extends Controller
{
    /**
     * Display a listing of resume sections.
     */
    public function index()
    {
        $this->authorize('viewAny', ResumeSection::class);
        
        $sections = ResumeSection::ordered()->get();
        return view('admin.resume.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resume section.
     */
    public function create()
    {
        $this->authorize('create', ResumeSection::class);
        
        $sectionTypes = [
            'profile' => 'Profile Header',
            'summary' => 'Professional Summary',
            'experience' => 'Work Experience',
            'skills' => 'Technical Skills',
            'education' => 'Education',
            'languages' => 'Languages',
            'contact' => 'Contact Info'
        ];
        return view('admin.resume.create', compact('sectionTypes'));
    }

    /**
     * Store a newly created resume section in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', ResumeSection::class);
        
        $validated = $request->validate([
            'section_type' => 'required|string|max:50|unique:resume_sections,section_type',
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'order_number' => 'integer',
            'is_active' => 'boolean'
        ]);

        ResumeSection::create($validated);

        return redirect()->route('admin.resume.index')
            ->with('success', 'Resume section created successfully.');
    }

    /**
     * Display the specified resume section.
     */
    public function show(string $id)
    {
        $section = ResumeSection::findOrFail($id);
        $this->authorize('view', $section);
        
        return view('admin.resume.show', compact('section'));
    }

    /**
     * Show the form for editing the specified resume section.
     */
    public function edit(string $id)
    {
        $section = ResumeSection::findOrFail($id);
        $this->authorize('update', $section);
        
        $sectionTypes = [
            'profile' => 'Profile Header',
            'summary' => 'Professional Summary',
            'experience' => 'Work Experience',
            'skills' => 'Technical Skills',
            'education' => 'Education',
            'languages' => 'Languages',
            'contact' => 'Contact Info'
        ];
        return view('admin.resume.edit', compact('section', 'sectionTypes'));
    }

    /**
     * Update the specified resume section in storage.
     */
    public function update(Request $request, string $id)
    {
        $section = ResumeSection::findOrFail($id);
        $this->authorize('update', $section);
        
        $validated = $request->validate([
            'section_type' => 'required|string|max:50|unique:resume_sections,section_type,' . $section->id,
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'order_number' => 'integer',
            'is_active' => 'boolean'
        ]);

        $section->update($validated);

        return redirect()->route('admin.resume.index')
            ->with('success', 'Resume section updated successfully.');
    }

    /**
     * Remove the specified resume section from storage.
     */
    public function destroy(string $id)
    {
        $section = ResumeSection::findOrFail($id);
        $this->authorize('delete', $section);
        
        $section->delete();

        return redirect()->route('admin.resume.index')
            ->with('success', 'Resume section deleted successfully.');
    }
}

