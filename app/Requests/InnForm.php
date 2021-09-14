<?php

namespace App\Requests;

use App\Rules\Inn;
use Illuminate\Foundation\Http\FormRequest;

class InnForm extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // Длина инн:
            // 10 у юр лиц, но кастомное правило всё равно такой ИНН не пропустит в соответствие с ТЗ
            // 12 у физ лиц
            'inn' => ['required', 'min:10', 'max:12', new Inn()]
        ];
    }
}
