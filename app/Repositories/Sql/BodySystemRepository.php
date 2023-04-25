<?php

        namespace App\Repositories\Sql;
        use App\Models\BodySystem;
        use App\Repositories\Contract\BodySystemRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class BodySystemRepository extends BaseRepository implements BodySystemRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new BodySystem();

            }

        }
        