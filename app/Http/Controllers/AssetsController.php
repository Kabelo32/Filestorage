<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\CellPhone;

class AssetsController extends Controller
{
    public function index()
    {
        // Count the total documents in both categories
        $laptopCount = Laptop::count();
        $cellPhoneCount = CellPhone::count();
        
        // Pass counts to the dashboard view
        return view('Asset.dashboard', compact('laptopCount', 'cellPhoneCount'));
    }

    public function laptop(Request $request)
    {
        // Retrieve query parameters for search and sort
    $search = $request->input('search');
    $sortBy = $request->input('sort_by', 'created_at'); // Default to sorting by created_at

    // Fetch performance appraisal documents with optional search and sort
    $files = Laptop::query();

    if ($search) {
        $files->where('file_name', 'LIKE', '%' . $search . '%'); // Search by file name
    }

    $files->orderBy($sortBy, 'asc'); // Default sort order is ascending

    $files = $files->paginate(10); // Paginate the results (10 items per page)
        return view('Asset.laptop', compact('files'));
    }

    public function uploadlaptop(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048', // Adjust validation as needed
        ]);

        $fileName = $request->file('file')->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('laptop', $fileName, 'public'); // Save to public disk

        Laptop::create([
            'file_name' => $fileName,
            'file_path' => $filePath,
        ]);

        return redirect()->route('Asset.laptop')->with('success', 'File uploaded successfully!');
    }

    
    /**
     * Delete a file.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($type, $id)
    {
        // Determine the model based on the document type
        switch ($type) {
            case 'laptop':
                $file = Laptop::findOrFail($id);
                break;
            case 'cellPhone':
                $file = CellPhone::findOrFail($id);
                break;
            default:
                abort(404, 'Document type not found.');
        }
    
        // Delete the file from storage
        if (Storage::exists('public/' . $file->file_path)) {
            Storage::delete('public/' . $file->file_path);
        }
    
        // Delete the file record from the database
        $file->delete();
    
        return back()->with('success', 'Document deleted successfully');
    }
    
    // cell phone
    public function cellphone(Request $request)
    {
        // Retrieve query parameters for search and sort
    $search = $request->input('search');
    $sortBy = $request->input('sort_by', 'created_at'); // Default to sorting by created_at

    // Fetch performance appraisal documents with optional search and sort
    $files = CellPhone::query();

    if ($search) {
        $files->where('file_name', 'LIKE', '%' . $search . '%'); // Search by file name
    }

    $files->orderBy($sortBy, 'asc'); // Default sort order is ascending

    $files = $files->paginate(10); // Paginate the results (10 items per page)
        return view('Asset.cellPhone', compact('files'));
    }

    public function uploadcellphone(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048', // Adjust validation as needed
        ]);

        $fileName = $request->file('file')->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('cellphone', $fileName, 'public'); // Save to public disk

        CellPhone::create([
            'file_name' => $fileName,
            'file_path' => $filePath,
        ]);

        return redirect()->route('Asset.cellPhone')->with('success', 'File uploaded successfully!');
    }


}
