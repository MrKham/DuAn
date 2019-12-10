<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Backer;
use Excel;

class BackerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.backer.index');
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

    public function export($project_id)
    {
        if ($project_id == 'all') $datas = Backer::with('project')->orderBy('created_at')->get();
        else $datas = Backer::whereProjectId($project_id)->with('project')->orderBy('created_at')->get();
        $arr = [];
        foreach ($datas as $data) {
            $array = [];
            $array['Thành viên ủng hộ'] = $data->name;
            $array['Email'] = $data->email;
            $array['Dự án'] = $data->project->name;
            $array['Số tiền'] = $data->amount;
            $array['Transaction No'] = $data->transaction_no;
            $array['Transaction Ref'] = $data->transaction_ref;
            $array['Trạng thái'] = $data->status;
            $array['Thời gian'] = $data->created_at;
            $array['Địa điểm nhận quà'] = $data->address;

            array_push($arr, $array);
        }
        // dd($arr);
        Excel::create('export_backers', function($excel) use ($arr) {

            $excel->sheet('sheet 1', function($sheet) use ($arr) {

                $sheet->fromArray($arr);

            });

        })->export('xlsx');
    }
}
