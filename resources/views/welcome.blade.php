<x-app-layout >
    <div class="flex items-center justify-center">
                <div class="container">
                    <div class="items-center flex flex-wrap">
                        <div class="w-full px-4 ml-auto mr-auto text-center">
                            <div class="pr-12">
                            <p class="bg-clip-text text-transparent bg-gradient-to-r from-gray-700 to-black" style="font-size: 36px;
                    font-weight: bold;
                    margin-left: 5px;">Welcome to</p>
                            <p class="bg-clip-text text-transparent bg-gradient-to-r from-black to-gray-400" style="font-size: 76px;
                    font-weight: bold;
                    margin-left: 5px;">Project Tracker</p>
                                <p class="bg-clip-text text-transparent bg-gradient-to-r from-black to-gray-700">
                                    {{ __('An easy, fast and efficient way of tracking your projects progress from start to finish.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px"
                    style="transform: translateZ(0px)">
                    <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg"
                        preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                        <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
                    </svg>
                </div>

                <div class="container mx-auto px-6">
                    <div class="flex flex-wrap">
                        <x-welcome.data-section class="lg:pt-12 pt-6" icon-bg="bg-amber-400">
                            <x-slot:title>
                                {{ __('Project Manager') }}
                            </x-slot>
                            <x-slot:description>
                            <a href="{{ route('filament.projectManager.pages.dashboard') }}"> {{ __('In the Projects managers section, you can view and manage active projects. Add new projects, edit information, and track the status of each project. Click here to login as Project Manager') }}</a>
                            </x-slot>
                            <x-slot:icon>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                                </svg>
                            </x-slot>
                        </x-welcome.data-section>
                    
                        <x-welcome.data-section icon-bg="bg-green-400" class="lg:pt-12 pt-6">
                            <x-slot:title>
                                {{ __('Employees and Teams Members') }}
                            </x-slot>
                            <x-slot:description>
                            <a href="{{ route('filament.employee.pages.dashboard') }}">{{ __('In the Employees and Teams members sections, you can view a list of employees, their positions, and assigned tasks. Click here to login as Employee and Team Member') }}</a>
                            </x-slot>
                            <x-slot:icon>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                </svg>
                            </x-slot>
                        </x-welcome.data-section>
                    </div>

    </div>


</x-app-layout>
