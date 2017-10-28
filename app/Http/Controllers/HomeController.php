<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

use DataTables;
use App\DataTables\PagesDataTable;
use Yajra\DataTables\Html\Builder;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages-frontend.home');
    }

    /**
     * Display the specified page.
     * 
     * @todo move into separate class
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function showPage(Page $page)
    {
        return view('pages-frontend.page', ['page' => $page]);
    }
    
    /**
     * Display a listing of the resource.
     * 
     * @todo move into separate class
     *
     * @param  \App\DataTables\PagesDataTable  $dataTable
     * @param  \Yajra\DataTables\Html\Builder  $builder
     *
     * @return \Illuminate\Http\Response
     */
    public function showPagesIndex(PagesDataTable $dataTable, Builder $builder)
    {
        if (request()->ajax()) {
            return DataTables::of(Page::query())->toJson();
        }

        $pages = Page::all();

        return $dataTable->with('pages', $pages)->render('pages-frontend.pages.index');
    }
}
