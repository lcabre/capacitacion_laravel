<?php

namespace App\DataTables;

use App\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

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
        return datatables()

            ->eloquent($query)
            ->editColumn('created_at', function(User $user) {
                return $user->created_at->format('d-m-Y');
            })
            ->editColumn('updated_at', function(User $user) {
                return $user->updated_at->format('d-m-Y H:i:s');
            })
            ->editColumn('action', function(User $user) {
                $delete = route('users.destroy', $user->id);
                $edit = route('users.edit', $user->id);
                $show = route('users.show', $user->id);
                return "<div class='d-inline'>
                            <a href='$show' class='btn btn-success btn-sm '>Ver</a>
                            <a href='$edit' class='btn btn-primary btn-sm '>Editar</a>
                            <form action='$delete' method='post' class='d-inline-block'>
                               <button class='btn btn-danger btn-sm delete' type='button'>Borrar</button>             
                            </form>
                        </div>";
            })
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery()->with('profile');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('users-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->autoWidth(false)
            ->dom('lBfrtip')
            ->orderBy(1)
            ->lengthMenu([[10,15,-1],[10,15,"todos"]])
            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('profile.nombre'),
            Column::make('profile.apellido'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(150)
//            ['title' => 'Nombre','data' => 'profile.nombre','name' => 'profile.nombre'],
//            ['title' => 'Acciones','data' => 'acciones','name' => 'acciones','orderable' => false,'exportable' => false, 'printable' => false, 'searchable' => false, 'width'=>'105px']

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }
}
