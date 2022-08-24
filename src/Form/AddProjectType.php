<?php

namespace App\Form;

use App\Entity\TeamProject;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;

class AddProjectType extends AbstractType
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {   

//        $p = $this->entityManager->getRepository("App\Entity\User")->findAll();
        $p = $this->entityManager->getRepository(User::class)->findBy(
                array(),
                array('id' => 'ASC')
            );
        
        $params = [];
        foreach ( $p as $users) {
            $params[$users->getEmail()] = $users->getId();
        }
        
//        dd( $params);
        
        $builder
            ->add('name')
            ->add('user_id', ChoiceType::class, [
                'choices' => $params,
                'placeholder' => '-- select user --',
            ])
//            ->add('user_id', EntityType::class, [
//                'class' => User::class,
//                'choice_label' => function (EntityRepository $er) {
//                    return $er->createQueryBuilder('u')
//                        ->orderBy('u.email', 'ASC');
//                },
//                'placeholder' => '-- select user --',
//            ])
            
//           ->add('user_id',  CollectionType::class, [
//                'entry_type' => User::class,
//                'by_reference' => false,
//            ])
                        
                
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TeamProject::class,
        ]);
    }
}
