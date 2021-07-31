<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
  public function __construct(){
        $this->middleware('checkuser')->only('store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $uName= $request->has('uname')?$request->get('uname'):'';
      $pass= $request->has('pass')?$request->get('pass'):'';

      $userInfo= User::where('name','=', $uName)->where('password', '=', $pass)->first();

      if(isset($userInfo)&& $userInfo!=null){
       // return redirect('/admin_products');
         $product_controller= new ProductController();
          return $product_controller->addProduct();
      } else{
         return redirect()->back()->with('failure', 'Username or password is not matched!!');
      }
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
      // return $request->all();
      User::insert([
          'name'=>$request->has('uname')? $request->get('uname'):'',
          'email'=>$request->has('email')? $request->get('email'):'',
          'mobile'=>$request->has('mobile')? $request->get('mobile'):'',
          'password'=>$request->has('pass')? $request->get('pass'):'',
      ]);

      return redirect('/admin_products');
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
