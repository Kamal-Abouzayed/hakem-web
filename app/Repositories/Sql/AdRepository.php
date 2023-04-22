<?php

        namespace App\Repositories\Sql;
        use App\Models\Ad;
        use App\Repositories\Contract\AdRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class AdRepository extends BaseRepository implements AdRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new Ad();

            }

        }
        