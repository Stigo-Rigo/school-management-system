<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    public function index()
    {
        $data['allData'] = FeeCategory::all();
        return view('backend.setup.fee_category.view_fee_cat', $data);
    }

    public function create()
    {
        return view('backend.setup.fee_category.add_fee_cat');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required | unique:fee_categories,name'
        ]);

        $fee = new FeeCategory();
        $fee->name = $request->name;
        $fee->save();

        $notification = array(
    		'message' => 'Fee Category Added Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('fee.category.view')->with($notification);
    }

    public function edit($id)
    {
        $data = FeeCategory::find($id);
        return view('backend.setup.fee_category.edit_fee_cat', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $fee = FeeCategory::find($id);
        $fee->name = $request->name;
        $fee->save();

        $notification = [
            'message' => 'Fee Category Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('fee.category.view')->with($notification);
    }

    public function destroy($id)
    {
        $fee = FeeCategory::find($id);
        $fee->delete();

        $notification = [
            'message' => 'Fee Category Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('fee.category.view')->with($notification);
    }
}
