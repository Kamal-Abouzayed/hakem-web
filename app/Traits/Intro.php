<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;

trait Intro
{

    static function introduction()
    {

        $html = '';

        $url = 'https://master.jadara.work/api/management/intro/uEwdmEqbQgZ5INvKoF';

        $client = new Client();

        $guzzleResponse = $client->get($url);

        if ($guzzleResponse->getStatusCode() == 200) {

            $my_routes = json_decode($guzzleResponse->getBody(), true);

            if ($my_routes['status'] != false) {

                $my_routes = collect($my_routes['data']['intro']);
                if ($my_routes['active'] == true) {

                    $html .= '<div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">المقدمة</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="' . $my_routes['photo'] . '" alt="...">
                                    </div>
                                    <p>' . $my_routes['desc'] . '</p>
                                    <a target="_blank" rel="nofollow" href="' . $my_routes['link'] . '">للمزيد من مشاريع شركة جدارة &rarr;</a>
                                </div>
                            </div>';

                    return $html;
                } else {

                    return $html;
                }
            } else {
                return $html;
            }
        } else {

            return 'data not fount';
        }
    }
}
