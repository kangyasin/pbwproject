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
    public function index()
    {
        // return auth('customer')->user();
        //cek if exist customer login
        if(auth('customer')->user()){
            return 'berhasil ke halaman setelah login';
        }

        return view('front/customer/login');

    }

    /**
    * customer register action
    */

    public function register(Request $request){

      $customer = new Customer();
      $customer->name = 'yasin';
      $customer->email = 'customer2@pbw.com';
      $customer->password = bcrypt('demo123');
      $customer->save();

      return 'berhasil daftar';


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
      Auth::guard('customer')->logout();
      return redirect('/blog');

    }

    public function login(Request $request){

      $email = $request->email;
      $password = bcrypt($request->password);

      $cekCustomer = Customer::whereEmail($email)->first();
      // return $cekstatus;
      $credentials = [
          'email' =>  $cekCustomer->email,
          'password' =>  $cekCustomer->password,
      ];
      // return $credentials;
      if($cekCustomer){
        $auth = Auth::guard('customer')->attempt($credentials);
      }
      dd($auth);
      if(isset($auth)){
        return redirect('/front/login');
        return "Berhasil Login";
      }else{
        return "Gagal";
      }

      dd($request);
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
}
