
<x-navbar></x-navbar>
<div class="w-full p-4">
    <form>
        @foreach($appointements as $appointement)
            <div class="flex items-center w-auto my-6 -ml-1.5">
                <div class="w-1/12 z-10">
                    <div class="w-3.5 h-3.5 {{ $appointement->status == 0  }}"></div>
                </div>
                <div class="w-11/12">
                    <input type="radio" id="appointement{{ $appointement->id }}" name="appointement" value="{{ $appointement->id }}" class="hidden peer" {{ $appointement->status == 1 ? 'disabled' : '' }}>
                    <label for="appointement{{ $appointement->id }}" class="inline-flex py-2 px-8  rounded-2xl items-center justify-between w-full text-gray-500 bg-white border border-gray-200 cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 {{ $appointement->status == 1 ? 'opacity-50 cursor-not-allowed' : '' }}">
                        <div class="block">
                            <div class="w-full text-lg font-semibold">{{ $appointement->booking_time }}</div>
                            <div class="w-full">{{ $appointement->date }}</div>
                        </div>
                        <div>
                            <div class="w-full {{ $appointement->status == 0 ? 'text-green-600' : 'text-red-600' }}">{{ $appointement->status == 0 ? 'Free' : 'Already Reserved' }}</div>
                        </div>
                        <div>
                            <i class="{{ $appointement->status == 0 ? 'fa-solid fa-circle-check text-green-600' : 'fa-solid fa-heart-circle-xmark text-red-600' }}"></i>
                        </div>
                    </label>
                </div>
            </div>
        @endforeach
        <div class="flex justify-center">
            <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg">Confirm Appointment</button>
        </div>
    </form>
</div>
