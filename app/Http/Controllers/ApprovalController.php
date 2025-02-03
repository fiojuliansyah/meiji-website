<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Page;
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
    public function index()
    {
        // Ambil semua data dari berbagai model
        $activities = Activity::with(['requiredApprovals.approvalType', 'approvals'])->get();
        $news = News::with(['requiredApprovals.approvalType', 'approvals'])->get();
        $pages = Page::with(['requiredApprovals.approvalType', 'approvals'])->get();
        $products = Product::with(['requiredApprovals.approvalType', 'approvals'])->get();
        $randds = Randd::with(['requiredApprovals.approvalType', 'approvals'])->get();
        $sliders = Slider::with(['requiredApprovals.approvalType', 'approvals'])->get();
        $timelines = Timeline::with(['requiredApprovals.approvalType', 'approvals'])->get();
    
        // Gabungkan semua data menjadi satu koleksi
        $contents = collect()
            ->merge($activities)
            ->merge($news)
            ->merge($pages)
            ->merge($products)
            ->merge($randds)
            ->merge($sliders)
            ->merge($timelines);
    
        // Kirim data ke view
        return view('approvals.index', compact('contents'));
    }
    
    public function approve(Request $request, $approvableType, $approvableId, $approvalTypeId)
    {
        $user = auth()->user();

        // Pastikan user memiliki hak untuk memberikan approval ini
        $approvalType = ApprovalType::findOrFail($approvalTypeId);
        if ($approvalType->user_id !== $user->id) {
            return redirect()->back()->with('error', 'You are not authorized to approve this.');
        }

        // Cari konten berdasarkan approvable_type dan approvable_id
        $approvable = app($approvableType)->findOrFail($approvableId);

        // Cek apakah approval sudah ada untuk pengguna ini
        if ($approvable->approvals()->where('approval_type_id', $approvalTypeId)->where('user_id', $user->id)->exists()) {
            return redirect()->back()->with('error', 'You have already approved this.');
        }

        // Simpan approval
        $approvable->approvals()->create([
            'approval_type_id' => $approvalTypeId,
            'user_id' => $user->id,
            'status' => 'approved',
        ]);

        // Cek jika semua approval selesai
        if ($this->isFullyApproved($approvable)) {
            $approvable->update(['is_published' => true]);
            return redirect()->back()->with('success', 'Content approved and published!');
        }

        return redirect()->back()->with('success', 'Approval added!');
    }

    public function reject(Request $request, $approvableType, $approvableId, $approvalTypeId)
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

        // Cek apakah approval sudah ada untuk pengguna ini
        if ($approvable->approvals()->where('approval_type_id', $approvalTypeId)->where('user_id', $user->id)->exists()) {
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
        $requiredApprovalTypes = $approvable->requiredApprovals->pluck('approval_type_id');

        foreach ($requiredApprovalTypes as $approvalTypeId) {
            $approval = $approvable->approvals->firstWhere('approval_type_id', $approvalTypeId);
            if (!$approval || $approval->status !== 'approved') {
                return false;
            }
        }

        return true;
    }

    public function show($approvableType, $approvableId)
    {
        // Validasi tipe konten
        switch (strtolower($approvableType)) {
            case 'product':
                return redirect()->route('products.show', $approvableId);
    
            case 'news':
                return redirect()->route('news.show', $approvableId);
    
            // default:
            //     abort(404, 'Invalid content type.');
        }
    }   
}
