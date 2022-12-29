<?php

namespace App\Orchid\Presenters;

use Orchid\Support\Presenter;
use Illuminate\Support\Str;
use Laravel\Scout\Builder;

class LineaPresenter extends Presenter
{

    /**
     * @return string
     */
    public function label(): string
    {
        return __('Zonas');
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->entity->zonas;
    }

    /**
     * @return string
     */
    public function subTitle(): string
    {
        $zonas = $this->entity->zonas->pluck('name')->implode(' / ');

        return (string) Str::of($zonas)
            ->limit(20)
            ->whenEmpty(fn () => __('Sin zona'));
    }




    /**
     * The number of models to return for show compact search result.
     *
     * @return int
     */
    public function perSearchShow(): int
    {
        return 5;
    }

    /**
     * @param string|null $query
     *
     * @return Builder
     */
    public function searchQuery(string $query = null): Builder
    {
        return $this->entity->search($query);
    }
}
