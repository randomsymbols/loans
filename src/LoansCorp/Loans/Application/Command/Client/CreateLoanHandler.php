<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Application\Command\Client;

use App\LoansCorp\Loans\Domain\Client\ClientRepositoryInterface;
use App\LoansCorp\Loans\Domain\Client\LoanNotificationsService;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Notifier\Recipient\Recipient;

#[AsMessageHandler]
readonly class CreateLoanHandler
{
    public function __construct(
        private ClientRepositoryInterface $clientRepository,
        private LoanNotificationsService $loanNotificationsService,
    ) {}

    public function __invoke(CreateLoanCommand $createLoanCommand, ): void
    {
        $this->clientRepository->createLoan(
            $createLoanCommand->getAmount(),
            $createLoanCommand->getClientId(),
            $createLoanCommand->getProductId(),
        );

        $client = $this->clientRepository->findOneById($createLoanCommand->getClientId());

        $this->loanNotificationsService->notifySuccess($client);
    }
}
