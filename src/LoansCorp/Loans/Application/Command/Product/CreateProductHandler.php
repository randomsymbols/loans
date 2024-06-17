<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Application\Command\Product;

use App\LoansCorp\Loans\Domain\Product\ProductRepositoryInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
readonly class CreateProductHandler
{
    public function __construct(private ProductRepositoryInterface $productRepository) {}

    public function __invoke(CreateProductCommand $createProductCommand): void
    {
        $this->productRepository->create(
            $createProductCommand->getTitle(),
            $createProductCommand->getTerm(),
            $createProductCommand->getInterest(),
        );
    }
}
