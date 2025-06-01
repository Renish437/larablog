<?php

namespace App\Livewire\Admin;

use App\Models\GeneralSetting;
use Livewire\Attributes\Url;
use Livewire\Component;

class Settings extends Component
{
    #[Url()]
    public $tab = null;
    public $default_tab= 'general_settings';

    public $site_title, $site_email, $site_phone, $site_meta_keywords, $site_meta_description, $site_logo, $site_favicon;


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
