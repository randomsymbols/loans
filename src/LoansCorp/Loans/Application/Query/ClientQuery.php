<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Application\Query;

use App\LoansCorp\Loans\Domain\Client\Client;
use App\LoansCorp\Loans\Domain\Client\ClientRepositoryInterface;
use function array_map;

readonly class ClientQuery
{
    public function __construct(private ClientRepositoryInterface $clientRepositoryInterface) {}

    public function fetchAll(): array
    {
        $results = $this->clientRepositoryInterface->getAll();

        return array_map(function (Client $client) {
            return new ClientDTO(
                $client->getClientId()->toString(),
                $client->getFirstName(),
                $client->getLastName(),
            );
        }, $results);
    }
}
