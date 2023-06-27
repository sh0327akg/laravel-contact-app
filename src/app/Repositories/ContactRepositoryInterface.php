<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Contact;
use App\Models\Department;
use Illuminate\Database\Eloquent\Collection;

interface ContactRepositoryInterface
{
  public function getDepartmentsIds(): Collection;
  public function getContactsColumns(): Collection;
  public function createContactInstance(int $departmentId, string $name, string $email, string $content, int $age, int $gender): Contact;
}