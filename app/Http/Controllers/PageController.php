<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Http\Requests\StorePage;
use App\Http\Requests\UpdatePage;
use DataTables;
use App\DataTables\PagesDataTable;
use Yajra\DataTables\Html\Builder;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\DataTables\PagesDataTable  $dataTable
     * @param  \Yajra\DataTables\Html\Builder  $builder
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PagesDataTable $dataTable, Builder $builder)
    {
        if (request()->ajax()) {
            return DataTables::of(Page::query())->toJson();
        }

        $pages = Page::all();

        return $dataTable->with('pages', $pages)->render('pages.pages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePage  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePage $request)
    {
        $page = new Page;
        $page->fill($request->all());
        $page->save();

        return redirect()->route('admin.pages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('pages.pages.show', ['page' => $page]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('pages.pages.edit', ['page' => $page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePage  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePage $request, Page $page)
    {
        $page->fill($request->all());
        $page->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        try {
            $page->delete();
            // Toastr::success('Page has been deleted', 'Success!');
        } catch (Exception $e) {
            // Toastr::error('Page could not be deleted', "Error");
            return redirect()->route('admin.pages.index');
        }
        return redirect()->route('admin.pages.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function data()
    {
        return Datatables::of(Page::query())
            ->editColumn('body', '{{str_limit($body, 150)}}')
            ->addColumn('action', function ($page) {
                return '
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="btn-group" role="group" aria-label="actions">
                            <a href="' . route('admin.pages.show', ['page' => $page->id]) . '" 
                                    class="btn btn-xs btn-info" title="View Page">
                                <i class="glyphicon glyphicon-eye-open"></i> View
                            </a>
                            <a href="' . route('admin.pages.edit', ['page' => $page->id]) . '" 
                                    class="btn btn-xs btn-warning" title="Edit Page">
                                <i class="glyphicon glyphicon-edit"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>
                ';
            })
            ->make(true);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function dataFrontend()
    {
        return Datatables::of(Page::query())
            ->editColumn('body', '{{str_limit($body, 150)}}')
            ->editColumn('created_at', '{{ Helper::shortDateFromDatetime($created_at) }}')
            ->editColumn('updated_at', '{{ Helper::shortDateFromDatetime($updated_at) }}')
            ->addColumn('action', function ($page) {
                return '
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="btn-group" role="group" aria-label="actions">
                            <a href="' . route('pages.show', ['page' => $page->id]) . '" 
                                    class="btn btn-sm btn-info" title="View Page">
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </a>
                        </div>
                    </div>
                </div>
                ';
            })
            ->make(true);
    }
}
