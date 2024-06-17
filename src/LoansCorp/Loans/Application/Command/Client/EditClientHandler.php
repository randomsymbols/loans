<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Application\Command\Client;

use App\LoansCorp\Loans\Domain\Client\ClientRepositoryInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
readonly class EditClientHandler
{
    public function __construct(private ClientRepositoryInterface $clientRepository) {}

    public function __invoke(EditClientCommand $editClientCommand): void
    {
        $this->clientRepository->edit(
            $editClientCommand->getId(),
            $editClientCommand->getFirstName(),
            $editClientCommand->getLastName(),
            $editClientCommand->getAge(),
            $editClientCommand->getCity(),
            $editClientCommand->getState(),
            $editClientCommand->getZip(),
            $editClientCommand->getSsn(),
            $editClientCommand->getFico(),
            $editClientCommand->getWage(),
            $editClientCommand->getEmail(),
            $editClientCommand->getPhone(),
        );
    }
}
