<?php

namespace App\QueryBuilders;

use App\Models\Mail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class MailsQueryBuilder extends QueryBuilder
{
  public Builder $model;

  public function __construct()
  {
    $this->model = Mail::query();
  }

  function getAll(): Collection
  {
    return Mail::query()->get();
  }

  public function getMailsByStatus(string $status): Collection
  {
    return Mail::query()->where('status', $status)->get();
  }

  public function getMailsByUserId(int $userId): Collection
  {
    return Mail::query()->where('user_id', $userId)->get();
  }

  public function getMailsWithPagination(int $quantity = 10): LengthAwarePaginator
  {
    return $this->model->paginate($quantity);
  }

}
