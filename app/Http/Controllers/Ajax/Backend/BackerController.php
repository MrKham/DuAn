<?php

namespace App\Http\Controllers\Ajax\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

use App\Models\Backer;

class BackerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->project_id) 
        {
            // $categories = Backer::with('project')->whereProjectId($request->project_id)->orderBy('created_at')->get();
            $categories = Backer::query()->with('project')->whereProjectId($request->project_id)->orderBy('created_at', 'desc');
        }
        else
        {
            // $categories = Backer::with('project')->orderBy('created_at')->get();
            $categories = Backer::query()->with('project')->orderBy('created_at', 'desc');
        }

        return Datatables::of($categories)
            ->editColumn('amount', function($u) {
                return number_format($u->amount) . ' VNĐ';
            })
            ->addColumn('project_name', function($u) {
                $action = [];
                $action[] = isset($u->project) ? $u->project->name : '';

                return implode(' ', $action);
            })
            ->addColumn('action', function ($u) {
                $action = [];
                $action[] = '<div style="display: inline-flex"><div>' . \Form::lbButton(
                    "ajax/refund-one-transaction-in-project/{$u->id}",
                    'put',
                    'Refund',
                    [
                        "class" => "btn btn-table btn-primary",
                        "onclick" => "return confirm('Hoàn tiền cho giao dịch này?')",
                        // "style" => "margin-right: 10px;"
                    ]
                )->toHtml() . '</div>';
                // $action[] = '<div style="display: inline-flex"><div>' . \Form::lbButton(
                //     "blacklists/{$u->id}/edit",
                //     'get',
                //     'Mark As Refunded',
                //     [
                //         "class" => "btn btn-table btn-primary",
                //         "onclick" => "return confirm('Chuyển trạng thái hoàn tiền cho giao dịch này?')"
                //     ]
                // )->toHtml() . '</div>';
                return implode(' ', $action);
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
