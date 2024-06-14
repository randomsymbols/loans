<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Application\Query;

readonly class ClientDTO
{
    public function __construct(
        private string $clientId,
        private string $firstName,
        private string $lastName,
    ) {}

    public function getClientId(): string
    {
        return $this->clientId;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }
}
