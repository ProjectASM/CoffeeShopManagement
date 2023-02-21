<?php
namespace App\Form;

use App\Entity\SalaryStatistics;
use App\Entity\Staff;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class TimekeepingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('salary', EntityType::class, ['class'=>SalaryStatistics::class, 'choice_label'=>'id'])
        ->add('staff', EntityType::class, ['class'=>Staff::class, 'choice_label'=>'name'])
        ->add('date', DateType::class, [
            'widget' => 'single_text',
            'required' => false
        ])

        // ->add('advanceSalary')
        // ->add('totalSalary')
        ->add('save', SubmitType::class, [
            'label' => "Confirm"
        ])
        ;
    }
}

?>