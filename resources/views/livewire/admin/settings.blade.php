	<div class="tab">
									<ul class="nav nav-tabs customtab" role="tablist">
										<li class="nav-item">
											<a wire:click="selectedTab('general_settings')" class="nav-link {{ $tab == 'general_settings' ? ' active' : '' }}" data-toggle="tab" href="#general_settings" role="tab" aria-selected="true">General Settings</a>
										</li>
										<li class="nav-item">
											<a wire:click="selectedTab('logo_favicon')"  class="nav-link {{ $tab == 'logo_favicon' ? ' active' : '' }}" data-toggle="tab" href="#logo_favicon" role="tab" aria-selected="false">Logo and Favicon</a>
										</li>
										
									</ul>
									<div class="tab-content">
										<div class="tab-pane fade {{ $tab == 'general_settings' ? ' show active' : '' }}" id="general_settings" role="tabpanel">
											<div class="pd-20">
												<form action="" wire:submit.prevent="updateSiteInfo">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Site Title</label>
                                                            <input type="text" class="form-control" wire:model="site_title" placeholder="Enter your site title">
                                                            @error('site_title') <span class="text-danger">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Site Email</label>
                                                            <input type="text" class="form-control" wire:model="site_email" placeholder="Enter your site email">
                                                            @error('site_email') <span class="text-danger">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Site phone number <small>(optional)</small></label>
                                                            <input type="text" class="form-control" wire:model="site_phone" placeholder="Enter your site phone">
                                                            @error('site_phone') <span class="text-danger">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Site Meta keywords</label>
                                                            <input type="text" class="form-control" wire:model="site_meta_keywords" placeholder="Enter your site meta keywords">
                                                            @error('site_meta_keywords') <span class="text-danger">{{ $message }}</span> @enderror
                                                        </div>
                                                          
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Site Meta description <b>(optional)</b></label>
                                                            <textarea name="" class="form-control" rows="4" wire:model="site_meta_description" id=""></textarea>
                                                            @error('site_meta_description') <span class="text-danger">{{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                  
                                                  
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                </form>
											</div>
										</div>
										<div class="tab-pane fade {{ $tab == 'logo_favicon' ? ' show active' : '' }}" id="logo_favicon" role="tabpanel">
											<div class="pd-20">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6>Site Logo</h6>
                                                             
<div class="mb-2 mt-1">
    {{-- Show existing logo or a placeholder if no new logo is being previewed --}}
    @if ($site_logo && method_exists($site_logo, 'temporaryUrl'))
        {{-- Preview for the new logo --}}
        <img wire:loading.remove wire:target="site_logo" src="{{ $site_logo->temporaryUrl() }}" alt="New Logo Preview" class="img-thumbnail" style="max-width: 500px; max-height: 100px;">
    @elseif ($site_logo)
        {{-- Preview for the existing logo --}}
        <img src="{{ asset(Storage::url($site_logo)) }}" alt="Existing Logo" class="img-thumbnail" style="max-width: 500px; max-height: 100px;">
    @else
        {{-- Placeholder if no logo is set and no new one is previewed --}}
        <img src="https://via.placeholder.com/150x100.png?text=No+Logo" alt="No Logo" class="img-thumbnail" style="max-width: 500px; max-height: 100px;">
    @endif

    {{-- Loading indicator for the image upload --}}
    <div wire:loading wire:target="site_logo">
        Uploading new logo... <div class="spinner-border spinner-border-sm" role="status"></div>
    </div>

    <div class="mt-2">
        <input type="file" wire:model="site_logo" id="logo" class="form-control @error('site_logo') is-invalid @enderror" accept="image/*">
        @error('site_logo') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    {{-- Only show the button if a new logo has been selected --}}
    @if ($site_logo && method_exists($site_logo, 'temporaryUrl'))
        <button type="button" wire:click="updateLogo" wire:loading.attr="disabled" class="btn btn-primary mt-2">
            <span wire:loading wire:target="updateLogo" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            <span wire:loading.remove wire:target="updateLogo">Update Logo</span>
            <span wire:loading wire:target="updateLogo">Updating...</span>
        </button>
    @endif
</div>

    
                                                    </div>
                                                 <div class="col-md-6">
    <h6>Site Favicon</h6>
    <div class="mb-2 mt-1">
        {{-- Show existing favicon or a placeholder if no new favicon is being previewed --}}
        @if ($site_favicon && method_exists($site_favicon, 'temporaryUrl'))
            {{-- Preview for the new favicon --}}
            <img wire:loading.remove wire:target="site_favicon" src="{{ $site_favicon->temporaryUrl() }}" alt="New Favicon Preview" class="img-thumbnail" style="max-width: 160px; max-height: 100px; margin-bottom: 10px;">
        @elseif ($site_favicon)
            {{-- Display existing/saved favicon --}}
            <img src="{{ asset(Storage::url($site_favicon)) }}" alt="Current Site Favicon" class="img-thumbnail" style="max-width: 160px; max-height: 160px; margin-bottom: 10px;">
        @else
            {{-- Placeholder if no favicon is set and no new one is previewed --}}
            <img src="https://via.placeholder.com/64x64.png?text=No+Favicon" alt="No Favicon" class="img-thumbnail" style="max-width: 160px; max-height: 160px; margin-bottom: 10px;">
        @endif

        {{-- Loading indicator for the image upload --}}
        <div wire:loading wire:target="site_favicon">
            Uploading new favicon... <div class="spinner-border spinner-border-sm" role="status"></div>
        </div>

        <div class="mt-1">
            <input type="file" wire:model="site_favicon" id="favicon" class="form-control @error('site_favicon') is-invalid @enderror" accept="image/png,image/x-icon,image/vnd.microsoft.icon,image/svg+xml">
            @error('site_favicon') <span class="text-danger d-block mt-1">{{ $message }}</span> @enderror
        </div>
    </div>

    {{-- Only show the button if a new favicon has been selected --}}
    @if ($site_favicon && method_exists($site_favicon, 'temporaryUrl'))
        <button type="button" wire:click="updateFavicon" wire:loading.attr="disabled" class="btn btn-primary mt-2">
            <span wire:loading wire:target="updateFavicon" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            <span wire:loading.remove wire:target="updateFavicon">Update Favicon</span>
            <span wire:loading wire:target="updateFavicon">Updating...</span>
        </button>
    @endif
</div>
                                                </div>
											</div>
										</div>
									
									</div>
								</div>
