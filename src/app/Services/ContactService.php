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

  /**
   * @param object $contactRepository
   * @return void
   */
  public function __construct(ContactRepositoryInterface $contactRepository)
  {
    $this->contactRepository = $contactRepository;
  }


  /**
   * @return Collection
   */
  public function getDepartments(): Collection
  {
    return $this->contactRepository->getDepartmentsIds();
  }

  /**
   * @return Collection
   */
  public function getContacts(): Collection
  {
    return $this->contactRepository->getContactsColumns();
  }

  /**
   * @param int $departmentId
   * @param string $name
   * @param string $email
   * @param string $content
   * @param int $age
   * @param int $gender
   * @return Contact
   */
  public function createContact(int $departmentId, string $name, string $email, string $content, int $age, int $gender): Contact
  {
    return $this->contactRepository->createContactInstance($departmentId, $name, $email, $content, $age, $gender);
  }
}