<?php
namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class SalaryStatisticsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('basicSalary')
        ->add('coefficientsSalary')
        ->add('bonus')
        ->add('advanceSalary')
        // ->add('totalSalary')
        ->add('save', SubmitType::class, [
            'label' => "Confirm"
        ])
        ;
    }
}

?>