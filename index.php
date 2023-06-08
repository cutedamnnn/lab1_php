<?php
require_once __DIR__ . '/vendor/autoload.php';

use Labs\Lab1\Employee;
use Labs\Lab1\Department;

try {
    echo "Демонстрация работы Employee<br/>";

    $date = new DateTime('2003-02-02');
    $employee = new Employee($date, 12132, "asdf", 2324);
    echo $employee->getExperienceInYears();
    $em1 = new Employee($date, -1, "Incorred3ctEmployee", -1);
    $em2 = new Employee($date, 23, "I_+", 150);
    $em3 = new Employee($date, 33, "person", 200);
    echo "<br/>";

    $employees = [$em1, $em2, $em3];

    foreach ($employees as $employee) {
        echo "<br/>";

        $employee->validate();
    }
    echo "<br/>";

    echo "Демонстрация работы функций в Department <br/>";
    $em1 = new Employee($date, 1, "Maks", 250);
    $em2 = new Employee($date, 21, "Danya", 356);
    $em3 = new Employee($date, 31, "Alina", 350);
    $em4 = new Employee($date, 41, "Ilya", 252);
    $em5 = new Employee($date, 51, "Lida", 104);
    $em6 = new Employee($date, 61, "Sanya", 356);
    $em7 = new Employee($date, 61, "Nikita", 996);
    $em8 = new Employee($date, 61, "Sergey", 56);

    $depList1 = [$em1, $em6];
    $depList2 = [$em3, $em4, $em5];
    $depList3 = [$em2];
    $depList3 = [$em7, $em8];


    $dep1 = new Department($depList1, "administrators");
    $dep2 = new Department($depList2, "Directors");
    $dep3 = new Department($depList3, "Technical support");
    $dep4 = new Department($depList4, "Developers");

    echo "Sum salary of first department is " . $dep1->getTotalSalary() . "<br/>";
    echo "<br/>";

    echo "Sum salary of second department is " . $dep2->getTotalSalary() . "<br/>";
    echo "<br/>";

    echo "Sum salary of third department is " . $dep3->getTotalSalary() . "<br/>";
    echo "<br/>";

    echo "Sum salary of fourth department is " . $dep4->getTotalSalary() . "<br/>";
    echo "<br/>";

    $deps = [$dep1, $dep2, $dep3, $dep4];

    $depsWithMaxSalary = Department::maxSalary($deps);
    echo "Deps with max salary - ";
    foreach ($depsWithMaxSalary as $dep) {
        echo $dep->getName() . "<br/>";
    }
    echo "<br/>";

    echo "Deps with min salary - ";
    $depsWithMinSalary = Department::minSalary($deps);
    foreach ($depsWithMinSalary as $dep) {
        echo $dep->getName() . "<br/>";
    }
} catch (\Throwable $th) {
    echo "<br/>";
    echo $th;
    echo "<br/>";
}
