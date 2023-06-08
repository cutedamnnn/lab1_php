<?php
namespace Labs\Lab1;

use DateTime;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;

require_once __DIR__ . '/../../vendor/autoload.php';


class Employee
{
    #[Assert\Type(
    type: 'integer',
    message: 'The value {{ value }} is not a valid {{ type }}.',
    )]
    #[Assert\PositiveOrZero]
    protected int $id;

    #[Assert\Type(
    type: 'string',
    message: 'The value {{ value }} is not a valid {{ type }}.',
    )]
    #[Assert\NotBlank(
    message: 'Name should not be empty'
    )]
    #[Assert\Regex([
    'pattern' => '/^[a-z]+$/i',
    'htmlPattern' => '[a-zA-Z]+',
    'message' => 'Name can only contain letters',
    ])]
    #[Assert\Length([
    'min' => 2,
    'max' => 50,
    'minMessage' => 'Name must be more than {{ limit }} characters',
    'maxMessage' => 'Name must be less than {{ limit }} characters',
    ])]
    protected string $name;

    #[Assert\Type(
    type: 'float',
    message: 'The value {{ value }} is not a valid {{ type }}.',
    )]
    #[Assert\PositiveOrZero]
    protected int $salary;

    #[Assert\Date()]
    protected DateTime $employmentDate;

    public function __construct(DateTime $employmentDate, int $id= 1111, string $name = "employername", float $salary  = 100)
    {
        $this->id = $id;
        $this->name = $name;
        $this->salary = $salary;
        $this->employmentDate = $employmentDate;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }

    public function getEmploymentDate(): string
    {
        return $this->employmentDate->format('Y-m-d');
    }

    public function getExperienceInYears(): int
    {
        $exp = (new DateTime())->diff($this->employmentDate);
        return $exp->y;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setSalary(float $salary)
    {
        $this->$salary = $salary;
    }

    public function validate(): void
    {
        $validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();

        $errors = $validator->validate($this);
        echo count($errors) . "<br/>";

        if (0 !== count($errors)) {
            echo $this->name . "Employee is not valid<br/>";
            foreach ($errors as $violation) {
                echo $violation->getMessage() . "<br/>";
            }
        } else {
            echo $this->name . "Employee is valid<br/>";
        }
    }
}

