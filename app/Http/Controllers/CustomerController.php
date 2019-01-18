<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Crypt;
use Auth;

class CustomerController extends Controller
{

    // function __construct(){
    //     // $this->middleware('customer');
    //     $this->middleware('guest')->except('logout');
    //     $this->middleware('guest:customer')->except('logout');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        if(auth('customer')->user()){
            return 'berhasil ke halaman setelah login';
        }
        //   return 'login gagal';
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
    //   Session::flush();
      Auth::guard('customer')->logout();
      return redirect('/blog');

    }

    public function login(Request $request){

      $email = $request->email;
      $password = $request->password;

      $cekCustomer = Customer::whereEmail($email)
      ->first();
        if(count($cekCustomer) > 0){ //apakah email tersebut ada atau tidak
            if(\Hash::check($password,$cekCustomer->password)){
                $credentials = [
                    'email' =>  $cekCustomer->email,
                    'password' =>  $password,
                ];
                // return $credentials;
                $auth = Auth::guard('customer')->attempt($credentials);
                // dd($auth);
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
        return auth('customer')->user();
    }
}
