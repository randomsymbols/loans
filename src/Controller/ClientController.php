<?php declare(strict_types=1);

namespace App\Controller;

use App\Form\Type\ClientType;
use App\Form\Type\LoanType;
use App\LoansCorp\Loans\Application\Command\Client\CreateClientCommand;
use App\LoansCorp\Loans\Application\Command\Client\CreateLoanCommand;
use App\LoansCorp\Loans\Application\Command\Client\EditClientCommand;
use App\LoansCorp\Loans\Application\Query\ClientQuery;
use App\LoansCorp\Loans\Application\Query\ProductQuery;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;
use Throwable;

class ClientController extends AbstractController
{
    public function __construct(private readonly MessageBusInterface $messageBus) {}

    #[Route('/clients', name: 'clients', methods: ['GET', 'POST'])]
    public function list(Request $request, ClientQuery $clientQuery): Response
    {
        $form = $this->createForm(ClientType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $command = new CreateClientCommand(
                $form->get('firstName')->getData(),
                $form->get('lastName')->getData(),
                $form->get('age')->getData(),
                $form->get('city')->getData(),
                $form->get('state')->getData(),
                $form->get('zip')->getData(),
                $form->get('ssn')->getData(),
                $form->get('fico')->getData(),
                $form->get('wage')->getData(),
                $form->get('email')->getData(),
                $form->get('phone')->getData(),
            );

            $this->messageBus->dispatch($command);

            return $this->redirectToRoute('clients');
        }

        $clients = $clientQuery->findAll();

        return $this->render('client/list.html.twig', [
            'clients' => $clients,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/client/{id}/loans', name: 'client_loans', methods: ['GET', 'POST'])]
    public function loans(Request $request, ClientQuery $clientQuery, ProductQuery $productQuery, string $id): Response
    {
        $products = [];

        foreach ($productQuery->findAll() as $product) {
            $products[$product->getTitle()] = $product->getId();
        }

        $form = $this->createForm(LoanType::class, options: ['products' => $products]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $command = new CreateLoanCommand(
                $form->get('amount')->getData(),
                $id,
                $form->get('product')->getData(),
            );

            try {
                $this->messageBus->dispatch($command);
            } catch (Throwable) {
                $this->addFlash(
                    'error',
                    'Sorry, your loan request has been denied.'
                );
            }

            return $this->redirectToRoute('client_loans', ['id' => $id]);
        }

        $loans = $clientQuery->findLoans($id);

        return $this->render('client/loans.html.twig', [
            'loans' => $loans,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/client/{id}/edit', name: 'client_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ClientQuery $clientQuery, string $id): Response
    {
        $client = $clientQuery->findOneById($id);

        $form = $this->createForm(ClientType::class, $client);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->isSubmitted() && $form->isValid()) {
                $command = new EditClientCommand(
                    $id,
                    $form->get('firstName')->getData(),
                    $form->get('lastName')->getData(),
                    $form->get('age')->getData(),
                    $form->get('city')->getData(),
                    $form->get('state')->getData(),
                    $form->get('zip')->getData(),
                    $form->get('ssn')->getData(),
                    $form->get('fico')->getData(),
                    $form->get('wage')->getData(),
                    $form->get('email')->getData(),
                    $form->get('phone')->getData(),
                );

                $this->messageBus->dispatch($command);
            }
        }

        return $this->render('client/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
