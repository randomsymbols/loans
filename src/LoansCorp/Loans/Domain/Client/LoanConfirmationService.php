<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Domain\Client;

use App\LoansCorp\Loans\Domain\Client\Exceptions\LoanDeniedException;

class LoanConfirmationService
{
    private const FICO_MIN = 500;

    private const AGE_MIN = 18;

    private const AGE_MAX = 60;

    private const WAGE_MIN = 1000;

    private const ALLOWED_STATES = [
        'CA',
        'NY',
        'NV',
    ];

    /**
     * @throws LoanDeniedException
     */
    public static function checkLoanIsAllowed(Client $client): void
    {
        if (
            $client->getFico() <= self::FICO_MIN ||
            $client->getAge() < self::AGE_MIN ||
            $client->getAge() > self::AGE_MAX ||
            !in_array($client->getState(), self::ALLOWED_STATES) ||
            $client->getState() === 'NY' && rand(0, 1) ||
            $client->getWage() <= self::WAGE_MIN
        ) {
            throw new LoanDeniedException();
        }
    }
}