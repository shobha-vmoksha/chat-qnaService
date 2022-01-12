<?php

namespace App\Http\Controllers;

use App\Jobs\SalesCsvProcess;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('upload-file');
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


    public function upload(Request $request)
    {
        if ($request->hasFile('mycsv')){

            $data = file($request->mycsv);

            //dd($data);
            //chunking file
            //convert 1000 records into new csv file
            $chunks = array_chunk($data, 1000);

            $header = [];
            $batch = Bus::batch([])->dispatch();
            foreach($chunks as $key => $value){
                $data = array_map('str_getcsv', $value);
                if($key == 0){
                    $header = $data[0];
                    //dd($header);
                    unset($data[0]);
                }

                $batch->add(new SalesCsvProcess($data, $header));
            }

        return $batch;
        }else{
            return 'please upload file';
        }
    }



    public function batch()
    {
        $batchId = request('id');
        return Bus::findBatch($batchId);
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