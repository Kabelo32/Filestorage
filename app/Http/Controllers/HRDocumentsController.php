<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\ConditionAppraisal;
use App\Models\JobProfile;
use App\Models\LeaveForm;
use App\Models\OverTime;
use App\Models\AdvancedRequest;
use App\Models\PerfomanceAppraisal;

class HRDocumentsController extends Controller
{
    /**
     * Show the Human Resource Dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Count the total documents in both categories
        $conditionOfServiceCount = ConditionAppraisal::count();
        $jobProfileCount = JobProfile::count();
        $leaveFormCount = LeaveForm::count();
        $overTimeCount = OverTime::count();
        $advancedRequestCount = AdvancedRequest::count();
        $perfomanceAppraisalCount = PerfomanceAppraisal::count();

        // Pass counts to the dashboard view
        return view('HumanResource.dashboard', compact('conditionOfServiceCount', 'jobProfileCount', 'leaveFormCount', 'overTimeCount', 'advancedRequestCount', 'perfomanceAppraisalCount'));
    }

    /**
     * Show the Condition Appraisal page.
     *
     * @return \Illuminate\View\View
     */
    public function conditionAppraisal(Request $request)
    {
        // Retrieve query parameters for search and sort
    $search = $request->input('search');
    $sortBy = $request->input('sort_by', 'created_at'); // Default to sorting by created_at

    // Fetch performance appraisal documents with optional search and sort
    $files = ConditionAppraisal::query();

    if ($search) {
        $files->where('file_name', 'LIKE', '%' . $search . '%'); // Search by file name
    }

    $files->orderBy($sortBy, 'asc'); // Default sort order is ascending

    $files = $files->paginate(10); // Paginate the results (10 items per page)
        return view('HumanResource.conditionAppraisal', compact('files'));
    }

