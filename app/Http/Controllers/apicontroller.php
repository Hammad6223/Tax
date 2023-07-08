<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\query;
use App\Models\query_doc;
use App\Models\directory;
use App\Models\document;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File; 

use ZipArchive;
class apicontroller extends Controller
{
    //

     //Login Function
     function login(request $req){
       
      
        $rules = [
            'email'=> 'required|email',
            'password'=> 'required',
        ];
        
        $validator = Validator::make($req->all(), $rules);
        if($validator->fails())
        {
            return response()->json(['error'=> true, 'error_msg'=> $validator->errors()->first()]);
        }
    
          $user = user::where('email',$req->email)->first();
       
          if($user )
          {
            if( password_verify($req->password, $user->password) 
            && $user->status == 1 && $user->user_role  ==2){
                return response()->json(['error'=> false, 'success_msg'=> 'logged in successfully','data'=> $user]);

            }
            else{
                return response()->json(['error'=> true, 'error_msg'=> 'Ivalid Login Credentials']);

            }
          }
          else{
            return response()->json(['error'=> true, 'error_msg'=> 'Email does not exist try again']);

          }


    }
    
    
    
    // Signup Function
    
    
  public function signup(request $req)
  {
  
    $rules = ([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:16|min:6',
            
    ]);
    
      $validator = Validator::make($req->all(), $rules);
        if($validator->fails())
        {
            return response()->json(['error'=> true, 'error_msg'=> $validator->errors()->first()]);
        }
    
   
    $user11 = User::create([
       'name'=>$req->name,
       'email'=>$req->email,
       'password'=>bcrypt($req->password),
       'user_role'=> 2,
       
       
    ]);
    
    if($user11){
        
    return response()->json(['error'=> false, 'success_msg'=> 'signup in successfully']);
      
  }
  }
  
  
  // Profile view Function
function profile(request $req){
    $user = user::find($req->id);
    
   return response()->json(['data'=>$user]);
}
// Edit profile

function edit_profile(request $req){

     $rules = [
            'email' => 'unique:users,email,' .$req->id.',id',
            
        ];
        
        $validator = Validator::make($req->all(), $rules);
        if($validator->fails())
        {
            return response()->json(['error'=> true, 'error_msg'=> $validator->errors()->first()]);
        }
       $update  = user::find($req->id);
       
       if ($req->has('image')) {
// $rules = [
// 'image' => 'mimes:jpeg,jpg,bmp,png',
// ];
// $validator = Validator::make($req->all(), $rules);
//         if($validator->fails())
//         {
//             return response()->json(['error'=> true, 'error_msg'=> $validator->errors()->first()]);
//         }
        
$image_path = 'storage/app/' . $update->image;
//  dd($image_path);
File::delete($image_path);
$filename = $req->file('image')->store('media');
}
else {
$filename = $update->image;
}


     user::where('id',$req->id)->update([
         'name'=>$req->name,
'surname'=>$req->surname,
'email'=>$req->email,
'contact'=>$req->contact,
'image'=>$filename,
'address' =>$req->address,
'id_card'=>$req->id_card,
'description'=>$req->description,
  ]);
       
           $user = user::where('id',$req->id)->first(); 
  return response()->json(['error'=> false, 'success_msg'=> 'Successfully Edit Profile','data'=>$user ]);
}

// change password
function change_password(request $req){
    $rules = [
        'oldpassword' => 'required',
        'newpassword' => 'required',
        'confirmpassword' => 'same:newpassword',
        ];
        
        $validator = Validator::make($req->all(), $rules);
        if($validator->fails())
        {
            return response()->json(['error'=> true, 'error_msg'=> $validator->errors()->first()]);
        }
        
  $user= user::find($req->id);

   if(password_verify($req->oldpassword,$user->password)){
       
            user::where('id',$user->id)->update([
         'password'=>bcrypt($req->newpassword),
]);
        return response()->json(['success_msg'=> 'Successfully Update Password']);
    }
    else{
         return response()->json(['error_msg'=> 'Old Password does not match try again']);
    }
}


