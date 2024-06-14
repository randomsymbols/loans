<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Infrastructure;

use App\LoansCorp\Loans\Domain\Client\Client;
use App\LoansCorp\Loans\Domain\Client\ClientId;
use App\LoansCorp\Loans\Domain\Client\ClientRepositoryInterface;
use Doctrine\DBAL\Connection;
use function array_map;

class DbalClientRepository implements ClientRepositoryInterface
{
    public function __construct(private readonly Connection $connection) {}

    public function store(Client $client): void
    {
        $stmt = $this->connection->prepare('
            INSERT INTO clients (id, first_name, last_name)
            VALUES (:id, :first_name, :last_name) 
        ');

        $stmt->bindValue('id', $client->getClientId()->toString());
        $stmt->bindValue('first_name', $client->getFirstName());
        $stmt->bindValue('last_name', $client->getLastName());

        $stmt->execute();
    }

    public function getAll(): array
    {
        $stmt = $this->connection->prepare('
            SELECT * FROM clients
        ');

        $result = $stmt->executeQuery();

        return array_map(function (array $row) {
            return Client::create(
                ClientId::fromString($row['id']),
                $row['first_name'],
                $row['last_name'],
            );
        }, $result->fetchAllAssociative());
    }
}
