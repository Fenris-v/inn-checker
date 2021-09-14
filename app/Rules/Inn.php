<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Inn implements Rule
{
    public string $message;

    public function __construct()
    {
        $this->message = __('validation.inn');
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        if (preg_match('/\D/', $value)) {
            return false;
        }

        $length = strlen($value);

        if ($length === 10) {
            $this->message = __('validation.not_private_inn');
            return false;
        } elseif ($length === 12) {
            return $this->validatePrivateInn($value);
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }

    /**
     * Валидирует ИНН физ лиц
     * @param string $inn
     * @return bool
     */
    private function validatePrivateInn(string $inn): bool
    {
        $num10 = 7 * $inn[0] +
            2 * $inn[1] +
            4 * $inn[2] +
            10 * $inn[3] +
            3 * $inn[4] +
            5 * $inn[5] +
            9 * $inn[6] +
            4 * $inn[7] +
            6 * $inn[8] +
            8 * $inn[9];
        $num10 = $this->getRemainderOfDivision($num10);

        $num11 = 3 * $inn[0] +
            7 * $inn[1] +
            2 * $inn[2] +
            4 * $inn[3] +
            10 * $inn[4] +
            3 * $inn[5] +
            5 * $inn[6] +
            9 * $inn[7] +
            4 * $inn[8] +
            6 * $inn[9] +
            8 * $inn[10];
        $num11 = $this->getRemainderOfDivision($num11);

        return $inn[11] == $num11 && $inn[10] == $num10;
    }

    /**
     * Возвращает остаток от деления для проверки ИНН
     * @param int $num
     * @return int
     */
    private function getRemainderOfDivision(int $num): int
    {
        return ($num % 11) % 10;
    }
}
