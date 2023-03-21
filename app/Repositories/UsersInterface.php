<?php

namespace App\Repositories;

interface UsersInterface
{
  public function createUsers($req);

  public function find($id);
}
