<?php

namespace App\DataTables;

use App\Models\Proyect;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProyectsDataTable extends DataTable
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
            ->addColumn('action', 'proyects.action')
            ->editColumn('action', function(Proyect $proyect) {
                $delete = route('proyects.destroy', $proyect->id);
                $edit = route('proyects.edit', $proyect->id);
                $show = route('proyects.show', $proyect->id);
                return "<div class='d-inline'>
                            <a class='btn btn-sm btn-primary' href='$show'>Ver</a>
                            <a class='btn btn-sm btn-warning' href='$edit'>Editar</a>
                            <form action='$delete' method='post' class='d-inline-block'>
                               <button class='btn btn-sm btn-danger delete' type='button'>Eliminar</button>
                            </form>
                        </div>";
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Proyect $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Proyect $model)
    {
        return $model->newQuery()->withCount('users');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('proyects-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('lfrtip')
            ->orderBy(1);
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
            Column::make('nombre'),
            Column::make('users_count')
                ->searchable(false),
            Column::make('fecha_entrega'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(175)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Proyects_' . date('YmdHis');
    }
}
