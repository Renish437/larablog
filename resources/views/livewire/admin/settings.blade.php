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
                                                Logo and Favicon
											</div>
										</div>
									
									</div>
								</div>
