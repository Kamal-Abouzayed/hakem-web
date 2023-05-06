<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Contract\SettingRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    protected $settingRepository;

    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    } // end of contruct

    public function create()
    {
        $pageTitle = 'الإعدادات';

        $settings = $this->settingRepository->getAll(['column' => 'id', 'dir' => 'ASC']);

        return view('dashboard.settings.edit', compact('settings', 'pageTitle'));
    } // end of create

    public function store(Request $request)
    {

        $attribute = $request->except('_token', '_method', 'logo');

        $logo = $this->settingRepository->getWhere([['key', 'logo']])->first()['value'];
        $footer_logo = $this->settingRepository->getWhere([['key', 'footer_logo']])->first()['value'];
        $favicon = $this->settingRepository->getWhere([['key', 'favicon']])->first()['value'];
        $main_image = $this->settingRepository->getWhere([['key', 'main_image']])->first()['value'];

        if ($request->has('logo')) {

            // Delete old internal_image
            Storage::delete($logo);

            // Upload new internal_image
            $attribute['logo'] = $request->file('logo')->store('setting');
        }

        if ($request->has('footer_logo')) {

            // Delete old internal_image
            Storage::delete($footer_logo);

            // Upload new internal_image
            $attribute['footer_logo'] = $request->file('footer_logo')->store('setting');
        }

        if ($request->has('favicon')) {

            // Delete old internal_image
            Storage::delete($favicon);

            // Upload new internal_image
            $attribute['favicon'] = $request->file('favicon')->store('setting');
        }

        if ($request->has('main_image')) {

            // Delete old internal_image
            Storage::delete($main_image);

            // Upload new internal_image
            $attribute['main_image'] = $request->file('main_image')->store('setting');
        }

        $attribute['phone'] = $request->phone_key . $request->phone;

        $this->settingRepository->updateSetting($attribute);

        return redirect()->back()->with('success', 'تم تعديل البيانات بنجاح');
    } // end of update
}
