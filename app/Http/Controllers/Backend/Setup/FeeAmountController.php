<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeAmount;
use App\Models\FeeCategory;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class FeeAmountController extends Controller
{
    public function index()
    {
        $data['allData'] = FeeAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
    	return view('backend.setup.fee_amount.view_fee_amount', $data);
    }

    public function create() 
    {
    	$data['fee_categories'] = FeeCategory::all();
    	$data['classes'] = StudentClass::all();
    	return view('backend.setup.fee_amount.add_fee_amount', $data);
    }

    public function store(Request $request)
    {
        $class_count = count($request->class_id);
        if ($class_count != NULL) {
            for ($i=0; $i < $class_count; $i++) {
                $fee_amount = new FeeAmount();
    			$fee_amount->fee_category_id = $request->fee_category_id;
    			$fee_amount->class_id = $request->class_id[$i];
    			$fee_amount->amount = $request->amount[$i];
    			$fee_amount->save();
            }
        }

        $notification = [
    		'message' => 'Amount Inserted Successfully',
    		'alert-type' => 'success'
        ];

    	return redirect()->route('fee.amount.view')->with($notification);
    }

    public function edit($fee_category_id)
    {
        $data['editData'] = FeeAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();

        return view('backend.setup.fee_amount.edit_fee_amount', $data);
    }

    public function update(Request $request, $fee_category_id)
    {
        if ($request->class_id == NULL) {
            $notification = [
                'message' => 'Please select a class amount',
                'alert-type' => 'error'
            ];

            return redirect()->route('fee.amount.edit', $fee_category_id)->with($notification);
        } else {
            $countClass = count($request->class_id);
	        FeeAmount::where('fee_category_id', $fee_category_id)->delete(); 
    		for ($i=0; $i < $countClass; $i++) { 
    			$fee_amount = new FeeAmount();
    			$fee_amount->fee_category_id = $request->fee_category_id;
    			$fee_amount->class_id = $request->class_id[$i];
    			$fee_amount->amount = $request->amount[$i];
    			$fee_amount->save();

    		}
        } $notification = [
    		'message' => 'Amount Updated Successfully',
    		'alert-type' => 'success'
        ];

    	return redirect()->route('fee.amount.view')->with($notification);
    }

    public function details($fee_category_id)
    {
        $data['details'] = FeeAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id','asc')->get();
        // dd($data);
        return view('backend.setup.fee_amount.fee_amount_details', $data);
    }
}
