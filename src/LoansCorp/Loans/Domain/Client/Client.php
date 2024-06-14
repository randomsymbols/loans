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
    private function __construct(
        private ClientId $clientId,
        private string $firstName,
        private string $lastName,
    ) {}

    public static function create(
        ClientId $clientId,
        string $firstName,
        string $lastName,
    ): self
    {
        return new self($clientId, $firstName, $lastName);
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
}
