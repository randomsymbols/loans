<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Domain\Product;

interface ProductRepositoryInterface
{
    public function create(
        string $title,
        int $term,
        float $interest,
    ): void;

    /**
     * @return Product[]
     */
    public function findAll(): array;

    public function findOneById(string $id): Product;
}
