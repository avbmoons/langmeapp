<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Lexicon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

final class LexiconsQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Lexicon::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getLexiconsByStatus(string $status): Collection
    {
        return Lexicon::query()->where('status', $status)->get();
    }

    public function getLexiconsWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }

}