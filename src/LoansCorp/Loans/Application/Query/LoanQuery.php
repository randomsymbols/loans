<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Application\Query;

use App\LoansCorp\Loans\Application\LoanDTO;
use App\LoansCorp\Loans\Domain\Loan\LoanRepositoryInterface;
use function array_map;

readonly class LoanQuery
{
    public function __construct(private LoanRepositoryInterface $loanRepositoryInterface) {}

    /**
     * @return ProductDTO[]
     */
    public function findAll(): array
    {
        $results = $this->loanRepositoryInterface->findAll();

        return array_map(
            fn (Product $product) => $this->mapProductToDTO($product),
            $results,
        );
    }

    public function findOneById(string $id): ProductDTO
    {
        $product = $this->loanRepositoryInterface->findOneById($id);

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
