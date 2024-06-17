<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Domain\Client;

interface ClientRepositoryInterface
{
    public function create(
        string $firstName,
        string $lastName,
        int $age,
        string $city,
        string $state,
        int $zip,
        string $ssn,
        int $fico,
        int $wage,
        string $email,
        string $phone,
    ): void;

    public function edit(
        string $id,
        ?string $firstName,
        ?string $lastName,
        ?int $age,
        ?string $city,
        ?string $state,
        ?int $zip,
        ?string $ssn,
        ?int $fico,
        ?int $wage,
        ?string $email,
        ?string $phone,
    ): void;

    /**
     * @return Client[]
     */
    public function findAll(): array;

    public function findOneById(string $id): Client;
}
