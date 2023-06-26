<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Repositories\ContactRepositoryInterface;
use App\Models\Contact;
use App\Models\Department;
use Illuminate\Database\Eloquent\Collection;

class ContactRepository implements ContactRepositoryInterface
{
  public function getDepartmentsIds(): Collection
  {
    return Department::select('id','name')->get();
  }

  public function getContactsColumns(): Collection
  {
    return Contact::select('department_id', 'name', 'gender', 'age', 'email', 'content')->get();
  }

  public function createContactInstance(int $departmentId, string $name, string $email, string $content, int $age, int $gender): Contact
  {
    return Contact::create([
      'department_id' => $departmentId,
      'name' => $name,
      'email' => $email,
      'content' => $content,
      'age' => $age,
      'gender' => $gender,
    ]);
  }
}
