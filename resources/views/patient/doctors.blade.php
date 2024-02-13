<x-navbar></x-navbar>
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold mt-4 text-gray-800 mb-8 text-center">Docteurs spécialisés en : {{ $specialite->nom }}</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($specialite->doctors as $doctor)
                    <div class="bg-blue-100  rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <a href="{{route('user.reservation')}}" class="block p-6">
                            <img src="{{asset('images/profile.jpg')}}" alt="Profile" class="w-auto h-auto object-cover">
                            <h2 class="text-lg font-bold text-gray-900">{{ $doctor->user->name }}</h2>
                            <p class="text-gray-600">{{ $doctor->user->email }}</p>
                       
                        <div class="flex justify-end bg-green-400 w-30 px-4">
                        <div class=" text-center text-black flex  justify-center ">
                        <button>Reserver</button>
                        </a>
                    </div>
                    </div>
            </div>
                @empty
                    <div class="col-span-1 sm:col-span-2 lg:col-span-3">
                        <p class="text-white text-center">Aucun docteur trouvé pour cette spécialité.</p>
                    </div>
                @endforelse
            </div>
        </div>
 