    /**
     * Handle file uploads for Condition Appraisal.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function uploadConditionAppraisal(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048', // Adjust validation as needed
        ]);

        $fileName = $request->file('file')->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('condition_appraisal', $fileName, 'public'); // Save to public disk

        ConditionAppraisal::create([
            'file_name' => $fileName,
            'file_path' => $filePath,
        ]);

        return redirect()->route('HumanResource.conditionAppraisal')->with('success', 'File uploaded successfully!');
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
            case 'conditionAppraisal':
                $file = ConditionAppraisal::findOrFail($id);
                break;
            case 'jobProfile':
                $file = JobProfile::findOrFail($id);
                break;
            case 'leaveForm':
                $file = LeaveForm::findOrFail($id);
                break;
            case 'overTime':
                $file = OverTime::findOrFail($id);
                break;
            case 'advancedRequest':
                $file = AdvancedRequest::findOrFail($id);
                break;
            case 'perfomanceAppraisal':
                $file = PerfomanceAppraisal::findOrFail($id);
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
    

    // Job Profile Documents

    public function jobProfile(Request $request)
    {
        // Retrieve query parameters for search and sort
    $search = $request->input('search');
    $sortBy = $request->input('sort_by', 'created_at'); // Default to sorting by created_at

    // Fetch performance appraisal documents with optional search and sort
    $files = JobProfile::query();

    if ($search) {
        $files->where('file_name', 'LIKE', '%' . $search . '%'); // Search by file name
    }

    $files->orderBy($sortBy, 'asc'); // Default sort order is ascending

    $files = $files->paginate(10); // Paginate the results (10 items per page)
        return view('HumanResource.jobProfile', compact('files'));
    }

    public function uploadjobProfile(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048', // Adjust validation as needed
        ]);

        $fileName = $request->file('file')->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('jobprofile', $fileName, 'public'); // Save to public disk

        JobProfile::create([
            'file_name' => $fileName,
            'file_path' => $filePath,
        ]);

        return redirect()->route('HumanResource.jobProfile')->with('success', 'File uploaded successfully!');
    }

    // Leave Form Documents

    public function leaveForm(Request $request)
    {
        // Retrieve query parameters for search and sort
    $search = $request->input('search');
    $sortBy = $request->input('sort_by', 'created_at'); // Default to sorting by created_at

    // Fetch performance appraisal documents with optional search and sort
    $files = LeaveForm::query();

    if ($search) {
        $files->where('file_name', 'LIKE', '%' . $search . '%'); // Search by file name
    }

    $files->orderBy($sortBy, 'asc'); // Default sort order is ascending

    $files = $files->paginate(10); // Paginate the results (10 items per page)
        return view('HumanResource.leaveForm', compact('files'));
    }

    public function uploadleaveForm(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048', // Adjust validation as needed
        ]);

        $fileName = $request->file('file')->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('leave_form', $fileName, 'public'); // Save to public disk

        LeaveForm::create([
            'file_name' => $fileName,
            'file_path' => $filePath,
        ]);

        return redirect()->route('HumanResource.leaveForm')->with('success', 'File uploaded successfully!');
    }

    // Overtime Documents

    public function overTime(Request $request)
    {
        // Retrieve query parameters for search and sort
    $search = $request->input('search');
    $sortBy = $request->input('sort_by', 'created_at'); // Default to sorting by created_at

    // Fetch performance appraisal documents with optional search and sort
    $files = OverTime::query();

    if ($search) {
        $files->where('file_name', 'LIKE', '%' . $search . '%'); // Search by file name
    }

    $files->orderBy($sortBy, 'asc'); // Default sort order is ascending

    $files = $files->paginate(10); // Paginate the results (10 items per page)
        return view('HumanResource.overTime', compact('files'));
    }

    public function uploadoverTime(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048', // Adjust validation as needed
        ]);

        $fileName = $request->file('file')->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('overtime', $fileName, 'public'); // Save to public disk

        OverTime::create([
            'file_name' => $fileName,
            'file_path' => $filePath,
        ]);

        return redirect()->route('HumanResource.overTime')->with('success', 'File uploaded successfully!');
    }

    // Advanced Request Documents

    public function advancedRequest(Request $request)
    {
        // Retrieve query parameters for search and sort
    $search = $request->input('search');
    $sortBy = $request->input('sort_by', 'created_at'); // Default to sorting by created_at

    // Fetch performance appraisal documents with optional search and sort
    $files = AdvancedRequest::query();

    if ($search) {
        $files->where('file_name', 'LIKE', '%' . $search . '%'); // Search by file name
    }

    $files->orderBy($sortBy, 'asc'); // Default sort order is ascending

    $files = $files->paginate(10); // Paginate the results (10 items per page)
        return view('HumanResource.advancedRequest', compact('files'));
    }

    public function uploadadvancedRequest(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048', // Adjust validation as needed
        ]);

        $fileName = $request->file('file')->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('advanced_request', $fileName, 'public'); // Save to public disk

        AdvancedRequest::create([
            'file_name' => $fileName,
            'file_path' => $filePath,
        ]);

        return redirect()->route('HumanResource.advancedRequest')->with('success', 'File uploaded successfully!');
    }

    
    // Perfomance Appraisal Documents

    public function perfomanceappraisal(Request $request)
{
    // Retrieve query parameters for search and sort
    $search = $request->input('search');
    $sortBy = $request->input('sort_by', 'created_at'); // Default to sorting by created_at

    // Fetch performance appraisal documents with optional search and sort
    $files = PerfomanceAppraisal::query();

    if ($search) {
        $files->where('file_name', 'LIKE', '%' . $search . '%'); // Search by file name
    }

    $files->orderBy($sortBy, 'asc'); // Default sort order is ascending

    $files = $files->paginate(10); // Paginate the results (10 items per page)

    return view('HumanResource.perfomanceAppraisal', compact('files'));
}

    public function uploadperfomanceappraisal(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048', // Adjust validation as needed
        ]);

        $fileName = $request->file('file')->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('perfomanceappraisal', $fileName, 'public'); // Save to public disk

        PerfomanceAppraisal::create([
            'file_name' => $fileName,
            'file_path' => $filePath,
        ]);

        return redirect()->route('HumanResource.perfomanceAppraisal')->with('success', 'File uploaded successfully!');
    }

}
