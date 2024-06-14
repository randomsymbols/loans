<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Domain\Client;

/**
 * This is the 'Aggregate Root' of the Appointment Bounded Context.
 *
 * Each Bounded Context will have one Entity class which naturally
 * describes what the bounded context is trying to achieve. In this
 * case the Bounded Context is focused on booking appointments, so
 * the Appointment class is the natural Aggregate Root.
 *
 * The Aggregate Root is the entry-point for all functionality in the
 * Domain model. It can also be comprised in-part of other
 * Entity classes (eg here we have Pet as a property of Appointment).
 *
 * The Aggregate Root is the only class in the Bounded Context which is
 * allowed to create other Entity objects or to call methods on those entities.
 *
 * All services in the Bounded Context call methods directly on the
 * Aggregate Root; they _do not_ call any methods on the other Entity classes,
 * nor do they instantiate any other class than the Aggregate Root.
 *
 * If you cannot think of an appropriate Aggregate Root in your own context,
 * you might need to either consider splitting your model into more
 * Bounded Contexts, or go back to the 'Domain Expert' and gain clarification.
 */
class Client
{
    public const CLIENT_STATES = [
        'Alabama' => 'AL',
        'Alaska' => 'AK',
        'Arizona' => 'AZ',
        'Arkansas' => 'AR',
        'California' => 'CA',
        'Colorado' => 'CO',
        'Connecticut' => 'CT',
        'Delaware' => 'DE',
        'Florida' => 'FL',
        'Georgia' => 'GA',
        'Hawaii' => 'HI',
        'Idaho'=> 'ID',
        'Illinois' => 'IL',
        'Indiana' => 'IN',
        'Iowa' => 'IA',
        'Kansas' => 'KS',
        'Kentucky' => 'KY',
        'Louisiana' => 'LA',
        'Maine' => 'ME',
        'Maryland' => 'MD',
        'Massachusetts' => 'MA',
        'Michigan' => 'MI',
        'Minnesota' => 'MN',
        'Mississippi' => 'MS',
        'Missouri' => 'MO',
        'Montana' => 'MT',
        'Nebraska' => 'NE',
        'Nevada' => 'NV',
        'New Hampshire' => 'NH',
        'New Jersey' => 'NJ',
        'New Mexico' => 'NM',
        'New York' => 'NY',
        'North Carolina' => 'NC',
        'North Dakota' => 'ND',
        'Ohio' => 'OH',
        'Oklahoma' => 'OK',
        'Oregon' => 'OR',
        'Pennsylvania' => 'PA',
        'Rhode Island' => 'RI',
        'South Carolina' => 'SC',
        'South Dakota' => 'SD',
        'Tennessee' => 'TN',
        'Texas' => 'TX',
        'Utah' => 'UT',
        'Vermont' => 'VT',
        'Virginia' => 'VA',
        'Washington' => 'WA',
        'West Virginia' => 'WV',
        'Wisconsin' => 'WI',
        'Wyoming' => 'WY',
    ];

    private function __construct(
        private ClientId $clientId,
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

    public static function create(
        ClientId $clientId,
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
    ): self
    {
        return new self(
            $clientId,
            $firstName,
            $lastName,
            $age,
            $city,
            $state,
            $zip,
            $ssn,
            $fico,
            $wage,
            $email,
            $phone,
        );
    }

    public function getClientId(): ClientId
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
