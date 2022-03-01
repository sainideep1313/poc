<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
use App\Http\Middleware\BlogWare;
// use App\Http\Controllers\DB;
use Illuminate\Support\Facades\DB;
use App\Models\Signup;


use Illuminate\Validation\Rules\Password;


class SignupController extends Controller
{

  public function signup(){
      return view('/signup');
  }
  public function addData(Request $request){
     
    $request->validate([
          'name'=>'required',
        'email'=>'required|email',
        'phone'=>'required',
        'username'=>'required',
        'password'=>['required',Password::min(8)->letters()->numbers()->mixedCase()->symbolS()],
      ]);

                
        $first_step =
        ['name'=>$request['name'],
        'email'=>$request['email'],
        'phone'=>$request['phone'],
        'username'=>$request['username'],
        'password'=>bcrypt($request['password']),];

        $ff =  $request->session()->put('first_step', $first_step);       
        return redirect('/img');  
     }

  public function imgSignup(){
    // $config['center'] = 'Moradabad,UttarPradesh';
    // $config['zoom'] = '14';
    // $config['map_height'] = '400px';

    // $gmap = new GMaps();
    // $gmap->initialize($config);
 
    // $map = $gmap->create_map();
    // return view('/imgSignup',compact('map'));
      return view('/imgSignup');
  }

  public function addImage(Request $request){
    
    $previous_step_get = $request->session()->get('first_step');
    if (!$request->session()->has('first_step'))
    {
        echo "something went wrong";
        return redirect('/signup');
    }    

    $temp= new Signup();
    $temp->name=$previous_step_get['name'];
    $temp->email=$previous_step_get['email'];
    $temp->phone=$previous_step_get['phone'];
    $temp->username=$previous_step_get['username'];
    $temp->password=$previous_step_get['password'];

    if($request->hasfile('file'))
    {
           
        $request->validate([
            'file'=>'required|mimes:jpeg,bmp,png',
        
        ]);

        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move(public_path() . '/images/',$filename);
        $temp->file = $filename;
    } 
          
    $temp->lat=$request->lat;
    $temp->lng=$request->lng;
  
    $temp->save();
    $request->session()->flush();
    return redirect('/login')->with('success', 'User Successfully Added');  
  }


  public function showDetails()
  {
       $data= Signup::all();
       return view('signuplist',['detail'=>$data]);
}

  function status_update($id)
{
	//get product status with the help of product ID
	$product = DB::table('signups')
				->select('status')
				->where('id','=',$id)
				->first();

	//Check user status
	if($product->status == '1'){
		$status = '0';
	}else{
		$status = '1';
	}

	//update product status
	$values = array('status' => $status );
	DB::table('signups')->where('id',$id)->update($values);

	// session()->flash('msg','Product status has been updated successfully.');
	return redirect('/show');
}

  public function login()
  {
     return view ('/login');

     
    }
  
  public function loginDetail(Request $request)
  {
    $request->validate([
      'username'=>'required',
      // 'password'=>['required',Password::min(8)->letters()->numbers()->mixedCase()->symbolS()],
      'email'=>'required',
      'checkbox'=>'required',
    ]);  
    
    $check=Signup::where([['username','=',$request->username],
                          ['email','=',$request->email]])
                          ->first();
    if(!$check)
    echo "Invalid Credentials";
    else{
      // return $check;

      $first_step =['username'=>$check->username,
                    'email'=>$check->username];

      $ff =  $request->session()->put('first_step', $first_step);       
      return redirect('/home');  

    }
    }

    public function blog()
  {
     return view ('/blog');     
    }

    public function blogdetails()
  {
    //  return view ('/login');     
    }



    public function logout()
  {
        session()->forget('first_step');
        return redirect('/login');
    }
    public function addBlog()
  {    
      return view('/addblog');
     
    }
    public function home()
  {    
      return view('/home');
     
    }
    public function aboutus()
  {    
      return view('/aboutus');
     
    }


    
      public function sort()
      {
          // $detail = Signup::sortable()->paginate(5);
          $detail = $user->paginate(20);
          $user->appends(['search' => $request->get('search')]);
          return view('/show',compact('detail'));
      }
  
    
    
  
}
