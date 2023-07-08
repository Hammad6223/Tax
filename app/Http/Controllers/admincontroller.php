<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\query;
use App\Models\directory;
use App\Models\document;
use App\Models\appointment;
use ZipArchive;

class admincontroller extends Controller
{
    
// Login
public function login(){
    return view('admin.login');
    }
    
    // Login Action
    public  function adminloginaction(Request $req){
    
      $req->validate([
      'email' => 'required|email',
      'password'=> 'required',
      ]);
      
      if (Auth::attempt(['email' => $req->email, 'password' => $req->password,'user_role' => 1])) {
      
      if(auth::user()->user_role == 1 && auth::user()->status == 1){ 
      return redirect('admin/dashboard');
      }
      
      else{
      return back()->with(['error1'=> 'Password and Email does not match try again']);
      }
      
      }
      else{
      return back()->with(['error1'=> 'Password and Email does not match try again']);
      }}



// Forget
   public function forget_action(request $req)
 {
     
   
        $req->validate([
            'email' => 'required|email',

        ]);
    
        $user = user::where('email', $req->email)->first();

  
        if ($user) {
            
           $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
            $user->password = bcrypt(implode($pass));
            $user->save();
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $to = $req->email;
            $from = 'info@heinegerlach.org';
            $subject = 'Heine & Gerlach Password Reset';
            $message = '<h2 style="color:#040d50">Heine & Gerlach System<h2> <hr> <h4> Dear ' . $user->name .'</h4><p> There was a request for password  resetting Heine & Gerlach system generated password is <button style="color:#040d50">'. 
            implode($pass).' </button> </p>' ;
            $headers .= 'From: info@heinegerlach.org'."\r\n".
            'Reply-To: info@heinegerlach.org'. "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            
            if(mail($to, $subject, $message, $headers))
            {
                return back()->with('message1','djj');
            }
            else{
                return back()->with('message2','djj');
            }
        }
        else{
            return back()->with('message','djj');
        }
 
 } 


      
    // Dashboard
    public function dashboard(){
      $active_clients = user::where('user_role',2)->where('status',1)->count();
 
      $active_queries =query::where('status',1)->count();
      $solve_queries =query::where('status',0)->count();

      $user =  user::orderBy('id', 'DESC')->where('user_role',2)->where('status',1)->paginate(5);
 
 

    return view('admin.dashboard',compact('user','active_clients','solve_queries','active_queries'));
    }



        //profile
public function profile()
{
$id = auth::id();
$user = user::find($id);
return view('admin.profile',compact('user'));
}


// Profile edit action
public function profile_edit_action(request $req)
{
$req->validate([
'email' => 'unique:users,email,' .$req->id.',id',
]);
$id =Auth::id();
$update  = user::find($id);
// Image 
if ($req->has('image')) {
$req->validate([
'image' => 'mimes:jpeg,jpg,bmp,png',
]);
$image_path = 'storage/app/' . $update->image;
//  dd($image_path);
File::delete($image_path);
$filename = $req->file('image')->store('media');
}
else {
$filename = $update->image;
}
user::where('id',$id)->update([
'name'=>$req->name,
'surname'=>$req->surname,
'email'=>$req->email,
'contact'=>$req->contact,
'image'=>$filename,
'address' =>$req->address,
'id_card'=>$req->id_card,
'description'=>$req->description,
]);
return redirect('admin/profile')->with('message1','Successfully Updated Profile');  
}

//update password
public function update_password()
{
return view('admin.change_password');
} 
function update_password_action(request $req){
$id =Auth::id();
$user= user::find($id);
if(password_verify($req->oldpassword,$user->password)){
$user->password = bcrypt($req->newpassword);
$user->save();
return back()->with('message','Update');
}
else{
return back()->with(['error'=> 'Old Password  does not match try again']);
}
}
// Logout
function  logout(){
auth::logout();

return redirect('/admin/login');
}

// Client

public function active_client(){
    
  $user =  user::orderBy('id', 'DESC')->where('user_role',2)->where('status',1)->get();

  return view('admin.active_client',compact('user'));
}

public function block_client(){
   
  $user =  user::orderBy('id', 'DESC')->where('user_role',2)->where('status',0)->get();

  return view('admin.block_client',compact('user'));
}

public function client_profile($id){
    
    $user =user::find($id);
    $dir = directory::with(['directory_docs'])->where('user_id',$id)->get();
    return view('admin.client_profile',compact('user','dir'));
}

public function delete_client($id){
    
  user::where('id',$id)->update([
    'status'=>0,
  
    ]);

    return back()->with('message','Successfully ');  
  }
  
public function reactive_client($id){
    
  user::where('id',$id)->update([
    'status'=>1,
  
    ]);

    return back()->with('message','Successfully ');  
  }

// function download 

  function download_directory($id){
      
    
     $document = document::where('directory_id',$id)->get();
     
     if(count($document) == 0 ){
         return back();
         
     }else{
      $destinationPath = 'public/myZipFile.zip';
      
    if($destinationPath){
      file::delete($destinationPath);
    }
 
      $zip = new ZipArchive;
    $fileName = 'myZipFile.zip';
      
      
      
     
      
       if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
        {
     
      foreach($document as $document){
          
                $destinationPath = 'storage/app/'.$document->file;
                
                //   return $destinationPath;
                 
             $relativeNameInZipFile = basename($document->file);
             $zip->addFile( $destinationPath, $relativeNameInZipFile);
                }
                
     $zip->close();
     return response()->download('public/myZipFile.zip');
   
    
        }
        
}
      
}


   //  Queries

    public function active_query(){

$query = query::with(['user','query_docs'])->orderBy('id', 'DESC')->where('status',1)->get();
   
    return view('admin.active_query',compact('query'));
   }

public function solve_query(){

  $query = query::with(['user','query_docs'])->orderBy('id', 'DESC')->where('status',0)->get();
   
  return view('admin.solve_query',compact('query'));
}


public function delete_query($id){
  query::where('id',$id)->update([
    'status'=>0,
  
    ]);
    return back()->with('message','Successfully ');  
}



}




