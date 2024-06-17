<?php declare(strict_types=1);

namespace App\LoansCorp\Loans\Domain\Client;

use App\LoansCorp\Loans\Domain\Loan\Loan;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Notifier\Recipient\Recipient;

class LoanNotificationsService
{
    public function __construct(private NotifierInterface $notifier) {}

    public function notifySuccess(Client $client): void
    {
        $this->notifier->send(
            new Notification(
                'Loan Issued',
                ['email'],
            ),
            new Recipient(
                $client->getEmail(),
                $client->getPhone(),
            )
        );
    }
}