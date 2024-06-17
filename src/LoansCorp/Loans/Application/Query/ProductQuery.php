<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Application\Query;

use App\LoansCorp\Loans\Application\ProductDTO;
use App\LoansCorp\Loans\Domain\Product\Product;
use App\LoansCorp\Loans\Domain\Product\ProductRepositoryInterface;
use function array_map;

readonly class ProductQuery
{
    public function __construct(private ProductRepositoryInterface $productRepositoryInterface) {}

    /**
     * @return ProductDTO[]
     */
    public function findAll(): array
    {
        $results = $this->productRepositoryInterface->findAll();

        return array_map(
            fn (Product $product) => $this->mapProductToDTO($product),
            $results,
        );
    }

    public function findOneById(string $id): ProductDTO
    {
        $product = $this->productRepositoryInterface->findOneById($id);

        return $this->mapProductToDTO($product);
    }

    private function mapProductToDTO(Product $product): ProductDTO
    {
        return new ProductDTO(
            $product->getId(),
            $product->getTitle(),
            $product->getTerm(),
            $product->getInterest(),
        );
    }
}
