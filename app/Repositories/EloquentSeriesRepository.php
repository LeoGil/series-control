<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Support\Facades\DB;

class EloquentSeriesRepository implements SeriesRepository
{
    public function add(SeriesFormRequest $request, int $userId): Series
    {
        return DB::transaction(function () use ($request, $userId) {
            $series = Series::create([
                'name' => $request->name,
                'user_id' => $userId
            ]);
            $seasons = [];

            for ($i = 1; $i <= $request->seasonsQty; $i++) {
                $seasons[] = [
                    'series_id' => $series->id,
                    'number' => $i,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }

            Season::insert($seasons);

            $episodes = [];
            foreach ($series->seasons as $season) {
                for ($i = 1; $i <= $request->episodesPerSeason; $i++) {
                    $episodes[] = [
                        'season_id' => $season->id,
                        'number' => $i
                    ];
                }
            }

            Episode::insert($episodes);

            return $series;
        });
    }
}
