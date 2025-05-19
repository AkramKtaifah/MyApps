<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\GeneralTraits;
use Exception;
use Illuminate\Support\Facades\Auth;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request){
        try{
        //validation
        $rules =[
            'email' => 'required',
            'password' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            $code = GeneralTraits::returnCodeAccordingToInput($validator);
            return GeneralTraits::returnValidationError($code, $validator);
        }
        //login
        $credentials = $request->only(['email', 'password']);
        $token = Auth::guard('admin')->attempt($credentials);

        if(!$token){
            return GeneralTraits::returnError('E001', 'The data are not correct');
        }

        $admin = Auth::guard('admin')->user();
        Admin::where('id', $admin->id)->update(['token' => $token]);
        $updated_admin = Admin::find($admin->id);
        return GeneralTraits::returnData('admin', $updated_admin, 'Success');

        }catch(Exception $e){
            return GeneralTraits::returnError($e->getCode(), $e->getMessage());
        }
    }

    public function logout(Request $request){
        $token = $request->header('auth-token');
        if($token){
            try{
                JWTAuth::setToken($token)->invalidate();
            }catch(Exception $e){
                return GeneralTraits::returnError('E001', 'Invalid Token');
            }
            Admin::where('token', $token)->update(['token' => '']);
            return GeneralTraits::returnSuccessMessage('Logout successfully');
        }
        else{
            return GeneralTraits::returnError('E001', 'Token Not Found');
        }
    }
}
