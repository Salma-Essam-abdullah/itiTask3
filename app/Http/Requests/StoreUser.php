<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        
        $user= Auth::user();
        $id = $this->id;
        $posts = Post::find($id); 
        return $user->id === $posts->user_id;
      
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
        'title' => 'required|max:100',
        'body' => 'required|max:100',
        ];
    
    }
}
