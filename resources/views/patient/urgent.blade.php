
<x-navbar></x-navbar>


<nav class = "flex justify-center px-5 py-3 text-gray-700  rounded-lg bg-gray-50 dark:bg-[#1E293B] " aria-label="Breadcrumb">
    <ol class = "inline-flex items-center space-x-1 md:space-x-3">
        <li class = "inline-flex items-center">
            <a href="" class = "inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">                    
                Today's calendrier
            </a>
        </li>
        <li>
            <div class = "flex items-center">
                <svg class = "w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fillRule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clipRule="evenodd"></path></svg>
                <a href="" class = "ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">appointement</a>
            </div>
        </li>
    </ol>
</nav>
<div class="w-full p-4">
   
    <form action="{{route('appointment.store')}}" method="post" class="flex flex-col gap-6 rounded-lg shadow-xl mt-4 p-8 mb-10 ">
        @csrf
        @method('POST')
  
        {{-- <input type="hidden" value="{{$doctorID}}" name="doctor_id"> --}}
        <input type="hidden" value="{{ Auth::user()->patient->id }}" name="patient_id"> 
          @foreach ($appointments as $appointment)
      <div class="flex items-center w-full justify-center  "> 
        @php 
        $book = [];
        
        foreach ($appointments_reserved as $app ){
         $book[] = $app->booking_time;
        }
       
@endphp

          @if (!in_array($appointment, $book))

                      <div class="w-11/12">
                       
                        <label for="appointment_{{ $loop->index }}" class="inline-flex py-2 px-8 rounded-full items-center justify-between w-full text-gray-500 bg-white border border-gray-200 cursor-pointer hover:text-gray-600 hover:bg-green-100 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 peer-checked:border-blue-600 peer-checked:text-blue-600">
                            <input type="radio"  name="booking_time" value="{{ $appointment }}"  required>
                            <div class="text-lg font-semibold">{{ $appointment }}</div>
                            <i class="fas fa-check-circle text-green-600"></i>                
                        </label>
                    </div>
                    
              @endif
          
      </div>
  @endforeach
  <x-input-error :messages="$errors->all()" class="text-sm text-red-500 ml-2" />

    <div class="flex flex-start">
        <button type="submit" class="p-2 border border-blue-800 rounded-md inline-flex space-x-1 items-center  text-white bg-indigo-600 hover:bg-indigo-500">
          <i class="fas fa-bookmark"></i>
          <span class="text-sm font-medium block">Book An Appointement</span>
        </button>
      </div>
      </form>
    </div>
<x-footer></x-footer>