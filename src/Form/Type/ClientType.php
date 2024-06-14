<?php declare(strict_types=1);

namespace App\Form\Type;

use App\LoansCorp\Loans\Domain\Client\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class)
            ->add('lastName', TextType::class)
            ->add('age', IntegerType::class)
            ->add('city', TextType::class)
            ->add('state', ChoiceType::class, [
                'choices' => Client::CLIENT_STATES,
            ])
            ->add('zip', IntegerType::class)
            ->add('ssn', TextType::class)
            ->add('fico', IntegerType::class)
            ->add('wage', IntegerType::class)
            ->add('email', EmailType::class)
            ->add('phone', TextType::class)
            ->add('submit', SubmitType::class)
        ;
    }
}
