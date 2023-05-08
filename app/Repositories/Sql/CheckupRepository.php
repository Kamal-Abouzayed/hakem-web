<?php

        namespace App\Repositories\Sql;
        use App\Models\Checkup;
        use App\Repositories\Contract\CheckupRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class CheckupRepository extends BaseRepository implements CheckupRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new Checkup();

            }

        }
        