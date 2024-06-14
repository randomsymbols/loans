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
            INSERT INTO clients (id, first_name, last_name, age, city, state, zip, ssn, fico, wage, email, phone)
            VALUES (:id, :first_name, :last_name, :age, :city, :state, :zip, :ssn, :fico, :wage, :email, :phone)
        ');

        $stmt->bindValue('id', $client->getClientId()->toString());
        $stmt->bindValue('first_name', $client->getFirstName());
        $stmt->bindValue('last_name', $client->getLastName());
        $stmt->bindValue('age', $client->getAge());
        $stmt->bindValue('city', $client->getCity());
        $stmt->bindValue('state', $client->getState());
        $stmt->bindValue('zip', $client->getZip());
        $stmt->bindValue('ssn', $client->getSsn());
        $stmt->bindValue('fico', $client->getFico());
        $stmt->bindValue('wage', $client->getWage());
        $stmt->bindValue('email', $client->getEmail());
        $stmt->bindValue('phone', $client->getPhone());

        $stmt->executeStatement();
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
                $row['age'],
                $row['city'],
                $row['state'],
                $row['zip'],
                $row['ssn'],
                $row['fico'],
                $row['wage'],
                $row['email'],
                $row['phone'],
            );
        }, $result->fetchAllAssociative());
    }
}
