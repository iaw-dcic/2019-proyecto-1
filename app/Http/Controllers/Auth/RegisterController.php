<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => 'required|string|max:20|unique:users',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar_image' => 'image|nullable|max:1999',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $fileNameToStore = $this->handleFileUpload($data);

        alert()->success('Bievenido!', 'Te registraste correctamente!.');

        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar_image' => $fileNameToStore

        ]);

    }

    private function handleFileUpload(array $data)
    {


        
        // Handle File Upload
        if ($request->hasFile('cover_image')) {

            // Get filename with the extension 
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            // Upload Image
            $request->file('cover_image')->storeAs('public/cover_images/thumbnail', $fileNameToStore);

            //Resize image here
            $thumbnailpath = public_path('storage/cover_images/thumbnail/' . $fileNameToStore);
            $img = Image::make($thumbnailpath)->resize(220, 220, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        return $fileNameToStore;
    }

   
}
