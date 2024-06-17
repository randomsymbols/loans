<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Application;

class ProductDTO
{
    public function __construct(
        private ?string $id,
        private ?string $title,
        private ?int $term,
        private ?float $interest,
    ) {

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
     * @return float|null
     */
    public function getInterest(): ?float
    {
        return $this->interest;
    }

    /**
     * @param float|null $interest
     */
    public function setInterest(?float $interest): void
    {
        $this->interest = $interest;
    }
}