    // Forget
   public function forget(request $req)
 {
    
     $rules = [
            'email'=> 'required|email',
            
        ];
        
        $validator = Validator::make($req->all(), $rules);
        if($validator->fails())
        {
            return response()->json(['error'=> true, 'error_msg'=> $validator->errors()->first()]);
        }
      
    
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
                 return response()->json(['error'=> false, 'success_msg'=> 'You have e-mailed your password']);
            }
            else{
             return response()->json(['error'=> true, 'success_msg'=> 'Email does not exist try again!']);
            }
           
         
        }
        else{
            return response()->json(['error'=> true, 'success_msg'=> 'Email does not exist try again!']);
               
        }
     
 }
  
  
    
  // query add Function
  
function add_query(request $req){
    // return $req;
    
    $admin = user::where('user_role',1)->first();
    $user =user::find($req->user_id);
    
    
 if($req->file){
  $filename = $req->file('file')->store('media');
 }else{
     $filename=null;
 }
$query = query::create([
       'user_id'=>$req->user_id,
       'subject'=>$req->subject,
       'message'=>$req->message,
       'file' =>$filename
    ]);
  
  
  $query_doc = query_doc::create([
      'query_id'=>$query->id,
      'file' =>$filename,
      ]);

if($query)  {
 
       $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $to = $admin->email;
            $from = $user->email;
            $subject = $req->subject;
            $message = '<p>' . $req->message . '</p>' ;
            $headers .= 'From:' .  $user->email  . "\r\n".
            'Reply-To: ' . $user->email . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
    
            if(mail($to, $subject, $message, $headers))
            {
                 return response()->json(['success_msg'=> 'Successfully Updated']);
            }
          
}
           
}
  
//   View Query
  function view_query(request $req){
   
 $query = query::with(['query_docs'])->where('user_id',$req->user_id)->get();
  
  
   return response()->json(['data'=>$query]);
}

// Change status
function change_status(request $req){
   

 
 $query = query::where('id',$req->id)->update([
      
      'status'=>0,
       
    ]);
 return response()->json(['success_msg'=> 'Successfully Updated']);
}


//   Add directory
  function add_directory(request $req){
   
   $directory = directory::create([
      'user_id'=>$req->user_id,
      'name' =>$req->name,
      ]);
  
  
   return response()->json(['data'=>$directory]);
}

//   View Query
  function view_directory(request $req){
   
 $directory = directory::where('user_id',$req->user_id)->get();
   return response()->json(['data'=>$directory]);
}

//   Delete document
  function delete_directory(request $req){
      $directory = directory::find($req->id);
   
 $document = document::where('directory_id',$req->id)->get();
 
 
     foreach($document as $file){
      $destinationPath = 'public/images/'.$file->file;
      if(file::exists($destinationPath)){    
       file::delete($destinationPath);
      }
       $file->delete();
     }
      
      $directory->delete();
     return response()->json(['data'=>'deleted']);
}


// function download 

  function download_directory(request $req){
      
      return $req;
      
         $destinationPath = 'public/myZipFile.zip';
      
    if($destinationPath){
      file::delete($destinationPath);
    }
    
      
      $zip = new ZipArchive;
    $fileName = 'myZipFile.zip';
      
      
      
      $document = document::where('directory_id',$req->directory_id)->get();
       if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
        {
     
      foreach($document as $document){
          
                $destinationPath = 'storage/app/'.$document->file;
                
                //   return $destinationPath;
                 
             $relativeNameInZipFile = basename($document->file);
             $zip->addFile( $destinationPath, $relativeNameInZipFile);
                }
                
     $zip->close();
  return response()->json(['data'=>'https://client.qubitars.com/public/myZipFile.zip']);
    
        }
        

      
}


//   Add document
  function add_document(request $req){
   
   
    $filename = $req->file('file')->store('media');
    
    $document = document::create([
      'directory_id'=>$req->directory_id,
      'name' =>$req->name,
      'file' =>$filename
      ]);
   return response()->json(['data'=>$document]);
}

//   View document
  function view_document(request $req){
   
 $document = document::where('directory_id',$req->directory_id)->get();
 return response()->json(['data'=>$document]);
}

//   Delete document
  function delete_document(request $req){
   
 $document = document::find($req->id);
 $destinationPath = 'storage/app/'.$document->file;
 file::delete($destinationPath);
 $document->delete();
   return response()->json(['data'=>'deleted']);
}


}
