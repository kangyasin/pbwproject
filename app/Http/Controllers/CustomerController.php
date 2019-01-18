<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Crypt;
use Auth;

class CustomerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        if(auth('customer')->user()){
            return redirect('/customer/profile');
        }
        return view('front/customer/login');
    }

    public function registerpage(){
        return view('front/customer/register');
    }


    /**
    * customer register action
    */
    public function register(Request $request){

      // return $request;
        $this->validate($request , [
            'name' => 'required|min:5',
            'email' => 'email',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|min:6'
          ]);

          $cekemail = Customer::where('email', $request->email)->first();

          if($cekemail){
              return 'customer sudah terdaftar';
          }

          $customer = new Customer();
          $customer->name = $request->name;
          $customer->email = $request->email;
          $customer->password = bcrypt($request->password);
          $customer->save();

          return 'berhasil daftar';
    }

    /**
    * customer register page
    */

    public function register_page(){
      return view('front/customer/register');
    }

    /**
    * customer do logout
    */

    public function logout()
    {
    //   Session::flush();
      Auth::guard('customer')->logout();
      return redirect('/blog');

    }

    public function login(Request $request){

      $email = $request->email;
      $password = $request->password;

      $cekCustomer = Customer::whereEmail($email);
        if($cekCustomer->count() > 0){ //apakah email tersebut ada atau tidak
          $cekCustomer = $cekCustomer->first();

            if(\Hash::check($password,$cekCustomer->password)){
                $credentials = [
                    'email' =>  $cekCustomer->email,
                    'password' =>  $password,
                ];

                $auth = Auth::guard('customer')->attempt($credentials);
                if($auth){
                    return redirect('/customer/profile');
                  }else{
                    return redirect('/front/login');
                  }
            }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function profile(){
        $auth = auth('customer')->user();
        $customer = Customer::find($auth->id);
        return view('front/customer/profile', compact('customer'));
    }




}
