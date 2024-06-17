<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Application\Query;

use App\LoansCorp\Loans\Application\ClientDTO;
use App\LoansCorp\Loans\Application\LoanDTO;
use App\LoansCorp\Loans\Domain\Client\Client;
use App\LoansCorp\Loans\Domain\Client\ClientRepositoryInterface;
use App\LoansCorp\Loans\Domain\Loan\Loan;
use function array_map;

readonly class ClientQuery
{
    public function __construct(private ClientRepositoryInterface $clientRepositoryInterface) {}

    /**
     * @return ClientDTO[]
     */
    public function findAll(): array
    {
        $results = $this->clientRepositoryInterface->findAll();

        return array_map(
            fn (Client $client) => $this->mapClientToDTO($client),
            $results,
        );
    }

    public function findOneById(string $id): ClientDTO
    {
        $client = $this->clientRepositoryInterface->findOneById($id);

        return $this->mapClientToDTO($client);
    }

    /**
     * @return LoanDTO[]
     */
    public function findLoans(string $clientId): array
    {
        $loans = $this->clientRepositoryInterface->findOneById($clientId)->getLoans()->toArray();

        return array_map(
            fn (Loan $loan) => $this->mapLoanToDTO($loan),
            $loans,
        );
    }

    private function mapClientToDTO(Client $client): ClientDTO
    {
        return new ClientDTO(
            $client->getId(),
            $client->getFirstName(),
            $client->getLastName(),
            $client->getAge(),
            $client->getCity(),
            $client->getState(),
            $client->getZip(),
            $client->getSsn(),
            $client->getFico(),
            $client->getWage(),
            $client->getEmail(),
            $client->getPhone(),
        );
    }

    private function mapLoanToDTO(Loan $loan): LoanDTO
    {
        $product = $loan->getProduct();

        $interest = $loan->getInterestIncrease()
            ? $loan->getInterestIncrease() + $product->getInterest()
            : $product->getInterest()
        ;

        return new LoanDTO(
            $loan->getId(),
            $loan->getAmount(),
            $product->getTitle(),
            $product->getTerm(),
            $interest,
        );
    }
}
