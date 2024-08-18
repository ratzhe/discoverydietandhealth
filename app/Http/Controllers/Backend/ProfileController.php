<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Faker\Core\File as CoreFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class ProfileController extends Controller
{
    public function index(){
        return view('admin/profile/index');
    }

    public function update(Request $request){
        //dd($request->all());
        $request->validate([
            'name' => ['required', 'max:100'],
            'email' => ['required', 'email', 'unique:users,email,' .Auth::user()->id],
            'image' => ['image', 'max:2048'],


        ]);

        $user = Auth::user();
        if($request->hasFile('image')){
            if(File::exists(public_path($user->image))){
                File::delete(public_path($user->image));
            }

            // Apaga as imagens que ficam na pasta temporária
            //if(file_exists($image) && is_dir($image)){
              //  unlink($image);
            //}
        }

        if($request->hasFile('image')){
            $image = $request->image;
            $imageName = rand() . '-ddh-' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);

            // caminho da pasta de imagens
            $path = "/uploads/" . $imageName;

            $user->image = $path;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        toastr()->success('Dados atualizados com sucesso!');
        //return redirect()->back()->with('success', 'Dados atualizados com sucesso!');
        return redirect()->back();
    }

    public function updatePassword(Request $request){
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);

        //return redirect()->back()->with('success', 'Senha alterada com sucesso!');
        toastr()->success('Senha alterada com sucesso!');
        return redirect()->back();
    }

}
