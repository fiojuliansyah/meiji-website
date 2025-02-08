<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Page;
use App\Models\About;
use App\Models\Randd;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Activity;
use App\Models\Approval;
use App\Models\Timeline;
use App\Models\ApprovalType;
use Illuminate\Http\Request;
use App\Models\ContentApprovalRequirement;

class ApprovalController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:list-approvals')->only('index');
    // }

    public function index()
    {
        // Ambil semua data dari berbagai model
        $activities = Activity::with(['requiredApprovals.approvalType', 'approvals'])->get();
        $news = News::with(['requiredApprovals.approvalType', 'approvals'])->get();
        $pages = Page::with(['requiredApprovals.approvalType', 'approvals'])->get();
        $products = Product::with(['requiredApprovals.approvalType', 'approvals'])->get();
        $randds = Randd::with(['requiredApprovals.approvalType', 'approvals'])->get();
        $abouts = About::with(['requiredApprovals.approvalType', 'approvals'])->get();
        $timelines = Timeline::with(['requiredApprovals.approvalType', 'approvals'])->get();
    
        // Gabungkan semua data menjadi satu koleksi
        $contents = collect()
            ->merge($activities)
            ->merge($news)
            ->merge($pages)
            ->merge($products)
            ->merge($randds)
            ->merge($abouts)
            ->merge($timelines);
    
        // Kirim data ke view
        return view('approvals.index', compact('contents'));
    }
    
    public function approve($lang, Request $request, $approvableType, $approvableId, $approvalTypeId)
    {
        $user = auth()->user();

        $approvalType = ApprovalType::findOrFail($approvalTypeId);
        if ($approvalType->user_id !== $user->id) {
            return redirect()->back()->with('error', 'You are not authorized to approve this.');
        }

        $approvable = app($approvableType)->findOrFail($approvableId);

        if ($approvable->approvals()->where('approval_type_id', $approvalTypeId)->where('user_id', $user->id)->exists()) {
            return redirect()->back()->with('error', 'You have already approved this.');
        }

        $approvable->approvals()->create([
            'approval_type_id' => $approvalTypeId,
            'user_id' => $user->id,
            'status' => 'approved',
        ]);

        if ($this->isFullyApproved($approvable)) {
            $approvable->update(['is_published' => true]);
            return redirect()->back()->with('success', 'Content approved and published!');
        }

        return redirect()->back()->with('success', 'Approval added!');
    }

    public function reject($lang, Request $request, $approvableType, $approvableId, $approvalTypeId)
    {
        $user = auth()->user();

        // Validasi alasan penolakan
        $request->validate([
            'rejection_description' => 'required|string|max:500',
        ]);

        // Pastikan user memiliki hak untuk memberikan rejection ini
        $approvalType = ApprovalType::findOrFail($approvalTypeId);
        if ($approvalType->user_id !== $user->id) {
            return redirect()->back()->with('error', 'You are not authorized to reject this.');
        }

        // Cari konten berdasarkan approvable_type dan approvable_id
        $approvable = app($approvableType)->findOrFail($approvableId);

        // Cek apakah approval sudah ada
        $existingApproval = $approvable->approvals()
            ->where('approval_type_id', $approvalTypeId)
            ->where('user_id', $user->id)
            ->first();

        if ($existingApproval) {
            return redirect()->back()->with('error', 'You have already processed this approval.');
        }

        // Simpan rejection
        $approvable->approvals()->create([
            'approval_type_id' => $approvalTypeId,
            'user_id' => $user->id,
            'status' => 'rejected', // Set status ke "rejected"
            'rejection_description' => $request->rejection_description, // Simpan alasan
        ]);

        return redirect()->back()->with('success', 'Approval rejected successfully!');
    }
    
    // Cek apakah semua approval sudah selesai
    private function isFullyApproved($approvable)
    {
        $requiredApprovals = ContentApprovalRequirement::where('approvable_type', get_class($approvable))
            ->where('approvable_id', $approvable->id)
            ->pluck('approval_type_id');

        $givenApprovals = $approvable->approvals()->pluck('approval_type_id');

        return $requiredApprovals->diff($givenApprovals)->isEmpty();
    }

    public function show($lang, $approvableType, $approvableId)
    {
        switch (strtolower($approvableType)) {
            case 'product':
                return redirect()->route('products.show', $approvableId);
    
            case 'news':
                return redirect()->route('news.show', $approvableId);

            case 'randd':
                return redirect()->route('randds.show', $approvableId);

            case 'page':
                return redirect()->route('pages.show', $approvableId);

            case 'activity':
                return redirect()->route('activities.show', $approvableId);

            case 'about':
                return redirect()->route('abouts.show', $approvableId);
    
            default:
                abort(404, 'Invalid content type.');
        }
    }  
    
    public function edit($lang, $approvableType, $approvableId)
    {
        switch (strtolower($approvableType)) {
            case 'product':
                return redirect()->route('products.edit', $approvableId);
    
            case 'news':
                return redirect()->route('news.edit', $approvableId);

            case 'randd':
                return redirect()->route('randds.edit', $approvableId);

            case 'page':
                return redirect()->route('pages.edit', $approvableId);

            case 'activity':
                return redirect()->route('activities.edit', $approvableId);

            case 'about':
                return redirect()->route('abouts.edit', $approvableId);
    
            default:
                abort(404, 'Invalid content type.');
        }
    }  
    
    public function rollback($lang, Request $request, $approvableType, $approvableId, $approvalTypeId)
    {
        $user = auth()->user();

        // Pastikan approval type dan approvable ditemukan
        $approvalType = ApprovalType::findOrFail($approvalTypeId);

        // Validasi apakah user memiliki hak untuk melakukan rollback
        if ($approvalType->user_id !== $user->id) {
            return redirect()->back()->with('error', 'You are not authorized to rollback this approval.');
        }

        // Cari approvable berdasarkan type dan ID
        $approvable = app($approvableType)->findOrFail($approvableId);

        // Cari approval yang sudah di-approve oleh user untuk approvable dan approval type tertentu
        $approval = $approvable->approvals()
            ->where('approval_type_id', $approvalTypeId)
            ->where('status', 'approved')
            ->first();

        // Pastikan approval ditemukan
        if (!$approval) {
            return redirect()->back()->with('error', 'No approved approval found for rollback.');
        }

        // Hapus approval yang sudah di-approve
        $approval->delete();

        // Cek apakah masih ada approval yang belum selesai
        if ($this->isFullyApproved($approvable)) {
            // Jika sudah tidak ada approval lagi, set konten kembali ke unpublished
            $approvable->update(['is_published' => false]);
            return redirect()->back()->with('success', 'Approval has been rolled back and content unpublished.');
        }

        return redirect()->back()->with('success', 'Approval has been rolled back.');
    }

}