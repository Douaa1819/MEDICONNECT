<x-navbar></x-navbar>
<div class="h-full bg-gray-200 p-8">
    <div class="bg-white rounded-lg shadow-xl pb-8">
        <div x-data="{ openSettings: false }" class="absolute right-12 mt-4 rounded">
            <div x-show="openSettings" @click.away="openSettings = false" class="bg-white absolute right-0 w-40 py-2 mt-1 border border-gray-200 shadow-2xl" style="display: none;">
                <div class="py-2 border-b">
                    <p class="text-gray-400 text-xs px-6 uppercase mb-1">Settings</p>
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
            <div class="mb-3">
              @php
                  $averageRating = round($doctor->notes->avg('Countnote'), 1);
                  $fullStars = floor($averageRating);
                  $halfStar = $averageRating - $fullStars >= 0.5 ? true : false;
                  $emptyStars = 5 - ceil($averageRating);
              @endphp
              <div class="flex items-center">
                  @for ($i = 0; $i < $fullStars; $i++)
                      <i class="fas fa-star text-yellow-500"></i>
                  @endfor
                  @if ($halfStar)
                      <i class="fas fa-star-half-alt text-yellow-500"></i>
                  @endif
                  @for ($i = 0; $i < $emptyStars; $i++)
                      <i class="far fa-star text-yellow-500"></i>
                  @endfor
                  <span class="ml-2 text-gray-600">({{ $averageRating }} sur 5)</span>
              </div>
          </div>
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
                            <label for="comment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
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
                          
                          <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">publier</button>
                          @if(session('success'))
                    <script>
                        setTimeout(function() {
                            alert('{{ session('success') }}');
                        }, 100);
                    </script>
                @endif
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

            </div>
            <div class="container mx-auto px-4 mt-5">
              <h1 class="text-3xl font-bold text-gray-800 mb-4">Avis sur le Docteur: {{ $doctor->user->name }}</h1>
      
              
              <!-- Liste des commentaires -->
              <div class="space-y-4">
                  <h2 class="text-xl font-semibold text-gray-700">Commentaires:</h2>
                  @forelse ($doctor->notes as $note)
                      <div class="p-4 bg-white rounded-lg shadow">
                          <div class="flex justify-between items-center mb-1">
                              <span class="text-sm text-gray-600">{{ $note->created_at->format('d/m/Y') }}</span>
                          </div>
                          <p class="text-gray-600">{{ $note->Comment }}</p>
                          <div class="flex mt-2">
                              @for ($i = 0; $i < $note->Countnote; $i++)
                                  <i class="fas fa-star text-yellow-500"></i>
                              @endfor
                              @for ($i = $note->Countnote; $i < 5; $i++)
                                  <i class="far fa-star text-yellow-500"></i>
                              @endfor
                          </div>
                      </div>
                  @empty
                      <p>Aucun commentaire pour le moment.</p>
                  @endforelse
              </div>
          </div>
            
        </div>
    </div>

    
    <x-footer></x-footer>
    
     

    