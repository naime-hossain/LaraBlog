<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Photo;
  use Illuminate\Support\Facades\File;
class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users=User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles=Role::pluck('name','id')->all();
        return view('admin.users.create',compact('roles'));
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
        $this->validate($request,[
            'name'=>'required|unique:users',
            'email'=>'required|unique:users',
            'password'=>'required|confirmed',
            'role_id'=>'required',
            'image'=>'required|image',
            ]);

        $input=$request->all();
        if ($file=$request->file('image')) {
            # code...
             $filename= rand(0,time()).$file->getClientOriginalName();
             $file->move('images',$filename);
              $photo=Photo::create(['image'=>$filename]);
              $input['photo_id']=$photo->id;
        }

        

        $input['password']=bcrypt($request->password);
        
        $user=User::create($input);
   if ($user) {
       # code...
    return redirect('/admin/users')->with('message', 'User updated added succefully');
   }else{
     return back()->with('message', 'User not added succefully');
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
        $roles=Role::pluck('name','id')->all();
        $user=User::find($id);
        return view('admin.users.edit',compact('user','roles'));
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
           $this->validate($request,[
            'image'=>'image',
            ]);
        $user=User::find($id);
        $input=$request->all();
        $input['photo_id']=$user->photo_id;

        if ($file=$request->file('image')) {
          
      
       
       $filename = rand(0,time()).$file->getClientOriginalName();
       //remove old history
          if ($user->photo_id) {
              # code...
        File::delete($user->photo->image);
        $old_photo=Photo::find($user->photo_id)->delete();
          }

          //create new photo
          $file->move('images',$filename);
        
         $photo=Photo::create(['image'=>$filename]);
        
        //excluding the image from input array
        // unset($input['image']);
         $input['photo_id']=$photo->id;
        }
        $user->update($input);
        if ($user) {
            # code...
            return redirect('/admin/users')->with('message', 'User Info updated  succefully');

        }
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
        $user=User::find($id);
       
        if ($user) {
            File::delete($user->photo->image);
            $old_photo=Photo::find($user->photo_id)->delete();
             $user_delete=$user->delete();

        }
        return back()->with('message', 'User  deleted succefully');
    }
}
