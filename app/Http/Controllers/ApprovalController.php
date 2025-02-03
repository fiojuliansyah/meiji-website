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

class ApprovalController extends Controller
{
    public function isFullyApproved($lang, $approvableId, $approvableType)
    {
        $approvable = $approvableType::find($approvableId);
        if (!$approvable) {
            return false;
        }

        $requiredApprovals = $approvable->requiredApprovals;
        $approvals = $approvable->approvals;

        foreach ($requiredApprovals as $requiredApproval) {
            $approval = $approvals->firstWhere('approval_type_id', $requiredApproval->approval_type_id);
            if (!$approval || $approval->status !== 'approved') {
                return false;
            }
        }

        return true;
    }

    public function index($lang)
    {
        $contents = [
            News::all(),
            Page::all(),
            Randd::all(),
            Slider::all(),
            Product::all(),
            Activity::all(),
            Timeline::all(),
        ];

        return view('approval.index', compact('contents'));
    }

    public function show($lang, $approvableType, $approvableId)
    {
        $approvable = $approvableType::find($approvableId);
        if (!$approvable) {
            return redirect()->back()->with('error', 'Approvable not found.');
        }

        return view('approval.show', compact('approvable'));
    }

    public function approve($lang, Request $request, $approvableType, $approvableId, $approvalTypeId)
    {
        $approvable = $approvableType::find($approvableId);
        if (!$approvable) {
            return redirect()->back()->with('error', 'Approvable not found.');
        }

        $approval = Approval::firstOrCreate([
            'approvable_id' => $approvableId,
            'approvable_type' => $approvableType,
            'approval_type_id' => $approvalTypeId,
        ]);

        $approval->update([
            'status' => 'approved',
            'approved_by' => auth()->id(),
            'approved_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Approval successful.');
    }

    public function reject($lang, Request $request, $approvableType, $approvableId, $approvalTypeId)
    {
        $approvable = $approvableType::find($approvableId);
        if (!$approvable) {
            return redirect()->back()->with('error', 'Approvable not found.');
        }

        $approval = Approval::firstOrCreate([
            'approvable_id' => $approvableId,
            'approvable_type' => $approvableType,
            'approval_type_id' => $approvalTypeId,
        ]);

        $approval->update([
            'status' => 'rejected',
            'rejected_by' => auth()->id(),
            'rejected_at' => now(),
            'rejection_description' => $request->input('rejection_description'),
        ]);

        return redirect()->back()->with('success', 'Rejection successful.');
    }
}
