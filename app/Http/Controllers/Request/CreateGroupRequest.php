<?php

namespace App\Http\Controllers\Request;

use App\Http\Model\Group;
use Illuminate\Foundation\Http\FormRequest;

class CreateGroupRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return Group::messages();
    }

    public function rules()
    {
        return Group::rules();
    }
}