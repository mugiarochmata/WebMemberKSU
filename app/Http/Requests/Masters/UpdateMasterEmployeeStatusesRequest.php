<?php

namespace App\Http\Requests\Masters;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Masters\MasterEmployeeStatuses;

class UpdateMasterEmployeeStatusesRequest extends FormRequest
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
        $rules = MasterEmployeeStatuses::$rules;
        
        return $rules;
    }
}
