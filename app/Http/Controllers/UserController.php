<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\DataTables\UsersDataTable;
use Illuminate\Http\Request;
use DataTables;
use Yajra\DataTables\Html\Builder;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable, Builder $builder)
    {
        if (request()->ajax()) {
            return DataTables::of(User::query())->toJson();
        }

        $users = User::all();

        return $dataTable->with('users', $users)->render('pages.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUser  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        $user = new User;
        $user->fill($request->all());
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('pages.users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('pages.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUser  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, User $user)
    {
        // Update User object
        $user->fill($request->all());
        $user->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            // Toastr::success('User has been deleted', 'Success!');
        } catch (Exception $e) {
            // Toastr::error('User could not be deleted', "Error");
            return redirect()->route('admin.users.index');
        }
        return redirect()->route('admin.users.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function data()
    {
        return Datatables::of(User::query())
            ->addColumn('action', function ($user) {
                return '
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="btn-group" role="group" aria-label="actions">
                            <a href="' . route('admin.users.show', ['user' => $user->id]) . '" 
                                    class="btn btn-xs btn-info" title="View User">
                                <i class="glyphicon glyphicon-eye-open"></i> View
                            </a>
                            <a href="' . route('admin.users.edit', ['user' => $user->id]) . '" 
                                    class="btn btn-xs btn-warning" title="View User">
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
}
