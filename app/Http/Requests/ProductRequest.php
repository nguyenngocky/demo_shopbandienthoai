<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [];
        $currentAction = $this->route()->getActionMethod();
        // để lấy phương thức hiện tại
        switch($this->method()):
            case 'POST':
                switch($currentAction) {
                    case 'addProduct':
                        $rules = [
                            'name' => 'required',
                            'image' => 'required',
                            'price' => 'required|numeric',
                            'quantity' => 'required|numeric',
                            'discount' => 'required|numeric',
                            'desc' => 'required',
                        ];
                        break;

                        case 'Update':
                        $rules = [
                            'name' => 'required',
                            'image' => 'required',
                            'price' => 'required|numeric',
                            'quantity' => 'required|numeric',
                            'discount' => 'required|numeric',
                            'desc' => 'required',
                        ];
                            break;

                        
                        default:
                            break;
                }
                break;

                default:
                    break;
                endswitch;
                return $rules;
    }

    public function messages() {
        return [
            'name.required' => 'Vui lòng nhập tên sản phẩm!',
            'image.required' => 'Vui lòng up ảnh!',
            'price.required' => 'Vui lòng nhập giá!',
            'quantity.required' => 'Vui lòng nhập số lượng!',
            'discount.required' => 'Vui lòng nhập giảm giá!',
            'desc.required' => 'Vui lòng nhập mô tả ngắn!',
            'discount.numeric' => 'Giảm giá phải là số!',
            'price.numeric' => 'Giá phải là số!',
            'quantity.numeric' => 'Số lượng phải là số!',
        ];
    }
}
