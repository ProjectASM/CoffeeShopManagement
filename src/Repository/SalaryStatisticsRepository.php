<?php

namespace App\Repository;

use App\Entity\SalaryStatistics;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SalaryStatistics>
 *
 * @method SalaryStatistics|null find($id, $lockMode = null, $lockVersion = null)
 * @method SalaryStatistics|null findOneBy(array $criteria, array $orderBy = null)
 * @method SalaryStatistics[]    findAll()
 * @method SalaryStatistics[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SalaryStatisticsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SalaryStatistics::class);
    }

    public function add(SalaryStatistics $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SalaryStatistics $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

        //FindAll

    /**
    * @return SalaryStatistics[] Returns an array of SalaryStatistics objects
    */
    public function SalaryStatistics()
    {
       $en = $this->getEntityManager()->getConnection();
       $sql = '
            SELECT st.id, st.name, ss.basic_salary as basicSalary, ss.coefficients_salary as coefficientsSalary, 
                COUNT(tk.date) AS `Number_Of_Working_Days`, ss.bonus, ss.advance_salary as advanceSalary, 
                (ss.basic_salary*ss.coefficients_salary + ss.bonus - ss.advance_salary) AS `Total_Salary`
            FROM `staff` `st`, `timekeeping` `tk`, `salary_statistics` `ss`
            WHERE st.id = tk.staff_id AND tk.salary_id = ss.id
            GROUP BY MONTH(tk.date), tk.staff_id
       ';
       $stmt = $en->prepare($sql);
       $re = $stmt->executeQuery();
       return $re->fetchAllAssociative();
    }

    
        //Find By ID
    // /**
    // * @return SalaryStatistics[] Returns an array of SalaryStatistics objects
    // */
    // public function SalaryStatistics($id)
    // {
    //    $en = $this->getEntityManager()->getConnection();
    //    $sql = '
    //         SELECT ss.id, st.name, ss.basic_salary, ss.coefficients_salary, 
    //             COUNT(tk.staff_id) AS `Number Of Working Days`, ss.bonus, ss.advance_salary, 
    //             (ss.basic_salary*ss.coefficients_salary + ss.bonus - ss.advance_salary) AS `Total Salary`
    //         FROM `staff` `st`, `timekeeping` `tk`, `salary_statistics` `ss`
    //         WHERE st.id = tk.staff_id AND tk.salary_id = ss.id
    //         GROUP BY tk.staff_id
    //    ';
    //    $stmt = $en->prepare($sql);
    //    $re = $stmt->executeQuery(['val'=>$id]);
    //    return $re->fetchAllAssociative();
    // }






//    /**
//     * @return SalaryStatistics[] Returns an array of SalaryStatistics objects
//     */
//    public function SalaryStatistics(): array
//    {
// //     SELECT st.id, st.name, ss.basic_salary, ss.coefficients_salary, 
// //     COUNT(tk.date) AS `Number Of Working Days`, ss.bonus, ss.advance_salary, 
// //      (ss.basic_salary*ss.coefficients_salary + ss.bonus - ss.advance_salary) AS `Total Salary`
// // FROM `staff` `st`, `timekeeping` `tk`, `salary_statistics` `ss`
// //  WHERE st.id = tk.staff_id AND tk.salary_id = ss.id
// //  GROUP BY MONTH(tk.date), tk.staff_id
//        return $this->createQueryBuilder('ss')
//            ->select('st.id, st.name, ss.basicSalary, ss.coefficientsSalary,
//                      COUNT(tk.date) AS Number_Of_Working_Days, ss.bonus, ss.advanceSalary,
//                      (ss.basicSalary*ss.coefficientsSalary + ss.bonus - ss.advanceSalary) AS Total_Salary
//            ')

//            ->innerJoin('ss.salaryTimekeeping', 'tk')
//            ->innerJoin('tk.staff', 'st')


//            ->groupBy('tk.staff')
//         //    ->groupBy('MONTH(tk.date)')

//            ->orderBy('st.id', 'ASC')

//            ->getQuery()
//            ->getArrayResult()
//        ;
//    }










//    /**
//     * @return SalaryStatistics[] Returns an array of SalaryStatistics objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SalaryStatistics
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
