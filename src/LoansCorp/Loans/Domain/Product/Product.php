<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Domain\Product;

class Product
{
    public function __construct(
        private ?string $id,
        private ?string $title,
        private ?int $term,
        private ?int $interest,
    ) {}

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
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return int|null
     */
    public function getTerm(): ?int
    {
        return $this->term;
    }

    /**
     * @param int|null $term
     */
    public function setTerm(?int $term): void
    {
        $this->term = $term;
    }

    /**
     * @return int|null
     */
    public function getInterest(): ?int
    {
        return $this->interest;
    }

    /**
     * @param int|null $interest
     */
    public function setInterest(?int $interest): void
    {
        $this->interest = $interest;
    }
}