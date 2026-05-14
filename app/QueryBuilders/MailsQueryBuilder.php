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
    $search = request()->query('search');

    return Mail::query()
            //->with('users')
            ->when($search, function ($q) use ($search) {
                $q->where(function($inner) use ($search) {
                    $inner->where('id', $search)
                    ->orWhere('username', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->orWhere('status', 'LIKE', "%{$search}%")
                    ->orWhere('updated_at', 'LIKE', "%{$search}%");
                    // ->orWhereHas('users', function($userQuery) use ($search) {
                    //         $userQuery->where('title', 'LIKE', "%{$search}%");
                    //     });
                });
            })
            ->orderBy('id', 'asc') // 'desc'
            ->paginate(10)
            ->withQueryString();
    
    //$this->model->paginate($quantity);
  }

  // public function getMailsWithPagination(int $quantity = 10): LengthAwarePaginator
  // {
  //   return $this->model->paginate($quantity);
  // }

}
