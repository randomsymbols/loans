<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Application\Command\Client;

class EditClientCommand
{
    public function __construct(
        private string $id,
        private ?string $firstName,
        private ?string $lastName,
        private ?int $age,
        private ?string $city,
        private ?string $state,
        private ?int $zip,
        private ?string $ssn,
        private ?int $fico,
        private ?int $wage,
        private ?string $email,
        private ?string $phone,
    ) {

    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @return int|null
     */
    public function getAge(): ?int
    {
        return $this->age;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @return int|null
     */
    public function getZip(): ?int
    {
        return $this->zip;
    }

    /**
     * @return string|null
     */
    public function getSsn(): ?string
    {
        return $this->ssn;
    }

    /**
     * @return int|null
     */
    public function getFico(): ?int
    {
        return $this->fico;
    }

    /**
     * @return int|null
     */
    public function getWage(): ?int
    {
        return $this->wage;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }
}
