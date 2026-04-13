<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\ImportLog;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class ImportLogsQueryBuilder extends QueryBuilder
{
  public Builder $model;

  public function __construct()
  {
    $this->model = ImportLog::query();;
  }

  public function getAll():Collection
  {
    return $this->model->get();
  }

  public function getImportLogsByStatus(string $status):Collection
  {
    return ImportLog::query()->where('status', $status)->get();
  }

  public function getImportLogsWithPagination(int $quantity = 10):LengthAwarePaginator
  {
    return $this->model->paginate($quantity);
  }
}