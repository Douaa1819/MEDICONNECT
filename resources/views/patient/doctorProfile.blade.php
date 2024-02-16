<x-navbar></x-navbar>
<div class="h-full bg-gray-200 p-8">
    <div class="bg-white rounded-lg shadow-xl pb-8">
        <div x-data="{ openSettings: false }" class="absolute right-12 mt-4 rounded">
            <button @click="openSettings = !openSettings" class="border border-gray-400 p-2 rounded text-gray-300 hover:text-gray-300 bg-gray-100 bg-opacity-10 hover:bg-opacity-20" title="Settings">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                </svg>
            </button>
            <div x-show="openSettings" @click.away="openSettings = false" class="bg-white absolute right-0 w-40 py-2 mt-1 border border-gray-200 shadow-2xl" style="display: none;">
                <div class="py-2 border-b">
                    <p class="text-gray-400 text-xs px-6 uppercase mb-1">Settings</p>
                    <button class="w-full flex items-center px-6 py-1.5 space-x-2 hover:bg-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                        </svg>
                        <span class="text-sm text-gray-700">Share Profile</span>
                    </button>
                    <button class="w-full flex items-center py-1.5 px-6 space-x-2 hover:bg-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                        </svg>
                        <span class="text-sm text-gray-700">Block User</span>
                    </button>
                    <button class="w-full flex items-center py-1.5 px-6 space-x-2 hover:bg-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-sm text-gray-700">More Info</span>
                    </button>
                </div>
                <div class="py-2">
                    <p class="text-gray-400 text-xs px-6 uppercase mb-1">Feedback</p>
                    <button class="w-full flex items-center py-1.5 px-6 space-x-2 hover:bg-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                        <span class="text-sm text-gray-700">Report</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="w-full h-[250px]">
            <img src="https://vojislavd.com/ta-template-demo/assets/img/profile-background.jpg" class="w-full h-full rounded-tl-lg rounded-tr-lg">
        </div>
        <div class="flex flex-col items-center -mt-20">
            <img src="{{ asset('images/doctor.jpg') }}"  class="w-40 border-4 border-white rounded-full">
            <div class="flex items-center space-x-2 mt-2">
                <p class="text-2xl">{{ $doctor->user->name }}</p>
                <span class="bg-blue-500 rounded-full p-1" title="Verified">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-100 h-2.5 w-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path>
                    </svg>
                </span>
            </div>
            <p class="text-gray-700">{{ $doctor->user->email }}</p>
             <a href="{{ route('aptient.appointment',['doctorID' =>  $doctor->id ] )}}" class="block p-6"> 
            <button class="mt-4 bg-green-400 text-black px-4 py-2 rounded">Réserver</button>
             </a>
        </div>
        <div class="flex-1 flex flex-col items-center lg:items-end justify-end px-8 mt-2">
            {{-- Commentaire pop up --}}
            <div class="flex items-center space-x-4 mt-2">
                <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="w-14 h-14 bg-yellow-500 rounded-full flex items-center justify-center font-bold text-white"> <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 10.5h0m-4 0h0m-4 0h0M5 5h14c.6 0 1 .4 1 1v9c0 .6-.4 1-1 1h-6.6a1 1 0 0 0-.7.3L8.8 19c-.3.3-.8 0-.8-.4V17c0-.6-.4-1-1-1H5a1 1 0 0 1-1-1V6c0-.6.4-1 1-1Z"/>
                </svg></button>
                <!-- Main modal -->
                <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                  <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                      <!-- Modal header -->
                      <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                          partager votre expérience avec la communauté
                        </h3>
                        <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                          </svg>
                          <span class="sr-only">Close modal</span>
                        </button>
                      </div>
                      <!-- Modal body -->
                      <div class="p-4 md:p-5">
                        <form class="space-y-4" action="{{route('note.store')}}" method="post">
                          @csrf
                          @method('post')
                          <div>
                            <label for="comment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">What's your thought?</label>
                            <textarea type="text" name="comment" id="comment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" rows="4" required>Write your review here</textarea>
                          </div>
                          <input type="hidden" name="doctorID" value="{{ $doctor->id }}">
                          <input type="hidden" name="patientID" value="{{ Auth::user()->id }}">
                          <div>
                            <select id="review" name="starCount">
                              <option value="5">⭐️⭐️⭐️⭐️⭐️</option>
                              <option value="4">⭐️⭐️⭐️⭐️</option>
                              <option value="3">⭐️⭐️⭐️</option>
                              <option value="2">⭐️⭐️</option>
                              <option value="1">⭐️</option>
                            </select>
                          </div>
                          
                          <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login to your account</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

            
        </div>
    </div>

    
   
     

    <x-footer></x-footer>