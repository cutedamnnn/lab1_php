<?php
namespace Labs\Lab1;

require_once __DIR__ . '/../../vendor/autoload.php';

class Department
{
    protected $name;
    protected $employees;

    public function __construct($employees = [], string $name="Lida")
    {
        $this->employees = $employees;
        $this->name = $name;
    }
    public function getTotalSalary(): float
    {
        $totalSalary = 0;
        foreach ($this->employees as $employee) {
            $totalSalary += $employee->getSalary();
        }
        return $totalSalary;
    }

    public function getEmployees(): array
    {
        return $this->employees;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public static function maxSalary($deps): array
    {
        $maxSalary = 0;
        $depsWithMaxSalary = [];
        foreach ($deps as $dep) {
            if ($maxSalary < $dep->getTotalSalary()) {
                $depsWithMaxSalary = [$dep];
                $maxSalary = $dep->getTotalSalary();
            } elseif ($maxSalary == $dep->getTotalSalary()) {
                $depsWithMaxSalary[] = $dep;
            }
        }

        if (count($depsWithMaxSalary) > 1) {
            $maxWorkers = 0;
            foreach ($depsWithMaxSalary as $dep) {
                if ($maxWorkers < count($dep->getEmployees())) {
                    $depsWithMaxSalary = [$dep];
                    $maxWorkers = count($dep->getEmployees());
                } elseif ($maxWorkers == count($dep->getEmployees())) {
                    $depsWithMaxSalary[] = $dep;
                }
            }

        }
        return $depsWithMaxSalary;
    }

    public static function minSalary($deps): array
    {
        $minSalary = INF;
        $depsWithMinSalary = [];
        foreach ($deps as $dep) {
            if ($minSalary > $dep->getTotalSalary()) {
                $depsWithMinSalary = [$dep];
                $minSalary = $dep->getTotalSalary();
            } elseif ($minSalary == $dep->getTotalSalary()) {
                $depsWithMinSalary[] = $dep;
            }
        }

        if (count($depsWithMinSalary) > 1) {
            $maxWorkers = 0;
            foreach ($depsWithMinSalary as $dep) {
                if ($maxWorkers < count($dep->getEmployees())) {
                    $maxWorkers = count($dep->getEmployees());
                    $depsWithMinSalary = [$dep];
                } elseif ($maxWorkers == count($dep->getEmployees())) {
                    $depsWithMinSalary[] = $dep;
                }
            }

        }
        return $depsWithMinSalary;
    }
}
