<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Application\Command\Product;

class CreateProductCommand
{
    public function __construct(
        private string $title,
        private int $term,
        private float $interest,
    ) {

    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getTerm(): int
    {
        return $this->term;
    }

    /**
     * @return float
     */
    public function getInterest(): float
    {
        return $this->interest;
    }
}
