<x-navbar></x-navbar>
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mt-4 text-gray-800 mb-8 text-center">Docteurs spécialisés en : {{ $specialite->nom }}</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
       @forelse ($specialite->doctors as $doctor)
            <div class="bg-gray-100 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 relative">
                <!-- Icône favoris -->
               
                @if(Auth::check() && Auth::user()->patient)
                @php
                    $isFavori = $doctor->isFavori(Auth::user()->patient->id);
                    $countFavoris = $doctor->favorisCount();
                @endphp
                @if ($isFavori)
                <form action="{{ route('favorites.remove', $doctor->id) }}" method="post" >
                    @csrf
                    @method('DELETE')     
                    <input type="hidden" value="{{ $doctor->id }}" name="doctorID">
        
                    <button type="submit"> <i class="fas fa-heart text-red-600 text-2xl"></i></button>
                </form>
                    @else               
                        <form action="{{ route('favorites.add', $doctor->id)}}" method="post">
                        @csrf
                        @method('POST')
                      
                        <input type="hidden" value="{{ $doctor->id }}" name="doctorID">

                         <button type="submit"><i class="far fa-heart text-2xl"></i></button>
                        </form>
                        @endif
                        <span>{{ $countFavoris }}</span>
                        @endif
                 <a href="{{ route('Doctor.profile',['doctorID' =>  $doctor->id ] )}}" class="block p-6">
                    <img src="{{ asset('images/doctor.jpg') }}" alt="Profile" class="w-auto h-auto object-cover">
                    <h2 class="  text-2xl text-center font-bold text-gray-900">{{ $doctor->user->name }}</h2>
                </a>
                <div class="p-4">
                    <!--  étoiles -->
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
                </div>

        @empty
            <div class="col-span-1 sm:col-span-2 lg:col-span-3">
                <p class="text-gray-800 text-center">Aucun docteur trouvé pour cette spécialité.</p>
            </div>
        @endforelse 
    </div>
</div>
@php
@endphp
        <x-footer></x-footer>
        
        