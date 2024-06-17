<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Application\Command\Client;

use App\LoansCorp\Loans\Domain\Client\ClientRepositoryInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
readonly class CreateClientHandler
{
    public function __construct(private ClientRepositoryInterface $clientRepository) {}

    public function __invoke(CreateClientCommand $createClientCommand): void
    {
        $this->clientRepository->create(
            $createClientCommand->getFirstName(),
            $createClientCommand->getLastName(),
            $createClientCommand->getAge(),
            $createClientCommand->getCity(),
            $createClientCommand->getState(),
            $createClientCommand->getZip(),
            $createClientCommand->getSsn(),
            $createClientCommand->getFico(),
            $createClientCommand->getWage(),
            $createClientCommand->getEmail(),
            $createClientCommand->getPhone(),
        );
    }
}
