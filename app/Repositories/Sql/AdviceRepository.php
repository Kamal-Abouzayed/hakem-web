<?php

        namespace App\Repositories\Sql;
        use App\Models\Advice;
        use App\Repositories\Contract\AdviceRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class AdviceRepository extends BaseRepository implements AdviceRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new Advice();

            }

        }
        