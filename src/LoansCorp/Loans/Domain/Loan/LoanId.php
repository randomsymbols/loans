<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Domain\Loan;

use DomainException;
use Ramsey\Uuid\Uuid;
use function sprintf;

class LoanId
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
                sprintf("LoanId '%s' is not valid!", $id)
            );
        }

        return new self($id);
    }

    public function toString(): string
    {
        return $this->id;
    }
}
