<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'         => 'required|max:60',
            'last_name'          => 'required|max:60',
            'email'              => 'required|email|max:255',
            'designation'        => 'required|max:255',
            'phone'              => 'required|max:255',
            'address1'           => 'required|max:255',
            'address2'           => '',
            'city'               => 'required|max:255',
            'state_id'           => 'required|exists:states,id',
            'gender'             => 'required|max:255',
            'zipcode'            => 'required|max:255',
            'relationship_status'=> 'required|max:255',
            'dob'                => 'required|max:255',
            'ssc_board_name'     => '',
            'ssc_year'     => '',
            'ssc_percentage'     => '',
            'hsc_board_name'     => '',
            'hsc_year'     => '',
            'hsc_percentage'     => '',
            'degree_course_name'     => '',
            'degree_university'     => '',
            'degree_year'     => '',
            'degree_percentage'     => '',
            'mdegree_course_name'     => '',
            'mdegree_university'     => '',
            'mdegree_year'     => '',
            'mdegree_percentage'     => '',
        ];
    }
}
