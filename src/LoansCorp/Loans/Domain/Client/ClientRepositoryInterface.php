<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Domain\Client;

interface ClientRepositoryInterface
{
    public function store(Client $client): void;

    /**
     * @return Client[]
     */
    public function getAll(): array;
}
