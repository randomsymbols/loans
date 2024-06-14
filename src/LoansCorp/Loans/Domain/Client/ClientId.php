<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Domain\Client;

use DomainException;
use Ramsey\Uuid\Uuid;
use function sprintf;

class ClientId
{
    private function __construct(private readonly string $id) {}

    public static function generate(): self
    {
        return new self(Uuid::uuid4()->toString());
    }

    public static function fromString(string $id): self
    {
        if (false === Uuid::isValid($id)) {
            throw new DomainException(
                sprintf("ClientId '%s' is not valid!", $id)
            );
        }

        return new self($id);
    }

    public function toString(): string
    {
        return $this->id;
    }
}
