<x-navbar></x-navbar>
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold mt-4 text-gray-800 mb-8 text-center">Docteurs spécialisés en : {{ $specialite->nom }}</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($specialite->doctors as $doctor)
                    <div class="bg-blue-100  rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <a href="#" class="block p-6">
                            <h2 class="text-lg font-bold text-gray-900">{{ $doctor->user->name }}</h2>
                            <p class="text-gray-600">{{ $doctor->user->email }}</p>
                        </a>
                    </div>
                @empty
                    <div class="col-span-1 sm:col-span-2 lg:col-span-3">
                        <p class="text-white text-center">Aucun docteur trouvé pour cette spécialité.</p>
                    </div>
                @endforelse
            </div>
        </div>
 