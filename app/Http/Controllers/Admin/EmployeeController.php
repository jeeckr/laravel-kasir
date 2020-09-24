<?php

namespace App\Http\Controllers\Admin;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $admin = $this->admin();
    }

    public function admin()
    {
        return Auth::guard('admin')->user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::all();
        $admin = Auth::guard('admin')->user();
        return view('admin.employee.employee_index', compact('employee', 'admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admin = $this->admin();
        return view('admin.employee.employee_create', compact('admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required|unique:employees',
            'password' => 'required|string|min:8',
        ]);

        Employee::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('employee_admin')->with('success', 'Data pegawai berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = $this->admin();
        $employee = Employee::find($id);
        return view('admin.employee.employee_detail', compact('employee', 'admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $admin = $this->admin();
        return view('admin.employee.employee_edit', compact('employee', 'admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);

        if ($request->filled('password')) {
            $request->validate([
                'name' => 'required', 'string', 'max:255',
                'address' => 'required|max:255',
                'phone' => 'required',
                'email' => 'required|unique:employees',
                'email' => 'required', 'string', 'email', 'max:255', 'unique:employees',
                'password' => 'string', 'min:8',
            ]);

            $employee->update($request->except('password') + ['password' => Hash::make($request['password'])]);
        } else {
            $request->validate([
                'name' => 'required', 'string', 'max:255',
                'address' => 'required|max:255',
                'phone' => 'required',
                'email' => 'required|unique:employees',
                'email' => 'required', 'string', 'email', 'max:255', 'unique:employees',
            ]);

            $employee->update($request->except('password'));
        }

        return redirect()->route('employee_admin')->with('success', 'Data pegawai berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect()->route('employee_admin')->with('success', 'Data pegawai berhasil dihapus!');
    }
}
