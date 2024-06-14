<?php declare(strict_types=1);

namespace App\Controller;

use App\LoansCorp\Loans\Application\Command\Client\AddClientCommand;
use App\LoansCorp\Loans\Application\Query\ClientQuery;
use App\Form\Type\ClientType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;

class ClientController extends AbstractController
{
    public function __construct(private readonly MessageBusInterface $messageBus) {}

    #[Route('/clients', name: 'clients')]
    public function list(Request $request, ClientQuery $clientList): Response
    {
        $form = $this->createForm(ClientType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $command = new AddClientCommand(
                $form->get('firstName')->getData(),
                $form->get('lastName')->getData(),
            );
            $this->messageBus->dispatch($command);
        }

        $clients = $clientList->fetchAll();

        return $this->render('client/list.html.twig', [
            'clients' => $clients,
            'form' => $form->createView()
        ]);
    }
}
