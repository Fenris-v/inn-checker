<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CheckerAlert extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public array $result)
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.checker-alert');
    }

    /**
     * Возвращает класс алерта
     * @return string
     */
    public function getClass(): string
    {
        if ($this->isFailed()) {
            return 'danger';
        }

        if ($this->result['status'] == false) {
            return 'warning';
        }

        return 'success';
    }

    /**
     * Проверка на ошибки.
     * Вынесена для улучшения читаемости кода
     * @return bool
     */
    private function isFailed(): bool
    {
        return isset($this->result['code']) || !isset($this->result['status']);
    }
}
