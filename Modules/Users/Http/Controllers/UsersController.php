<?php

namespace Modules\Users\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use DB;
use Auth;
use Validator;
use Throwable;
use Hash;
use App\Models\User;

class UsersController extends Controller
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
        $data['lists'] = User::where('status', '>=', 1)
        ->when(isset($_GET['name']) && !empty($_GET['name']), function($query){
            $query->where('name', 'like', '%'.$_GET['name'].'%');
        })
        ->when(isset($_GET['contact']) && !empty($_GET['contact']), function($query){
            $query->where('contact', $_GET['contact']);
        })
        ->when(isset($_GET['email']) && !empty($_GET['email']), function($query){
            $query->where('email', $_GET['email']);
        })
        ->when(isset($_GET['status']) && !empty($_GET['status']), function($query){
            $query->where('status', $_GET['status']);
        })
        ->orderBy('order_id', 'desc')->simplePaginate(10);

        return view('users::index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('users::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|required|max:255',
            'email' => 'string|email|required|max:255|unique:users',
            'password' => 'string|required|max:6',
            'contact' => 'string|nullable|max:255',
            'address' => 'string|nullable|max:255',
            'photo' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'numeric|between:-1,2',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('errorMessage','Form validation failed!.');
        }

        try{
         DB::beginTransaction();

         $dataInfo = new User;
         $dataInfo->name = $request->name;
         $dataInfo->email = $request->email;
         $dataInfo->password = Hash::make($request->password);
         $dataInfo->contact = $request->contact;
         $dataInfo->address = $request->address;
         $dataInfo->order_id = $this->orderId();
         $dataInfo->status = !empty($request->status) ? $request->status : 2;
         $dataInfo->created_by = Auth::user()->id;
         $dataInfo->created_at = date('Y-m-d H:i:s');

         if (!empty($request->photo)) {
            $file = $request->file('photo');
            $file_name = time()."-".rand(111111,999999).".".$file->getClientOriginalExtension();
            $uploadPath = 'uploads/users/';
            $file->move($uploadPath, $file_name);
            $dataInfo->photo = $file_name;
        }

        $dataInfo->save();
        DB::commit();

        return redirect()->route('Users')->with('successMessage', 'User has been created successfully!.');

    }catch(Exception $e){
        DB::rollback();
        return redirect()->route('Users')->with('errorMessage', 'Failed to create User!.');
    }
}

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['dataInfo'] = User::where('id', $id)->first();
        return view('users::edit', $data);
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
            'name' => 'string|required|max:255',
            'email' => 'string|email|required|max:255|unique:users,email,'.$id,
            'password' => 'string|nullable|max:6',
            'contact' => 'string|nullable|max:255',
            'address' => 'string|nullable|max:255',
            'photo' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'numeric|between:-1,2',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('errorMessage','Form validation failed!.');
        }

        try{
         DB::beginTransaction();

         $dataInfo = User::find($id);
         $dataInfo->name = $request->name;
         $dataInfo->email = $request->email;
         $dataInfo->contact = $request->contact;
         $dataInfo->address = $request->address;
         $dataInfo->status = !empty($request->status) ? $request->status : 2;
         $dataInfo->updated_by = Auth::user()->id;
         $dataInfo->updated_at = date('Y-m-d H:i:s');

         if(!empty($request->password)){
            $dataInfo->password = Hash::make($request->password);
        }

        if (!empty($request->photo)) {
            $file = $request->file('photo');
            $file_name = time()."-".rand(111111,999999).".".$file->getClientOriginalExtension();
            $uploadPath = 'uploads/users/';
            $file->move($uploadPath, $file_name);
            $dataInfo->photo = $file_name;
        }

        $dataInfo->save();
        DB::commit();

        return redirect()->route('Users')->with('successMessage', 'User has been updated successfully!.');

    }catch(Exception $e){
        DB::rollback();
        return redirect()->route('Users')->with('errorMessage', 'Failed to update User!.');
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
            $dataInfo = User::find($id);
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
        $orderData = User::orderBy('order_id', 'desc')->first();
        $id = !empty($orderData) ? $orderData->order_id+1 : 1;
        return $id;
    }

}
