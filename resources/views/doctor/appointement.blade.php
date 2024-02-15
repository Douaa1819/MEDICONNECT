@foreach ($appointments_reserved as $appointment)
<div class="flex items-center w-full justify-center  "> 
               
      
                <div class="w-11/12">
                  <div for="appointment" class="inline-flex py-2 px-8 rounded-full items-center justify-between w-full text-gray-500 bg-white border border-green-500 cursor-pointer hover:text-gray-600 hover:bg-green-100 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 peer-checked:border-blue-600 peer-checked:text-blue-600">    
                      <div class="text-lg font-semibold">{{ $appointment->patient->user->name }}</div>
                      <p>{{ $appointment->booking_time }}</p>
                      <i class="fas fa-check-circle text-green-600"></i>                
                  </div>
              </div>

    
</div>
    
@endforeach