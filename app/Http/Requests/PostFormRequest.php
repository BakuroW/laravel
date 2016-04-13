<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostFormRequest extends Request {

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
            'title'        => 'required | min: 3 | max:25',
            'slug'         => 'required | min: 3 | max:50',
            'excerpt'      => 'required | min: 3 | max:300',
            'content'      => 'required | min: 3 | max:300',
            'Category'     => 'required | min: 3 | max:30',
            'published'    => '',
            'published_at' => ''
        ];
	}

}
