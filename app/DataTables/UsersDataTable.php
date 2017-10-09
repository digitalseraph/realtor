<?php

namespace App\DataTables;

use App\User;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class UsersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        // return $dataTable
        //             ->addColumn('action', function ($user) {
        //                 return '<a href="#edit-'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
        //             })->make(true);
        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        // return User::where('id', $this->id);
        return $model->newQuery()->select($this->getColumns());
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->parameters([
                        'paging'        => true,
                        'searching'     => true,
                        'info'          => true,
                        'searchDelay'   => 350,
                        'dom'           => $this->getDom(),
                        'order'         => [[0, 'asc']],
                        'buttons'       => $this->getButtons(),
                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'first_name',
            'last_name',
            'username',
            'email',
            'created_at',
            'updated_at',
            'action'
        ];
    }

    /**
     * Get buttons
     *
     * @return array
     */
    protected function getButtons()
    {
        return [
            'create',
            'export',
            'print',
            'reset',
            'reload',
        ];
    }

    /**
     * Get DOM
     *
     * @return string
     */
    protected function getDom()
    {
        return '
            <"row"
                <"col-md-4"l>
                <"col-md-4"B>
                <"col-md-4"f>
            >
            <"row"
                <"col-md-12"rt>
            >
            <"row"
                <"col-md-12"ip>
            >
            <"clear">
        ';
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'users_' . time();
    }
}
