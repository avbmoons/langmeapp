<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Word;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

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

    public function getWordsActive():Collection
    {
        return Word::query()->where('status', 'active')->get();
    }

    public function getWordsWithThemes():Collection
    {
        return Word::query()  // DB::table('words')
            ->join('theme_has_words', 'words.id', '=', 'theme_has_words.word_id')
            ->join('themes', 'theme_has_words.theme_id', '=', 'themes.id')
            ->select('words.id', 'words.code', 'theme_has_words.theme_id', 'words.status', 'words.title')
            //->select('words.id', 'themes.id')
            ->where('themes.status', '=', 'active')
            ->where('words.status', '=', 'active')
            ->orderBy('words.id')
            ->get();
    }

    public function getWordsWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }
}