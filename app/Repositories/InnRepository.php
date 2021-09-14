<?php

namespace App\Repositories;

use App\Models\Inn;
use Cache;

class InnRepository
{
    /**
     * Возвращает модель по ИНН
     * @param string $inn
     * @return Inn|null
     */
    public function getByInn(string $inn): ?Inn
    {
        return Cache::tags(['inn'])
            ->remember(
                'inn_' . $inn,
                86400,
                function () use ($inn) {
                    return Inn::where('inn', $inn)->first();
                }
            );
    }

    /**
     * Обновляет модель
     * @param Inn $inn
     * @param array $data
     * @return bool
     */
    public function update(Inn $inn, array $data): bool
    {
        $result = $inn->update(
            [
                'status' => $data['status'],
                'message' => $data['message']
            ]
        );

        Cache::tags('inn')->flush();
        return $result;
    }

    /**
     * Создает модель
     * @param array $data
     * @return Inn
     */
    public function create(array $data): Inn
    {
        return Inn::create(
            [
                'inn' => $data['inn'],
                'status' => $data['status'],
                'message' => $data['message']
            ]
        );
    }
}
