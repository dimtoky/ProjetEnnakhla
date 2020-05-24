<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class addUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       $user =  Auth::user()->role_id;
		
		if ($user == 2 || $user == 3)
		{
			return true;
		}
		else
		{
			return false;
		}
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
              if(Auth::user()->role_id == 3)
        {
  return [
                'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            
             'role_id' => 'required|max:255',
              'company' => 'required|max:255',
        ];
        }
else if(Auth::user()->role_id == 2)
        {
   return [
                'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
                  
              'company' => 'required|max:255',
        ];
        }
      
    }
}
