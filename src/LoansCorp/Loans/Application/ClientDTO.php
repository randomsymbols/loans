<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Application;

class ClientDTO
{
    public function __construct(
        private ?string $id,
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
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     */
    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     */
    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return int|null
     */
    public function getAge(): ?int
    {
        return $this->age;
    }

    /**
     * @param int|null $age
     */
    public function setAge(?int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     */
    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return int|null
     */
    public function getZip(): ?int
    {
        return $this->zip;
    }

    /**
     * @param int|null $zip
     */
    public function setZip(?int $zip): void
    {
        $this->zip = $zip;
    }

    /**
     * @return string|null
     */
    public function getSsn(): ?string
    {
        return $this->ssn;
    }

    /**
     * @param string|null $ssn
     */
    public function setSsn(?string $ssn): void
    {
        $this->ssn = $ssn;
    }

    /**
     * @return int|null
     */
    public function getFico(): ?int
    {
        return $this->fico;
    }

    /**
     * @param int|null $fico
     */
    public function setFico(?int $fico): void
    {
        $this->fico = $fico;
    }

    /**
     * @return int|null
     */
    public function getWage(): ?int
    {
        return $this->wage;
    }

    /**
     * @param int|null $wage
     */
    public function setWage(?int $wage): void
    {
        $this->wage = $wage;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }
}
