<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Domain\Loan;

use App\LoansCorp\Loans\Domain\Client\Client;
use App\LoansCorp\Loans\Domain\Client\Exceptions\LoanDeniedException;
use App\LoansCorp\Loans\Domain\Client\LoanConfirmationService;
use App\LoansCorp\Loans\Domain\Product\Product;

class Loan
{
    /**
     * @throws LoanDeniedException
     */
    public function __construct(
        private ?string $id,
        private ?float $amount,
        private ?Client $client,
        private ?Product $product,
        private ?float $interestIncrease = null,
    ) {
        LoanConfirmationService::checkLoanIsAllowed($this->client);
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return float|null
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * @param float|null $amount
     */
    public function setAmount(?float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return Client|null
     */
    public function getClient(): ?Client
    {
        return $this->client;
    }

    /**
     * @param Client|null $client
     */
    public function setClient(?Client $client): void
    {
        $this->client = $client;
    }

    /**
     * @return Product|null
     */
    public function getProduct(): ?Product
    {
        return $this->product;
    }

    /**
     * @param Product|null $product
     */
    public function setProduct(?Product $product): void
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
