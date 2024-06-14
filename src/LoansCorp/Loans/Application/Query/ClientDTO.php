<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Application\Query;

readonly class ClientDTO
{
    public function __construct(
        private string $clientId,
        private string $firstName,
        private string $lastName,
        private int $age,
        private string $city,
        private string $state,
        private int $zip,
        private string $ssn,
        private int $fico,
        private int $wage,
        private string $email,
        private string $phone,
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

    public function getAge(): int
    {
        return $this->age;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function getZip(): int
    {
        return $this->zip;
    }

    public function getSsn(): string
    {
        return $this->ssn;
    }

    public function getFico(): int
    {
        return $this->fico;
    }

    public function getWage(): int
    {
        return $this->wage;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }
}
