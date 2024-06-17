<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Infrastructure;

use App\LoansCorp\Loans\Domain\Client\Client;
use App\LoansCorp\Loans\Domain\Client\ClientId;
use App\LoansCorp\Loans\Domain\Client\ClientRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

class DbalClientRepository implements ClientRepositoryInterface
{
    public function __construct(private readonly EntityManagerInterface $entityManager) {}

    public function create(
        string $firstName,
        string $lastName,
        int $age,
        string $city,
        string $state,
        int $zip,
        string $ssn,
        int $fico,
        int $wage,
        string $email,
        string $phone,
    ): void
    {
        $client = new Client(
            ClientId::generate()->toString(),
            $firstName,
            $lastName,
            $age,
            $city,
            $state,
            $zip,
            $ssn,
            $fico,
            $wage,
            $email,
            $phone,
        );

        $this->entityManager->persist($client);
        $this->entityManager->flush();
    }

    public function edit(
        string $id,
        ?string $firstName,
        ?string $lastName,
        ?int $age,
        ?string $city,
        ?string $state,
        ?int $zip,
        ?string $ssn,
        ?int $fico,
        ?int $wage,
        ?string $email,
        ?string $phone,
    ): void
    {
        $client = $this->entityManager->find(Client::class, $id);

        if ($firstName) {
            $client->setFirstName($firstName);
        }

        if ($lastName) {
            $client->setLastName($lastName);
        }

        if ($age) {
            $client->setAge($age);
        }

        if ($city) {
            $client->setCity($city);
        }

        if ($state) {
            $client->setState($state);
        }

        if ($zip) {
            $client->setZip($zip);
        }

        if ($ssn) {
            $client->setSsn($ssn);
        }

        if ($fico) {
            $client->setFico($fico);
        }

        if ($wage) {
            $client->setWage($wage);
        }

        if ($email) {
            $client->setEmail($email);
        }

        if ($phone) {
            $client->setPhone($phone);
        }

        $this->entityManager->persist($client);
        $this->entityManager->flush();
    }

    /**
     * @return Client[]
     */
    public function findAll(): array
    {
        return array_map(
            fn (array $row) => new Client(
                $row['id'],
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
            ),
            $this->entityManager->getConnection()->prepare('SELECT * FROM clients')->execute()->fetchAllAssociative()
        );
    }

    public function findOneById(string $id): Client
    {
        return $this->entityManager->find(Client::class, $id);
    }
}
