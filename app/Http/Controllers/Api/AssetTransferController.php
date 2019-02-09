<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AssetTransfer;
use App\Department;
use App\UserNew;
use App\asset;
use DB;
class AssetTransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = AssetTransfer::all(); //paginate(x) or all() , x is the no of items on a page
       // return $result;

        return response()->json($result);
    }

    
    public function getDepartmentData(){
        $data = DB::table('departments')->select('id')->get();
       // $type = $request->type;
        //$data = asset::all();
       // $data = asset::where('type', $type)->get();
        return response()->json(['departments' => $data]);// asset::all();
        //return "kamal";
    }
   
    public function getUserData(){
        $data = DB::table('users')->select('id')->get();
       // $type = $request->type;
        //$data = asset::all();
       // $data = asset::where('type', $type)->get();
        return response()->json(['users' => $data]);// asset::all();
        //return "kamal";
    }
    public function getAssetID(){
        $data = DB::table('assets')->select('id')->get();
       // $type = $request->type;
        //$data = asset::all();
       // $data = asset::where('type', $type)->get();
        return response()->json(['assetID' => $data]);// asset::all();
        //return "kamal";
    }
    public function getAssetType(){
        $data = DB::table('assets')->select('id','type')->get();
       // $type = $request->type;
        //$data = asset::all();
       // $data = asset::where('type', $type)->get();
        return response()->json(['assetType' => $data]);// asset::all();
        //return "kamal";
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
         $y = $request->transfer_toDept;

        $t = DB::table('departments')->select('id')->where('name', $y)->get();
        // return response()->json($t);


       // INSERT INTO AssetTransfer (reason,fromDept,toDept,fromUser,toUser,assetType,assetId,comment) VALUES ( $request->transfer_reason, $request->transfer_fromDept, $t, $request->transfer_fromUser, $request->transfer_toUser,$request->transfer_assetType,$request->transfer_assetID,$request->transfer_comment);
        
        $transfer = new AssetTransfer();
        //fill the user id and department id column
         $transfer->reason = $request->transfer_reason;
         $transfer->fromDept = $request->transfer_fromDept;
        // $transfer->toDept = $t;// $request->transfer_toDept;
         $transfer->fromUser = $request->transfer_fromUser;
         $transfer->toUser = $request->transfer_toUser;
         $transfer->assetType = $request->transfer_assetType;
         $transfer->assetID= $request->transfer_assetID;
         $transfer->comment= $request->transfer_comment;
         $transfer->AssetTransfer()->associate($AssetTransfer);
         $transfer->save();

        
    }

    public function shows()
    {
        $users = DB::table('users')->select('id')->where('name', '=', 'Dinooli')->get();
        return response()->json($users);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function show($id)
    {
        //
    }*/

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
           
        $transfer=AssetTransfer::find($id);
        $transfer->delete();
    }
}
