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
  
  public function getImportLogsWithPagination():LengthAwarePaginator
  {
    $search = request()->query('search');

    return ImportLog::query()
        ->when($search, function ($q) use ($search) {
          $q->where(function($inner) use ($search) {
            $inner->where('filename', 'LIKE', "%{$search}%")
                  ->orWhere('id', $search);
          });
        })
        ->orderBy('id', 'desc')
        ->paginate(10)
        ->withQueryString();
  }  
}