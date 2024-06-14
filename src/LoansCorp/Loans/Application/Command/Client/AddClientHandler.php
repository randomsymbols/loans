<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Application\Command\Client;

use App\LoansCorp\Loans\Application\Command\CommandInterface;
use App\LoansCorp\Loans\Application\Command\HandlerInterface;
use App\LoansCorp\Loans\Domain\Client\Client;
use App\LoansCorp\Loans\Domain\Client\ClientId;
use App\LoansCorp\Loans\Domain\Client\ClientRepositoryInterface;

/**
 * This handler is an application service. It doesn't contain any
 * business logic and its job is to provide an interface
 * to the Domain layer that the UI layer can communicate through.
 *
 * The UI layer calls Application services directly. In the case of
 * commands and handlers, this is wired using the Symfony message bus.
 *
 * The Application layer _is_ allowed to call Domain services directly.
 *
 * The handler _is_ allowed to ask simple questions of the domain
 * (eg: "does this record already exist in the repository?") in order
 * to provide simple validation, but it must not check invariants.
 *
 * It cannot contain Domain logic.
 */
class AddClientHandler implements HandlerInterface
{
    public function __construct(private readonly ClientRepositoryInterface $clientRepository) {}

    public function __invoke(CommandInterface $commandInterface): void
    {
        $client = Client::create(
            ClientId::generate(),
            $commandInterface->getFirstName(),
            $commandInterface->getLastName(),
        );

        $this->clientRepository->store($client);
    }
}