<?php

namespace Modules\Categories\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use DB;
use Auth;
use Validator;
use Throwable;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data['lists'] = Categories::where('status', '>=', 1)
        ->when(isset($_GET['title']) && !empty($_GET['title']), function($query){
            $query->where('title', 'like', '%'.$_GET['title'].'%');
        })
        ->when(isset($_GET['status']) && !empty($_GET['status']), function($query){
            $query->where('status', $_GET['status']);
        })
        ->orderBy('order_id', 'desc')->simplePaginate(10);

        return view('categories::index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('categories::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'string|required|max:255',
            'photo' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'numeric|between:-1,2',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('errorMessage','Form validation failed!.');
        }

            try{
             DB::beginTransaction();

            $dataInfo = new Categories;
            $dataInfo->title = $request->title;
            $dataInfo->order_id = $this->orderId();
            $dataInfo->status = !empty($request->status) ? $request->status: 2;
            $dataInfo->created_by = Auth::user()->id;
            $dataInfo->created_at = date('Y-m-d H:i:s');

            if (!empty($request->photo)) {
                $file = $request->file('photo');
                $file_name = time()."-".rand(111111,999999).".".$file->getClientOriginalExtension();
                $uploadPath = 'uploads/categories/';
                $file->move($uploadPath, $file_name);
                $dataInfo->photo = $file_name;
            }

            $dataInfo->save();
            DB::commit();

            return redirect()->route('Categories')->with('successMessage', 'Category has been created successfully!.');

            }catch(Exception $e){
                DB::rollback();
                return redirect()->route('Categories')->with('errorMessage', 'Failed to create category!.');
            }
    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['dataInfo'] = Categories::where('id', $id)->first();
        return view('categories::edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'string|required|max:255',
            'photo' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'numeric|between:-1,2',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('errorMessage','Form validation failed!.');
        }

            try{
             DB::beginTransaction();

            $dataInfo = Categories::find($id);
            $dataInfo->title = $request->title;
            $dataInfo->status = !empty($request->status) ? $request->status : 2;
            $dataInfo->updated_by = Auth::user()->id;
            $dataInfo->updated_at = date('Y-m-d H:i:s');

            if (!empty($request->photo)) {
                $file = $request->file('photo');
                $file_name = time()."-".rand(111111,999999).".".$file->getClientOriginalExtension();
                $uploadPath = 'uploads/categories/';
                $file->move($uploadPath, $file_name);
                $dataInfo->photo = $file_name;
            }

            $dataInfo->save();
            DB::commit();

            return redirect()->route('Categories')->with('successMessage', 'Category has been updated successfully!.');

            }catch(Exception $e){
                DB::rollback();
                return redirect()->route('Categories')->with('errorMessage', 'Failed to update category!.');
            }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        if(!empty($id)){
            $dataInfo = Categories::find($id);
            $dataInfo->status = -1;
            $dataInfo->updated_by = Auth::user()->id;
            $dataInfo->updated_at = date('Y-m-d H:i:s');
            $dataInfo->save();
            return redirect()->back()->with('successMessage', 'Success! Deleted Successfully.');
        }
        return redirect()->back()->with('errorMessage', 'Alert! Error Deleting Data.');
    }


    public function orderId()
    {
        $orderData = Categories::orderBy('order_id', 'desc')->first();
        $id = !empty($orderData) ? $orderData->order_id+1 : 1;
        return $id;
    }

}
