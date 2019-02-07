<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\AssetRequest;
use App\UserNew;
use Illuminate\Http\Request;
use App\Http\Resources\Request as RequestResource;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arequest = UserNew::find(1)->assetrequest;
        //get requests 15 per page
        //assetrequest is model and make sure u use model at top
        //$arequest= AssetRequest::paginate(5);

        //return collection of requests(15) as a resource
        //requestResource is the resource we created and make sure u use resource at top
       // return RequestResource::collection($arequest);
        return response()->json($arequest); //return as json object
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
        //if put request's id  is not found, get it , else create a new arequest with id 
        $arequest= $request->isMethod('put') ? AssetRequest::findOrFail
        ($request->id):new AssetRequest;
        
        //with id specified below
        $arequest->id = $request->input('id');
        $arequest->type = $request->input('type');
        $arequest->from = $request->input('from');
        $arequest->to = $request->input('to');
        $arequest->description = $request->input('description');
        $arequest->status = $request->input('status');
        $arequest->reason = $request->input('reason');
        $arequest->user_id = $request->input('user_id');
        $arequest->department_id = $request->input('department_id');
        
      
        //and save it
        if($arequest->save()){
            return new RequestResource($arequest);
    }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          //get a single request,id comes from the route
          $arequest = AssetRequest::findOrFail($id);

          //Return a single request as a resource
          return new RequestResource($arequest);
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get a single arequest,id comes from the route
        $arequest = AssetRequest::findOrFail($id);

        //destroy a single arequest as a resource
        if($arequest->delete()){
            return new RequestResource($arequest);
        }
    }
    }
