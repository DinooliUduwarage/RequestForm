<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AssetRequest;
use App\UserNew;
use App\asset;
use DB;
class AssetRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //$arequest = App\AssetRquest::find(1)->userNew;

        $result = AssetRequest::all(); //paginate(x) or all() , x is the no of items on a page
       // return $result;

        return response()->json($result);
        //php artisan cache:clear
        //php artisan config:cache
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
        $arequest = new AssetRequest();
       // $arequest->name = $request->category_name;
       //fill the user id and department id column
        $arequest->type = $request->arequest_type;
        $arequest->from = $request->arequest_from;
        $arequest->to = $request->arequest_to;
        $arequest->description = $request->arequest_description;
        $arequest->reason = $request->arequest_reason;
        $arequest->user_id = 1;
        $arequest->department_id = 8;
        $arequest->save();

        return redirect ('requests')->with('success','Post Created Successfully');
    }


    public function getFormData(){
        $data = DB::table('assets')->select('type')->get();
       // $type = $request->type;
        //$data = asset::all();
       // $data = asset::where('type', $type)->get();
        return response()->json(['assets' => $data]);// asset::all();
        //return "kamal";
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
        $arequest=AssetRequest::find($id);
        return $arequest;
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
        $arequest=AssetRequest::find($id);
        $arequest->type = $request->arequest_type;
        $arequest->from = $request->arequest_from;
        $arequest->to = $request->arequest_to;
        $arequest->description = $request->arequest_description;
        $arequest->reason = $request->arequest_reason;
        $arequest->user_id = 1;
        $arequest->department_id = 8;
        $arequest->save();

    
      
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $arequest=AssetRequest::find($id);
        $arequest->delete();
    }

    public function approve(Request $request,$id)
    {
        $arequest=AssetRequest::find($id);
        $arequest->status = $request->arequests_status;
        $arequest->save();
    }

    public function reject(Request $request,$id)
    {
        $arequest=AssetRequest::find($id);
        $arequest->status = $request->arequests_status;
        $arequest->save();
    }

}
