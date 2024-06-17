<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Domain\Client;

use App\LoansCorp\Loans\Domain\Loan\Loan;

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

    public function createLoan(
        string $amount,
        string $clientId,
        string $productId,
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
     * @return Client[]|null
     */
    public function findAll(): ?array;

    /**
     * @return Loan[]|null
     */
    public function findLoans(string $clientId): ?array;

    public function findOneById(string $id): Client;
}
