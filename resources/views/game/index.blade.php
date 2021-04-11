<x-app-layout>
    <div class="row">
        <div class="col-9 shadow bg-white">
            @livewire('employees-clues')
        </div>
        <div class="col-3 shadow bg-white">
            <ul class="nav nav-pills nav-fill">
                {{-- Contacts tab --}}
                <li class="nav-item">
                    <a class="nav-link active" href="#contacts" data-toggle="tab">@lang('common.contacts')</a>
                </li>

                {{-- Suspects tab --}}
                <li class="nav-item">
                    <a class="nav-link" href="#suspects" data-toggle="tab">@lang('suspect.tab_title')</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                {{-- Contacts tab content --}}
                <div class="tab-pane show p-3 active" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                    @livewire('countries-list')
                </div>

                {{-- Suspects tab content --}}
                <div class="tab-pane" id="suspects" role="tabpanel" aria-labelledby="suspects-tab">
                    <div class="card">
                        <div class="card-header text-center font-weight-bold">
                            @lang('suspect.title')
                        </div>
                        <div class="card-body">
                            @livewire('suspect-details')
                        </div>
                    </div>

                    @livewire('suspect-search')
                </div>
            </div>
        </div>
    </div>
    @dump($authUser->investigations->first()->suspect)

</x-app-layout>
