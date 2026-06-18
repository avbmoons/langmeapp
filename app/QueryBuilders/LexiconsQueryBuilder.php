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

    public function getLexiconsActive():Collection
    {
        return Lexicon::query()->where('status', 'active')->get();
    }

    public function getLexiconsByPatternActive(int $patternId):Collection
    {
        return Lexicon::query()
        ->join('patterns', 'lexicons.pattern_id', '=', 'patterns.id')
        ->join('langs', 'patterns.lang_id', '=', 'langs.id')
        ->join('theme_has_words', 'lexicons.word_id', '=', 'theme_has_words.word_id')   //
        ->select('lexicons.*', 'theme_has_words.theme_id', 'patterns.lang_id', 'langs.title as langName')
        ->where('patterns.status', 'active')
        ->where('lexicons.pattern_id', $patternId)
        ->where('lexicons.status', 'active')
        ->get();
    }

    public function getLexiconsWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        $search = request()->query('search');

        return Lexicon::query()
            ->with(['patterns', 'words'])
            ->when($search, function ($q) use ($search) {
                $q->where(function($inner) use ($search) {
                    $inner->where('id', $search)
                    ->orWhere('translation', 'LIKE', "%{$search}%")
                    ->orWhere('spell_base', 'LIKE', "%{$search}%")
                    ->orWhere('spell_eng', 'LIKE', "%{$search}%")
                    ->orWhere('status', 'LIKE', "%{$search}%")
                    ->orWhereHas('patterns', function($patternQuery) use ($search) {
                            $patternQuery->where('title', 'LIKE', "%{$search}%");
                        })
                    ->orWhereHas('words', function($wordQuery) use ($search) {
                            $wordQuery->where('title', 'LIKE', "%{$search}%");
                        });
                });
            })
            ->orderBy('id', 'asc') // 'desc'
            ->paginate(10)
            ->withQueryString();

    }

}