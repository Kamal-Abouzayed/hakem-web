<?php

        namespace App\Repositories\Sql;
        use App\Models\Vaccination;
        use App\Repositories\Contract\VaccinationRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class VaccinationRepository extends BaseRepository implements VaccinationRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new Vaccination();

            }

        }
        