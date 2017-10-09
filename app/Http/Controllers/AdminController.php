<?php

namespace App\Http\Controllers;

use Auth;
use App\Admin;
use App\Http\Requests\StoreAdmin;
use App\Http\Requests\UpdateAdmin;
use Illuminate\Http\Request;
use DataTables;
use App\DataTables\AdminsDataTable;
use Yajra\DataTables\Html\Builder;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\DataTables\AdminsDataTable  $dataTable
     * @param  \Yajra\DataTables\Html\Builder  $builder
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminsDataTable $dataTable, Builder $builder)
    {
        if (request()->ajax()) {
            return DataTables::of(Admin::query())->toJson();
        }

        $admins = Admin::all();

        return $dataTable->with('admins', $admins)->render('pages.admins.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdmin  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdmin $request)
    {
        $admin = new Admin;
        $admin->fill($request->all());
        $admin->password = bcrypt($request->password);
        $admin->save();

        // Assign default roles
        $admin->assignRole('admin');

        return redirect()->route('admin.admins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        return view('pages.admins.show', ['admin' => $admin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('pages.admins.edit', ['admin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdmin  $request
     * @param  \App\Admin  $admin
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdmin $request, Admin $admin)
    {
        // Update User object
        $admin->fill($request->all());
        $admin->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        try {
            $admin->delete();
            // Toastr::success('Admin has been deleted', 'Success!');
        } catch (Exception $e) {
            // Toastr::error('Admin could not be deleted', "Error");
            return redirect()->route('admin.admins.index');
        }
        return redirect()->route('admin.admins.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function data()
    {
        return Datatables::of(Admin::query())
            ->addColumn('action', function ($user) {
                return '
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="btn-group" role="group" aria-label="actions">
                            <a href="' . route('admin.admins.show', ['user' => $user->id]) . '" 
                                    class="btn btn-xs btn-info" title="View Admin">
                                <i class="glyphicon glyphicon-eye-open"></i> View
                            </a>
                            <a href="' . route('admin.admins.edit', ['user' => $user->id]) . '" 
                                    class="btn btn-xs btn-warning" title="Edit Admin">
                                <i class="glyphicon glyphicon-edit"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>
                ';
            })
            // ->editColumn('id', 'ID: {{$id}}')
            // ->removeColumn('password')
            ->make(true);
    }

    /**
     * Show the admin lockscreen
     *
     * @return \Illuminate\Http\Response
     */
    public function showLockscreen(Request $request)
    {
        if(Auth::guard('admin')->check()) {
            $id = Auth::guard('admin')->id();
            $savedUrl = url()->previous();
            Auth::guard('admin')->logout();
            \Session::put('locked', true);
        } else {
            $id = $request->id;
            $savedUrl = $request->savedUrl;
        }

        return view('admin.auth.lockscreen')
            ->with('id', $id)
            ->with('savedUrl', $savedUrl);
    }

    /**
     * Unlock the admin screen and return user to previous page
     *
     * @return \Illuminate\Http\Response
     */
    public function unlockscreen(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'password' => 'required',
            'savedUrl' => 'required',
        ]);

        $id = $request->id;
        $email = Admin::find($id)->email;
        $password = $request->password;
        $savedUrl = $request->savedUrl;

        if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password ])) {
            \Session::forget('locked');
            return redirect()->intended($savedUrl);
        }

        return view('admin.auth.lockscreen')
            ->with('id', $id)
            ->with('savedUrl', $savedUrl);
    }
}
