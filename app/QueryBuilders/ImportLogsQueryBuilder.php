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
  
  // public function filter(array $filters): self
  // {
  //   // return $this
  //   //         ->when($filters['filename'] ?? null, function ($query, $filename) {
  //   //           $query->where('filename', 'like', "%{$filename}%");
  //   //         })
  //   //         ->when($filters['status'] ?? null, function ($query, $status) {
  //   //           $query->where('status', 'like', "%{$status}%");
  //   //         })
  //   //         ->when($filters['message'] ?? null, function ($query, $message) {
  //   //           $query->where('message', 'like', "%{$message}%");
  //   //         });
  //   // return $this->when($filters['search'] ?? null, function ($query, $search) {
  //   //   $query->where(function ($g) use ($search) {
  //   //     $g->where('filename', 'like', "%{$search}%")
  //   //       ->orWhere('message', 'like', "%{$search}%")
  //   //       ->orWhere('tablename', 'like', "%{$search}%");
  //   //   });
  //   // });
  // }

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

  //   public function getImportLogsWithPagination(?string $search = null):LengthAwarePaginator
  // {
  //   $query = ImportLog::query();

  //   if ($search) {
  //     $query->where(function($q) use ($search) {
  //       $q->where('filename', 'LIKE', "%{$search}%")
  //       ->orWhere('id', $search);
  //     });
  //   }
  //   return $query->orderBy('id', 'desc')->paginate(10)->withQueryString();
  // }

  // public function getImportLogsWithPagination(int $quantity = 10):LengthAwarePaginator
  // {
  //   return $this->model->paginate($quantity);
  // }
  
}