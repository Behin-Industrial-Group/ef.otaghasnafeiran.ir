<?php

namespace BehinFindOldIsic\App\Http\Controllers;

use App\Http\Controllers\Controller;
use BehinFileControl\Controllers\FileController;
use BehinFindOldIsic\App\Models\Isic;
use BehinFindOldIsic\App\Models\IsicComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class BehinFindOldIsicController extends Controller
{
    function getByUniqueID($unique_id)
    {
        return Isic::where('unique_id', $unique_id)->first();
    }

    function getByOldIsicCode($old_isic_code)
    {
        return Isic::where('old_isic_code', $old_isic_code)->first();
    }

    function step0Form()
    {
        return view("isicView::step0");
    }

    function step0()
    {
        return response()->json([
            'status' => 200,
            'url' => route("isic.step1Form")
        ]);
    }

    function step1Form()
    {
        return view("isicView::register-form-step1");
        return view("isicView::register-form");
    }

    function step1(Request $request)
    {
        $request->validate([
            // 'fullname' => 'required',
            // 'mobile' => 'required',
            // 'union_name' => 'required',
            // 'city' => 'required',
            // 'type' => 'required',
            'old_isic_code' => 'required',
        ]);
        $data = $request->all();
        $comment = IsicComment::create($data);


        $row = $this->getByOldIsicCode($request->old_isic_code);
        return view('isicView::register-form-step2', [
            'row' => $row,
            'comment' => $comment
        ]);

        if ($row) {
            return response()->json([
                'status' => 200,
                'url' => route("isic.step2Form", ['row' => $row['unique_id']])
            ]);
        }
        return response(trans("Not Found"), 402);
    }

    public function step2Form($unique_id)
    {
        $row = $this->getByUniqueID($unique_id);
        return view('isicView::register-form-step2')->with([
            'row' => $row
        ]);
    }

    public function step2(Request $request)
    {
        $request->validate([
            'comment_id' => 'required',
        ]);
        $row = $this->getByUniqueID($request->unique_id);
        $comment = IsicComment::find($request->comment_id);
        $comment->comment = $request->comment;
        $comment->save();
        return view('isicView::finish');


        if (!$row) {
            return response(trans("Error"), 500);
        }
        return response()->json([
            'status' => 200,
            'url' => route("isic.step3Form", ['unique_id' => $row['unique_id']])
        ]);
    }

    public function step3Form($unique_id)
    {
        return view('isicView::register-form-step3')->with([
            'unique_id' => $unique_id
        ]);
    }

    public function step3(Request $request)
    {
        $request->validate([
            'unique_id' => 'required',
            'mobile' => 'required',
            'fullname' => 'required',
            'comment' => 'required',
        ]);
        $row = $this->getByUniqueID($request->unique_id);

        if (!$row) {
            return response("Error", 500);
        }
        $data = $request->only([
            'fullname',
            'mobile',
            'comment'
        ]);
        $data['isic_id'] = $request->unique_id;
        IsicComment::create($data);

        return view('isicView::partial.payment-success');
        return response()->json([
            'status' => 200,
            'msg' => Blade::include('partial.payment-success', 'isicView')
        ]);
    }
}
