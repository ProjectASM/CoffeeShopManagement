<?php
namespace App\Form;

use App\Entity\Shift;
use App\Entity\Staff;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class StaffShiftType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('shift', EntityType::class, ['class'=>Shift::class, 'choice_label'=>'id'])
        ->add('staff', EntityType::class, ['class'=>Staff::class, 'choice_label'=>'name'])
        ->add('time', EntityType::class, ['class'=>Shift::class, 'choice_label'=>'time', 'mapped'=>false])
        ->add('save', SubmitType::class, [
            'label' => "Confirm"
        ])
        ;
    }
}

?>