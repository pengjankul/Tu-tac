<?php

namespace App\Http\Controllers;

use App\Exports\AccChartExport;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateAccountChartsRequest;
use App\Http\Requests\UpdateAccountChartsRequest;
use App\Models\AccountChart;
use App\Repositories\AccountChartsRepository;
use Carbon\Carbon;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Response;

class AccountChartController extends AppBaseController
{
    /** @var  AccountChartsRepository */
    private $accountChartsRepository;

    public function __construct(AccountChartsRepository $accountChartsRepo)
    {
        $this->accountChartsRepository = $accountChartsRepo;
    }

    public function index()
    {
        // dd('sd');
        return view('account_charts.index');
    }

    /**
     * Show the form for creating a new AccountChart.
     *
     * @return Response
     */
    public function create()
    {
        return view('account_charts.create');
    }

    /**
     * Store a newly created AccountChart in storage.
     *
     * @param CreateAccountChartsRequest $request
     *
     * @return Response
     */
    public function store(CreateAccountChartsRequest $request)
    {
        $input = $request->all();

        $input['grp_chartid'] = 1;
        $input['user_add'] = auth()->user()->id;
        $input['user_update'] = auth()->user()->id;

        if ($input['achart_parent_id'] == '') {
            $input['achart_parent_id'] = null;
        }

        $input['datetime_add'] = Carbon::createFromTimestamp(date('now'))->toDateTimeString();
        $input['datetime_update'] = Carbon::createFromTimestamp(date('now'))->toDateTimeString();
        // dd(date('now'));

        $accountCharts = $this->accountChartsRepository->create($input);

        // return redirect(route('accountCharts.index'));
        return response()->json(['responseText' => 'Success!'], 200);
    }

