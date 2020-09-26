<?php

namespace App\DataTables;

use App\Models\Quotation;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class QuotationDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'quotations.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Quotation $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Quotation $model)
    {
        return $model->newQuery();
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
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('lang.actions')])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    [
                       'extend' => 'create',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-plus"></i> ' .__('auth.app.create').''
                    ],
                    [
                       'extend' => 'export',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-download"></i> ' .__('auth.app.export').''
                    ],
                    [
                       'extend' => 'print',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-print"></i> ' .__('auth.app.print').''
                    ],
                    [
                       'extend' => 'reset',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-undo"></i> ' .__('auth.app.reset').''
                    ],
                    [
                       'extend' => 'reload',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-refresh"></i> ' .__('auth.app.reload').''
                    ],
                ],
                 'language' => [
                   'url' => url('//cdn.datatables.net/plug-ins/1.10.12/i18n/English.json'),
                 ],
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
            'reference_no' => new Column(['title' => __('models/quotations.fields.reference_no'), 'data' => 'reference_no']),
            'total_qty' => new Column(['title' => __('models/quotations.fields.total_qty'), 'data' => 'total_qty']),
            'total_price' => new Column(['title' => __('models/quotations.fields.total_price'), 'data' => 'total_price']),
            'quotation_status' => new Column(['title' => __('models/quotations.fields.quotation_status'), 'data' => 'quotation_status']),
            'user_id' => new Column(['title' => __('models/quotations.fields.user_id'), 'data' => 'user_id']),
            'supplier_id' => new Column(['title' => __('models/quotations.fields.supplier_id'), 'data' => 'supplier_id']),
            'customer_id' => new Column(['title' => __('models/quotations.fields.customer_id'), 'data' => 'customer_id']),
            'department_id' => new Column(['title' => __('models/quotations.fields.department_id'), 'data' => 'department_id'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'quotations_datatable_' . time();
    }
}
