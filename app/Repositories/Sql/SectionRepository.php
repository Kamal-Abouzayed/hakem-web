<?php

        namespace App\Repositories\Sql;
        use App\Models\Section;
        use App\Repositories\Contract\SectionRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class SectionRepository extends BaseRepository implements SectionRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new Section();

            }

        }
        