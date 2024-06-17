<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Application\Command\Client;

use App\LoansCorp\Loans\Domain\Client\ClientRepositoryInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
readonly class CreateLoanHandler
{
    public function __construct(private ClientRepositoryInterface $clientRepository) {}

    public function __invoke(CreateLoanCommand $createLoanCommand): void
    {
        $this->clientRepository->createLoan(
            $createLoanCommand->getAmount(),
            $createLoanCommand->getClientId(),
            $createLoanCommand->getProductId(),
        );
    }
}