    /**
     * Display the specified AccountChart.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $accountCharts = $this->accountChartsRepository->find($id);

        if (empty($accountCharts)) {
            Flash::error('Account Charts not found');

            return redirect(route('accountCharts.index'));
        }

        return view('account_charts.show')->with('accountCharts', $accountCharts);
    }

    /**
     * Show the form for editing the specified AccountChart.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $accountCharts = $this->accountChartsRepository->find($id);

        if (empty($accountCharts)) {
            Flash::error('Account Charts not found');

            return redirect(route('accountCharts.index'));
        }

        return view('account_charts.edit')->with('accountCharts', $accountCharts);
    }

    /**
     * Update the specified AccountChart in storage.
     *
     * @param  int              $id
     * @param UpdateAccountChartsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAccountChartsRequest $request)
    {

        $id = $request->id;
        $accountCharts = $this->accountChartsRepository->find($id);

        $input = $request->all();
        $input['user_update'] = auth()->user()->id;
        $input['datetime_update'] = Carbon::createFromTimestamp(date('now'))->toDateTimeString();

        $accountCharts = $this->accountChartsRepository->update($input, $id);

        return response()->json(['responseText' => 'Success!'], 200);
    }

    /**
     * Remove the specified AccountChart from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $accountCharts = $this->accountChartsRepository->find($id);

        $this->accountChartsRepository->delete($id);

        return response()->json(['responseText' => 'Success!'], 200);
    }

    //get Account Json
    public function getAccountChart()
    {
        $data = $this->accountChartsRepository->getTree();
        return response()->json($data, 200);
    }

    public function getAccountID(Request $request)
    {
        $id = $request->id;
        $accountCharts = $this->accountChartsRepository->find($id);
        $data = $accountCharts->toArray();
        $data['parentName'] = '';
        if ($accountCharts->parent != null) {
            $parent = $accountCharts->parent->toArray();
            $data['parentName'] = @$parent['chart_code'];
        }
        return response()->json($data, 200);
    }

    public function export()
    {
        return Excel::download(new AccChartExport(), 'accountingChart.xlsx');
    }

    public function insertAccountTmp()
    {
        //insert root 1
        // $data1 = DB::table('CHART OF ACCOUNT1')->where('f3', 0)->get();
        // foreach ($data1 as $key => $value) {

        //     DB::table('account_chart_tmp')->insert([
        //         ['AccGroupID' => '1',
        //             'AccChartNumber' => $value->f1,
        //             'NameTh' => $value->f9,
        //             'Detail' => $value->f15,
        //             'Type' => 'เคบิต',
        //             'ChartType' => 'ได้',
        //             'Format' => 1,
        //             'UserAdd' => auth()->user()->id,
        //             'DateTimeAdd' => Carbon::createFromTimestamp(date('now'))->toDateTimeString(),
        //             'UserUpdate' => auth()->user()->id,
        //             'DateTimeUpdate' => Carbon::createFromTimestamp(date('now'))->toDateTimeString(),
        //             'Allow' => 'ปกติ',
        //         ],

        //     ]);
        // }

        //insert sub root 2
        // $root = DB::table('account_chart_tmp')->get();
        // foreach ($root as $key => $val) {
        //     $data1 = DB::table('CHART OF ACCOUNT1')->where([
        //         ['f4', '=', '00'],
        //         ['f3', '!=', '0'],
        //         ['f2', '=', $val->AccChartID],
        //     ])->get();

        //     foreach ($data1 as $key => $value) {
        //         DB::table('account_chart_tmp')->insert([
        //             [
        //                 'AccGroupID' => '1',
        //                 'AccChartParentrtID' => $val->AccChartID,
        //                 'AccChartNumber' => $value->f1,
        //                 'NameTh' => $value->f10,
        //                 'Detail' => $value->f15,
        //                 'Type' => 'เคบิต',
        //                 'ChartType' => 'ได้',
        //                 'Format' => 1,
        //                 'UserAdd' => auth()->user()->id,
        //                 'DateTimeAdd' => Carbon::createFromTimestamp(date('now'))->toDateTimeString(),
        //                 'UserUpdate' => auth()->user()->id,
        //                 'DateTimeUpdate' => Carbon::createFromTimestamp(date('now'))->toDateTimeString(),
        //                 'Allow' => 'ปกติ',
        //             ],

        //         ]);
        //     }

        // }

        // //insert th root 3
        // $root = DB::table('account_chart_tmp')->whereNotNull('AccChartParentrtID')
        //     ->where(\DB::raw('substr(AccChartNumber, 1, 1)'), '!=', '0')->get();

        // foreach ($root as $key => $val) {

        //     $data1 = DB::table('CHART OF ACCOUNT1')->where([
        //         ['f5', '=', '00'],
        //         ['f4', '!=', '00'],
        //         ['f3', '=', substr($val->AccChartNumber, 1, 1)],
        //         ['f2', '=', substr($val->AccChartNumber, 0, 1)],
        //     ])->get();

        //     foreach ($data1 as $key => $value) {
        //         DB::table('account_chart_tmp')->insert([
        //             [
        //                 'AccGroupID' => '1',
        //                 'AccChartParentrtID' => $val->AccChartID,
        //                 'AccChartNumber' => $value->f1,
        //                 'NameTh' => $value->f11,
        //                 'Detail' => $value->f15,
        //                 'Type' => 'เคบิต',
        //                 'ChartType' => 'ได้',
        //                 'Format' => 1,
        //                 'UserAdd' => auth()->user()->id,
        //                 'DateTimeAdd' => Carbon::createFromTimestamp(date('now'))->toDateTimeString(),
        //                 'UserUpdate' => auth()->user()->id,
        //                 'DateTimeUpdate' => Carbon::createFromTimestamp(date('now'))->toDateTimeString(),
        //                 'Allow' => 'ปกติ',
        //             ],

        //         ]);
        //     }

        // }
        // dd($data);

        //insert th root 4
        // $root = DB::table('account_chart_tmp')->whereNotNull('AccChartParentrtID')
        //     ->where(\DB::raw('substr(AccChartNumber, 3, 2)'), '!=', '00')->get();
        // // dd($root);
        // foreach ($root as $key => $val) {

        //     $data1 = DB::table('CHART OF ACCOUNT1')->where([
        //         ['f6', '=', '00'],
        //         ['f5', '!=', '00'],
        //         ['f4', '=', substr($val->AccChartNumber, 2, 2)],
        //         ['f3', '=', substr($val->AccChartNumber, 1, 1)],
        //         ['f2', '=', substr($val->AccChartNumber, 0, 1)],
        //     ])->get();

        //     foreach ($data1 as $key => $value) {
        //         DB::table('account_chart_tmp')->insert([
        //             [
        //                 'AccGroupID' => '1',
        //                 'AccChartParentrtID' => $val->AccChartID,
        //                 'AccChartNumber' => $value->f1,
        //                 'NameTh' => $value->f12,
        //                 'Detail' => $value->f15,
        //                 'Type' => 'เคบิต',
        //                 'ChartType' => 'ได้',
        //                 'Format' => 1,
        //                 'UserAdd' => auth()->user()->id,
        //                 'DateTimeAdd' => Carbon::createFromTimestamp(date('now'))->toDateTimeString(),
        //                 'UserUpdate' => auth()->user()->id,
        //                 'DateTimeUpdate' => Carbon::createFromTimestamp(date('now'))->toDateTimeString(),
        //                 'Allow' => 'ปกติ',
        //             ],

        //         ]);
        //     }

        // }

        //insert th root 5
        // $root = DB::table('account_chart_tmp')->whereNotNull('AccChartParentrtID')
        //     ->where(\DB::raw('substr(AccChartNumber, 5, 2)'), '!=', '00')->get();

        // foreach ($root as $key => $val) {

        //     $data1 = DB::table('CHART OF ACCOUNT1')->where([
        //         ['f7', '=', '00'],
        //         ['f6', '!=', '00'],
        //         ['f5', '=', substr($val->AccChartNumber, 4, 2)],
        //         ['f4', '=', substr($val->AccChartNumber, 2, 2)],
        //         ['f3', '=', substr($val->AccChartNumber, 1, 1)],
        //         ['f2', '=', substr($val->AccChartNumber, 0, 1)],
        //     ])->get();
        //     // dd($data1);
        //     // $data[] = $data1;
        //     foreach ($data1 as $key => $value) {
        //         DB::table('account_chart_tmp')->insert([
        //             [
        //                 'AccGroupID' => '1',
        //                 'AccChartParentrtID' => $val->AccChartID,
        //                 'AccChartNumber' => $value->f1,
        //                 'NameTh' => $value->f13,
        //                 'Detail' => $value->f15,
        //                 'Type' => 'เคบิต',
        //                 'ChartType' => 'ได้',
        //                 'Format' => 1,
        //                 'UserAdd' => auth()->user()->id,
        //                 'DateTimeAdd' => Carbon::createFromTimestamp(date('now'))->toDateTimeString(),
        //                 'UserUpdate' => auth()->user()->id,
        //                 'DateTimeUpdate' => Carbon::createFromTimestamp(date('now'))->toDateTimeString(),
        //                 'Allow' => 'ปกติ',
        //             ],

        //         ]);
        //     }

        // }

        // insert data last end

        $root = DB::table('account_chart_tmp')->whereNotNull('AccChartParentrtID')
            ->where(\DB::raw('substr(AccChartNumber, 5, 2)'), '!=', '00')
            ->where(\DB::raw('substr(AccChartNumber, 7, 2)'), '=', '00')->get();
        // dd($root);
        foreach ($root as $key => $val) {

            $data1 = DB::table('CHART OF ACCOUNT1')->where([
                ['f14', '!=', null],
                // ['f7', '=', '00'],
                // ['f6', '!=', '00'],
                ['f5', '=', substr($val->AccChartNumber, 4, 2)],
                ['f4', '=', substr($val->AccChartNumber, 2, 2)],
                ['f3', '=', substr($val->AccChartNumber, 1, 1)],
                ['f2', '=', substr($val->AccChartNumber, 0, 1)],
            ])->get();

            foreach ($data1 as $key => $value) {

                $count = DB::table('account_chart_tmp')->whereNotNull('AccChartParentrtID')
                    ->where(\DB::raw('substr(AccChartNumber, 1, 6)'), '=', substr($value->f1, 0, 6))
                    ->where(\DB::raw('substr(AccChartNumber, 7, 2)'), '=', $value->f6)
                    ->where('AccChartParentrtID', '=', $val->AccChartID)->first();

                if (!empty($count)) {

                    // dd(substr($count->AccChartNumber, 7, 3));
                    if (substr($count->AccChartNumber, 7, 3) == '101') {
                        DB::table('account_chart_tmp')->insert([
                            [
                                'AccGroupID' => '1',
                                'AccChartParentrtID' => $val->AccChartID,
                                'AccChartNumber' => $value->f1,
                                'NameTh' => $value->f14,
                                'Detail' => $value->f15,
                                'Type' => 'เคบิต',
                                'ChartType' => 'ได้',
                                'Format' => 1,
                                'UserAdd' => auth()->user()->id,
                                'DateTimeAdd' => Carbon::createFromTimestamp(date('now'))->toDateTimeString(),
                                'UserUpdate' => auth()->user()->id,
                                'DateTimeUpdate' => Carbon::createFromTimestamp(date('now'))->toDateTimeString(),
                                'Allow' => 'ปกติ',
                            ],

                        ]);
                    } else {
                        DB::table('account_chart_tmp')->insert([
                            [
                                'AccGroupID' => '1',
                                'AccChartParentrtID' => $count->AccChartID,
                                'AccChartNumber' => $value->f1,
                                'NameTh' => $value->f14,
                                'Detail' => $value->f15,
                                'Type' => 'เคบิต',
                                'ChartType' => 'ได้',
                                'Format' => 1,
                                'UserAdd' => auth()->user()->id,
                                'DateTimeAdd' => Carbon::createFromTimestamp(date('now'))->toDateTimeString(),
                                'UserUpdate' => auth()->user()->id,
                                'DateTimeUpdate' => Carbon::createFromTimestamp(date('now'))->toDateTimeString(),
                                'Allow' => 'ปกติ',
                            ],

                        ]);
                    }

                } else {
                    DB::table('account_chart_tmp')->insert([
                        [
                            'AccGroupID' => '1',
                            'AccChartParentrtID' => $val->AccChartID,
                            'AccChartNumber' => $value->f1,
                            'NameTh' => $value->f14,
                            'Detail' => $value->f15,
                            'Type' => 'เคบิต',
                            'ChartType' => 'ได้',
                            'Format' => 1,
                            'UserAdd' => auth()->user()->id,
                            'DateTimeAdd' => Carbon::createFromTimestamp(date('now'))->toDateTimeString(),
                            'UserUpdate' => auth()->user()->id,
                            'DateTimeUpdate' => Carbon::createFromTimestamp(date('now'))->toDateTimeString(),
                            'Allow' => 'ปกติ',
                        ],

                    ]);
                }
                // ->where(\DB::raw('substr(AccChartNumber, 7, 2)'), '=', '00')->get();
                // $parent = DB::table('CHART OF ACCOUNT1')->where([
                //     ['f14', '!=', null],
                //     // ['f7', '=', '00'],
                //     ['f6', '!=', '00'],
                //     ['f5', '=', substr($value->AccChartNumber, 4, 2)],
                //     ['f4', '=', substr($value->AccChartNumber, 2, 2)],
                //     ['f3', '=', substr($value->AccChartNumber, 1, 1)],
                //     ['f2', '=', substr($value->AccChartNumber, 0, 1)],
                // ])->get();
                // DB::table('account_chart_tmp')->insert([
                //     [
                //         'AccGroupID' => '1',
                //         'AccChartParentrtID' => $val->AccChartID,
                //         'AccChartNumber' => $value->f1,
                //         'NameTh' => $value->f13,
                //         'Detail' => $value->f15,
                //         'Type' => 'เคบิต',
                //         'ChartType' => 'ได้',
                //         'Format' => 1,
                //         'UserAdd' => auth()->user()->id,
                //         'DateTimeAdd' => Carbon::createFromTimestamp(date('now'))->toDateTimeString(),
                //         'UserUpdate' => auth()->user()->id,
                //         'DateTimeUpdate' => Carbon::createFromTimestamp(date('now'))->toDateTimeString(),
                //         'Allow' => 'ปกติ',
                //     ],

                // ]);
            }

        }

        dd($data);
    }
}
