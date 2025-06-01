<?php

namespace App\Livewire\Admin;

use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;

class Settings extends Component
{

    use WithFileUploads;

    #[Url()]
    public $tab = null;
    public $default_tab= 'general_settings';

    public $site_title, $site_email, $site_phone, $site_meta_keywords, $site_meta_description, $site_logo, $site_favicon;

public function updateLogo(){
    $this->validate([
        'site_logo' => 'required',
    ]);
    $settings = GeneralSetting::take(1)->first();
    if(!is_null($settings)){
        $filename = 'logo-' . time() . '.' . $this->site_logo->getClientOriginalExtension();
       $filepath = $this->site_logo->store('site-logo', 'public');
       if($settings->site_logo){
        Storage::disk('public')->delete($settings->site_logo);
       }
        $updated = $settings->update([
            'site_logo' => $filepath,
        ]);
        if($updated){
            $this->dispatch('toastMagic',
            status: 'success',
            title: 'Logo Updated Successfully',
            options: [
                'showCloseBtn' => true,
                'progressBar' => true,
                'backdrop' => true,
                'positionClass' => 'toast-top-left',
            ]
        );
        }
    }else{
        $updated = GeneralSetting::create([
            'site_logo' => $this->site_logo,
        ]);
        if($updated){
            $this->dispatch('toastMagic',
            status: 'success',
            title: 'Logo Updated Successfully',
            options: [
                'showCloseBtn' => true,
                'progressBar' => true,
                'backdrop' => true,
                'positionClass' => 'toast-top-left',
            ]
        );
        }
    }
}
public function updateFavicon(){
    $this->validate([
        'site_favicon' => 'required',
    ]);
    $settings = GeneralSetting::take(1)->first();
    if(!is_null($settings)){
        $filename = 'favicon-' . uniqid() . '.' . $this->site_favicon->getClientOriginalExtension();
       $filepath = $this->site_favicon->store('site-favicon', 'public');
       if($settings->site_favicon){
        Storage::disk('public')->delete($settings->site_favicon);
       }
        $updated = $settings->update([
            'site_favicon' => $filepath,
        ]);
        if($updated){
            $this->dispatch('toastMagic',
            status: 'success',
            title: 'Favicon Updated Successfully',
            options: [
                'showCloseBtn' => true,
                'progressBar' => true,
                'backdrop' => true,
                'positionClass' => 'toast-top-left',
            ]
        );
        }
    }else{
        $updated = GeneralSetting::create([
            'site_favicon' => $this->site_favicon,
        ]);
        if($updated){
            $this->dispatch('toastMagic',
            status: 'success',
            title: 'Favicon Updated Successfully',
            options: [
                'showCloseBtn' => true,
                'progressBar' => true,
                'backdrop' => true,
                'positionClass' => 'toast-top-left',
            ]
        );
        }
    }
}
    public function selectedTab($tab){
        $this->tab = $tab;
    }
    public function mount(){
        $this->tab = Request('tab') ? Request('tab') : $this->default_tab;
        $settings = GeneralSetting::take(1)->first();
       if(!is_null($settings)){
        $this->site_title = $settings->site_title;
        $this->site_email = $settings->site_email;
        $this->site_phone = $settings->site_phone;
        $this->site_meta_keywords = $settings->site_meta_keywords;
        $this->site_meta_description = $settings->site_meta_description;
        $this->site_logo = $settings->site_logo;
        $this->site_favicon = $settings->site_favicon;
       }
    }
    public function updateSiteInfo(){
        $this->validate([
            'site_title' => 'required',
            'site_email' => 'required|email',
           

        ]);
      
        $settings = GeneralSetting::take(1)->first();
      if(!is_null($settings)){
        $updated = $settings->update([
            'site_title' => $this->site_title,
            'site_email' => $this->site_email,
            'site_phone' => $this->site_phone,
            'site_meta_keywords' => $this->site_meta_keywords,
            'site_meta_description' => $this->site_meta_description,
            'site_logo' => $this->site_logo,
            'site_favicon' => $this->site_favicon,
        ]);
      }else{
        $updated = GeneralSetting::create([
            'site_title' => $this->site_title,
            'site_email' => $this->site_email,
            'site_phone' => $this->site_phone,
            'site_meta_keywords' => $this->site_meta_keywords,
            'site_meta_description' => $this->site_meta_description,
            'site_logo' => $this->site_logo,
            'site_favicon' => $this->site_favicon,
        ]);
      }

       if($updated){
        $this->dispatch(
            'toastMagic',
            status: 'success',
            title: 'Settings Updated Successfully',
            options: [
                'showCloseBtn' => true,
                'progressBar' => true,
                'backdrop' => true,
                'positionClass' => 'toast-top-left',

            ]
        );
       }else{
        $this->dispatch(
            'toastMagic',
            status: 'error',
            title: 'Something went wrong',
            options: [
                'showCloseBtn' => true,
                'progressBar' => true,
                'backdrop' => true,
                'positionClass' => 'toast-top-left',

            ]
        );
       }
     
           
            }
    public function render()
    {
        return view('livewire.admin.settings');
    }
}
