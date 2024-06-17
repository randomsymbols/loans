<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Domain\Loan;

use App\LoansCorp\Loans\Domain\Client\Client;
use App\LoansCorp\Loans\Domain\Client\Exceptions\LoanDeniedException;
use App\LoansCorp\Loans\Domain\Client\LoanConfirmationService;
use App\LoansCorp\Loans\Domain\Product\Product;

class Loan
{
    private const INTEREST_INCREASE_STATES = [
        'CA' => 11.49,
    ];

    /**
     * @throws LoanDeniedException
     */
    public function __construct(
        private string $id,
        private float $amount,
        private Client $client,
        private Product $product,
        private ?float $interestIncrease = null,
    ) {
        LoanConfirmationService::checkLoanIsAllowed($this->client);

        if (array_key_exists($this->client->getState(), self::INTEREST_INCREASE_STATES)) {
            $this->interestIncrease = self::INTEREST_INCREASE_STATES[$this->client->getState()];
        }
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @param Client $client
     */
    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    /**
     * @return float|null
     */
    public function getInterestIncrease(): ?float
    {
        return $this->interestIncrease;
    }

    /**
     * @param float|null $interestIncrease
     */
    public function setInterestIncrease(?float $interestIncrease): void
    {
        $this->interestIncrease = $interestIncrease;
    }
}
