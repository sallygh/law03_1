<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Http\Requests\DocumentRequest;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::all();
        return view('documents.index', compact('documents'));
    }

    public function create()
    {
        return view('documents.create');
    }

    public function store(DocumentRequest $request)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('documents');
            $validatedData['file_path'] = $filePath;
        }
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails');
            $validatedData['thumbnail'] = $thumbnailPath;
        }
        Document::create($validatedData);
        return redirect()->route('documents.index')->with('success', 'Document created successfully.');
    }

    public function edit(Document $document)
    {
        return view('documents.edit', compact('document'));
    }

    public function update(DocumentRequest $request, Document $document)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('documents');
            $validatedData['file_path'] = $filePath;
        }
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails');
            $validatedData['thumbnail'] = $thumbnailPath;
        }
        $document->update($validatedData);
        return redirect()->route('documents.index')->with('success', 'Document updated successfully.');
    }

    public function destroy(Document $document)
    {
        $document->delete();
        return redirect()->route('documents.index')->with('success', 'Document deleted successfully.');
    }
}
