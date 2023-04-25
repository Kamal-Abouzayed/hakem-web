<?php

        namespace App\Repositories\Sql;
        use App\Models\Organ;
        use App\Repositories\Contract\OrganRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class OrganRepository extends BaseRepository implements OrganRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new Organ();

            }

        }
        