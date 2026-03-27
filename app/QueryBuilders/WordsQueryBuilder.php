<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Word;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class WordsQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Word::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getWordsByStatus(string $status): Collection
    {
        return Word::query()->where('status', $status)->get();
    }

    public function getWordsWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }
}