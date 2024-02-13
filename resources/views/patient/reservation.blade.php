<main class="">
    <div class="grid h-auto mb-4 pb-10 px-8 mx-4 rounded-3xl bg-gray-100 border-4 border-red-600">
      <div class="grid grid-cols-12 gap-6">
        <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9">
          <div class="col-span-12 mt-5">
            <div class="max-w-lg mx-auto my-10 bg-white p-8 rounded-xl shadow shadow-slate-300">
              <div class="flex flex-row justify-between items-center">
                <div>
                  <h1 class="text-3xl font-medium">Appointements list</h1>
                </div>
                <!-- <div class="inline-flex space-x-2 items-center">
                  <a href="#" class="p-2 border border-slate-200 rounded-md inline-flex space-x-1 items-center text-indigo-200 hover:text-white bg-indigo-600 hover:bg-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-sm font-medium hidden md:block">Urgent</span>
                  </a>
                  <a href="#" class="p-2 border border-slate-200 rounded-md inline-flex space-x-1 items-center hover:bg-slate-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                    <span class="text-sm hidden md:block">Latest</span>
                  </a>
                </div> -->
              </div>
              <p class="text-slate-500 my-4">Hello, here are your latest appointements</p>
              <div>
                <p class="font-bold mb-3 text-gray-700"><span><i class="fa-regular fa-sun "></i></span> Morning</p>
                <?php $i = 0 ?>
                @foreach($appointements as $appointement)
                <?php $i++ ?>
                @if($i == 5)
                <p class="font-bold mb-3 mt-6 text-gray-700"><span><i class="fa-regular fa-moon"></i></span> Evening</p>
                @endif
                @if($appointement->status == 0)
                <div id="task" class="flex justify-between items-center mb-2 border-gray-600 py-3 px-2 border-l-4 border-l-gray-600 bg-gradient-to-r from-gray-100 to-transparent hover:border-red-600 hover:from-red-200 transition-all ease-in duration-150">
                  <div class="inline-flex items-center space-x-2">
                    <div>
                      <i class="fa-regular fa-clock fa-lg"></i>
                    </div>
                    <div>{{ $appointement->date }}<span class=" italic">{{ $appointement->booking_time }}</span></div>
                  </div>
                  <div>free</div>
                </div>
                @else
                <div id="task" class="flex justify-between items-center mb-2 border-green-600 py-3 px-2 border-l-4 border-l-green-600 bg-gradient-to-r from-green-100 to-transparent hover:border-red-600 hover:from-red-200 transition-all ease-in duration-150">
                  <div class="inline-flex items-center space-x-2">
                    <div>
                      <i class="fa-regular fa-clock fa-lg"></i>
                    </div>
                    <div>{{ $appointement->date }}<span class=" italic">{{ $appointement->booking_time }}</span></div>
                  </div>
                  <div>{{ $appointement->patient->user->name }}</div>
                  <div>reserved</div>
                </div>
                @endif
                @endforeach
              </div>
              <p class="text-xs text-slate-500 text-center">12/12/2024 Appointements</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>