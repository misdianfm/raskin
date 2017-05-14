<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator, Redirect, Auth, Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->get('search');
        $pengguna = User::where('name','LIKE','%'.$cari.'%')
            ->orwhere('username','LIKE','%'.$cari.'%')
            ->orwhere('email','LIKE','%'.$cari.'%')
            ->orwhere('level','LIKE','%'.$cari.'%')
            ->paginate(15);
        return view('user.index', compact('pengguna'));
    }

    public function edit($id)
    {
        $pengguna = User::find($id);
        
        return view('user.edit',compact('pengguna'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'level' => 'required',
        ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
         } else {

        $pengguna = User::find($id);
        $pengguna->name = $request->name;
        $pengguna->username = $request->username;
        $pengguna->email = $request->email;
        $pengguna->level = $request->level;

        $pengguna->save();
        
        return redirect('/user')->with('sukses', 'Berhasil mengubah data pengguna "'.$pengguna->name.'".');
       
        }
    }

    public function destroy($id)
    {
        $pengguna = User::destroy($id);
        if ($pengguna) {
            return redirect('/user')->with('hapus', 'Berhasil menghapus data pengguna.');
        }
    }

    public function pengaturan()
    {
        $pengguna = User::find(Auth::user()->id);
        $ubah = User::find(Auth::user()->id);
        return view('user.pengaturan',compact('pengguna', 'ubah'));
    }
    
    public function sandi(Request $request)
    {
        if(Auth::Check())
        {
            $request_data = $request->All();
            $validator = Validator::make($request->all(),[
                'current-password' => 'required',
                'password' => 'required|same:password|min:6',
                'password_confirmation' => 'required|same:password|min:6',
            ]
            );
            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }else{  
                $current_password = Auth::User()->password;           
                if(Hash::check($request_data['current-password'], $current_password))
                {           
                    $user_id = Auth::User()->id;                       
                    $sandi = User::find($user_id);
                    $sandi->password = Hash::make($request_data['password']);
                    $sandi->save();
                    if ($sandi->save()) {
                        Auth::logout();
                        return redirect('/login')->with('sukses', 'Berhasil mengubah kata sandi. Silahkan masuk kembali dengan kata sandi baru.');
                    }  
                }else{           
                    return redirect()->back()->withErrors($validator)->with('gagal', 'Password yang Anda masukan salah!');   
                }
            } 
        }else{
            return redirect()->to('/home');
        }           
    }



    public function resetpassword($id)
    {
        $pengguna = User::find($id);
        $pengguna->password = Hash::make($pengguna->username);
        $pengguna->save();
        if ($pengguna->save()) {
            return redirect('/user')->with('sukses', 'Berhasil reset password pengguna "'.$pengguna->name.'".');
        }
    }

   public function ubahuser(Request $request)
   {
       $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
         } else {

            $id = Auth::user()->id;
            $pengguna = User::find($id);
            $pengguna->name = $request->name;
            $pengguna->username = $request->username;
            $pengguna->email = $request->email;

            $pengguna->save();
            
            return redirect()->back()->with('sukses', 'Berhasil mengubah data profil.');
       
        }
   }
}
