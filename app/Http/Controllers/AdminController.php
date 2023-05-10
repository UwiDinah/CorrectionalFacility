<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
        /**
    * @OA\Get(
    *      path="/api/AdminListings",
    *      operationId="Titlings",
    *      tags={"Admin Route"},
    *       summary="Summaries",
    *      description="AdminDescription",
    *      @OA\Response(
    *          response=200,
    *          description="Successfully retreived the data",
    *       ),
    *     )
    */
    function AdminListing(){
        return User::all();
    }

    /**
    * @OA\Post(
    *      path="/api/RegisteringAdmin",
    *      operationId="Tittlin",
    *      tags={"Admin Route"},
    *      summary="Summaries",
    *      description="AdminDescriptions",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent()
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Response Message",
    *          @OA\JsonContent()
    *       ),
    *     )
    */
    function registerADmin(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>"required|email",
            'password'=>"min:6|confirmed"
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ]);


        return response([
            'message'=>'user Created',
            'user'=>$user,
        'token'=>$user->createToken('Api Token Of'. $user->name)->plainTextToken,
        ],200);
    }

  /**
    * @OA\Post(
    *      path="/api/approve",
    *      operationId="App",
    *      tags={"Admin Route"},
    *      summary="Summaries",
    *      description="AdminDescriptions",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent()
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Response Message",
    *          @OA\JsonContent()
    *       ),
    *     )
    */


    public function approve($id)
    {
        $admin = Admin::find($id);
        $admin->approved = true;
        $admin->save();

        // Redirect or return a response as needed
    }

     /**
    * @OA\Post(
    *      path="/api/reject",
    *      operationId="Rej",
    *      tags={"Admin Route"},
    *      summary="Summaries",
    *      description="AdminDescriptions",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent()
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Response Message",
    *          @OA\JsonContent()
    *       ),
    *     )
    */

    public function reject($id)
    {
        $admin = Admin::find($id);
        $admin->approved = false;
        $admin->save();

        // Redirect or return a response as needed
    }
}
