<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Infrastructure\Product;

use App\LoansCorp\Loans\Domain\Product\Product;
use App\LoansCorp\Loans\Domain\Product\ProductId;
use App\LoansCorp\Loans\Domain\Product\ProductRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

class ProductDbalRepository implements ProductRepositoryInterface
{
    public function __construct(private readonly EntityManagerInterface $entityManager) {}

    public function create(
        string $title,
        int $term,
        int $interest,
    ): void
    {
        $loan = new Product(
            ProductId::generate()->toString(),
            $title,
            $term,
            $interest,
        );

        $this->entityManager->persist($loan);
        $this->entityManager->flush();
    }

    /**
     * @return Product[]
     */
    public function findAll(): array
    {
        return array_map(
            fn (array $row) => new Product(
                $row['id'],
                $row['title'],
                $row['term'],
                $row['interest'],
            ),
            $this->entityManager->getConnection()->prepare('SELECT * FROM products')->execute()->fetchAllAssociative()
        );
    }

    public function findOneById(string $id): Product
    {
        return $this->entityManager->find(Product::class, $id);
    }
}
