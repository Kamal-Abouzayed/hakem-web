<?php

        namespace App\Repositories\Sql;
        use App\Models\PregnancyStage;
        use App\Repositories\Contract\PregnancyStageRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class PregnancyStageRepository extends BaseRepository implements PregnancyStageRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new PregnancyStage();

            }

        }
        