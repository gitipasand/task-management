<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = ($this->method() == 'PUT') ? $this->route('project')->id : null;

        return [
            'title' => ($this->method == 'POST') ?  ['required','string','unique:projects,title'] : ['required','string',Rule::unique('projects','title')->where(function($query) use($id){
                $query->where('id','<>',$id);
            })],
            'description'=>['required']
        ];
    }
}
