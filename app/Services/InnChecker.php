<?php

namespace App\Services;

use App\Models\Inn;
use App\Repositories\InnRepository;
use Illuminate\Support\Facades\Http;

class InnChecker
{
    public function __construct(private InnRepository $innRepository)
    {
    }

    /**
     * Проверяет ИНН
     * @param string $q
     * @return array
     */
    public function check(string $q): array
    {
        /** @var ?Inn $inn */
        $inn = $this->innRepository
            ->getByInn($q);

        if ($inn && $inn->isAlive) {
            return [
                'status' => $inn->status,
                'message' => $inn->message,
            ];
        }

        return $this->getData($q, $inn);
    }

    /**
     * Отправляет запрос на внешний API
     * @param string $q
     * @param Inn|null $inn
     * @return array
     */
    private function getData(string $q, ?Inn $inn): array
    {
        $response = Http::asJson()->post(
            env('INN_CHECKER_URL'),
            [
                'inn' => $q,
                'requestDate' => now()->format('Y-m-d'),
            ]
        );

        $data = $response->json();

        if (isset($data['code'])) {
            $data['status'] = $response->status() ?? '';
            return $data;
        }

        if ($inn) {
            $this->innRepository->update($inn, $data);
        } else {
            $data['inn'] = $q;
            $this->innRepository->create($data);
        }

        return $data;
    }
}
