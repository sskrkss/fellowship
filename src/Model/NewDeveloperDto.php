<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class NewDeveloperDto
{
    #[Assert\NotBlank(message: 'ФИО не должен быть пустым')]
    private string $fullName;

    #[Assert\NotBlank(message: 'Должность не должна быть пустой')]
    #[Assert\Choice(choices: ['программист', 'администратор', 'devops', 'дизайнер'], message: 'Недопустимая должность')]
    private string $position;

    #[Assert\NotBlank(message: 'Зарплата не должна быть пустой')]
    #[Assert\Positive(message: 'Зарплата не должна быть отрицательной')]
    private int $salary;

    #[Assert\NotBlank(message: 'Адрес электронной почты не должен быть пустым')]
    #[Assert\Email(message: 'Недопустимый адрес электронной почты')]
    private string $email;

    #[Assert\NotBlank(message: 'Телефонный номер не должен быть пустым')]
    #[Assert\Regex(pattern: '/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/', message: 'Недопустимый формат номера телефона')]
    private string $phone;

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): void
    {
        $this->fullName = $fullName;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function setPosition(string $position): void
    {
        $this->position = $position;
    }

    public function getSalary(): int
    {
        return $this->salary;
    }

    public function setSalary(int $salary): void
    {
        $this->salary = $salary;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }
}
