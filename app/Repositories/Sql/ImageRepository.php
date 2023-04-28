<?php

        namespace App\Repositories\Sql;
        use App\Models\Image;
        use App\Repositories\Contract\ImageRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class ImageRepository extends BaseRepository implements ImageRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new Image();

            }

        }
        