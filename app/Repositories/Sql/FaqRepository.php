<?php

        namespace App\Repositories\Sql;
        use App\Models\Faq;
        use App\Repositories\Contract\FaqRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class FaqRepository extends BaseRepository implements FaqRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new Faq();

            }

        }
        