<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;


class AdminController extends Controller
{

    public function index()
    {
        $adminData = Admin::orderBy('id', 'desc')->paginate(5);;
        return view('backend.pages.admin.index', compact('adminData'));
    }


    public function create()
    {
        return view('backend.pages.admin.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|min:3|unique:admins',
            'email' => 'required|email|unique:admins',
            'gender' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            'role' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg',
        ]);
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = time() . '.' . $image->getClientOriginalExtension();
            $imageName = md5(microtime()) . '.' . $ext;
            $destinationPath = public_path('/uploads/admins/');
            $image->move($destinationPath, $imageName);
            $data['image'] = "uploads/admins/" . $imageName;
        }

        if (Admin::create($data)) {
            return redirect()->route('admin-user.index')->with('success', 'Admin User Created Successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
