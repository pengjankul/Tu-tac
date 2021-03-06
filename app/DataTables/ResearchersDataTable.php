<?php

namespace App\DataTables;

use App\Models\Researchers;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class ResearchersDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'researchers.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Researchers $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Researchers $model)
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
            ->addAction(['width' => '120px', 'printable' => false, 'title' => 'การกระทำ'])
            ->parameters([
                // 'dom' => "<'row'<'col-sm-12 col-md-10'B><'col-sm-12 col-md-2'f>>rt<'row'<'col-sm-12 col-md-10'i><'col-sm-12 col-md-2'p>>",
                'dom' => "rt<'row'<'col-lg-1 col-centered'p>>",
                'stateSave' => true,
                "bSort" => false,
                'order' => [[0, 'desc']],
                'buttons' => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner'],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner'],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner'],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner'],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner'],
                ],
                "oLanguage" => [
                    "oPaginate" => [
                        "sFirst" => '<i class="icofont-double-left icofont-1x"  aria-hidden="true"></i>',
                        "sPrevious" => '<i class="icofont-double-left icofont-1x"  aria-hidden="true"></i>',
                        "sNext" => '<i class="icofont-double-right icofont-1x"  aria-hidden="true"></i>',
                        "sLast" => '<i class="icofont-double-right icofont-1x"  aria-hidden="true"></i>',
                    ],
                    "sSearch" => '',
                    "sEmptyTable" => 'ไม่พบข้อมูล',
                    "sZeroRecords" => 'ไม่พบข้อมูล',
                    "sProcessing" => "กำลังดำเนินการ...",
                    "sLengthMenu" => "แสดง _MENU_ แถว",
                    "sZeroRecords" => "ไม่พบข้อมูล",
                    // "sInfo"=>      "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว / รายการทั้งหมด จำนวน _TOTAL_ รายการ (แบ่งออกเป็น _PAGES_ หน้า หน้าละ 50 รายการ)",
                    "sInfo" => "รายการทั้งหมด จำนวน _TOTAL_ รายการ (แบ่งออกเป็น _PAGES_ หน้า หน้าละ 100 รายการ)",
                    // "sInfoEmpty"=> "แสดง 0 ถึง 0 จาก 0 แถว",
                    "sInfoEmpty" => "รายการทั้งหมด จำนวน 0 รายการ (แบ่งออกเป็น _PAGES_ หน้า หน้าละ 100 รายการ)",
                    // "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
                    "sInfoFiltered" => "",
                    "sInfoPostFix" => "",
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
            'rescode' => ['width' => '10%', 'title' => 'รหัสลูกค้า', 'name' => 'rescode', 'data' => 'rescode'],
            'nameth' => ['width' => '40%', 'title' => 'ชื่อลูกค้า', 'name' => 'nameth', 'data' => 'nameth'],
            'user_add' => ['width' => '10%', 'title' => 'ผู้ทำรายการ', 'name' => 'user_add', 'data' => 'user_add'],
            'datetime_update' => ['width' => '10%', 'title' => 'วันที่ล่าสุด', 'name' => 'datetime_update', 'data' => 'datetime_update'],
            'datetime_add' => ['width' => '10%', 'title' => 'สร้างเอกสาร', 'name' => 'datetime_add', 'data' => 'datetime_add'],
            'fag_allow' => ['width' => '10%', 'title' => 'สถานะ', 'name' => 'fag_allow', 'data' => 'fag_allow'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'researchersdatatable_' . time();
    }
}
