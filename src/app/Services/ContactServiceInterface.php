<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;

interface ContactServiceInterface
{
  public function getDepartments(): Collection;
  public function getContacts(): Collection;
  public function createContact(int $departmentId, string $name, string $email, string $content, int $age, int $gender): Contact;
}