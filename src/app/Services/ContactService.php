<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Contact;
use App\Services\ContactServiceInterface;
use App\Repositories\ContactRepositoryInterface;
use App\Repositories\ContactRepository;
use Illuminate\Database\Eloquent\Collection;

class ContactService implements ContactServiceInterface
{
  private $contactRepository;

  public function __construct(ContactRepositoryInterface $contactRepository)
  {
    $this->contactRepository = $contactRepository;
  }

  public function getDepartments(): Collection
  {
    return $this->contactRepository->getDepartmentsIds();
  }

  public function getContacts(): Collection
  {
    return $this->contactRepository->getContactsColumns();
  }

  // public function getGenders(): Collection
  // {
  //   return $this->contactRepository->
  // }

  public function createContact(int $departmentId, string $name, string $email, string $content, int $age, int $gender): Contact
  {
    return $this->contactRepository->createContactInstance($departmentId, $name, $email, $content, $age, $gender);
  }
}