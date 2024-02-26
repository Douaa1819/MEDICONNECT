
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../public/image/licon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../public/css/style.css">
    <title>MediConnect</title>
</head>
<body>
    <x-navbar></x-navbar>
<section class="py-10 bg-gradient-to-r from-cyan-200 via-teal-400 to-green-300  ">
    <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
        <div class="flex justify-end -mr-28 mb-10">
        <div class="inline-flex top-2 items-center">
            <a href="{{route('urgent')}}" class=" border, p-2 border-slate-200 rounded-md inline-flex space-x-1 items-center text-red-200 hover:text-white bg-red-600 hover:bg-red-500  mx-28">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  <span class="text-lg font-medium hidden md:block"> Urgent</span>                     
            </a>
        </div>
        </div>
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="text-3xl font-bold leading-tight text-gray-800 sm:text-4xl lg:text-5xl lg:leading-tight">Nos Spécialités Médicales</h2>
            <p class="mt-4 text-xl text-gray-600">Explorez nos domaines d'expertise et trouvez le spécialiste qu'il vous faut.</p>
        </div>
        
  <!--  spécialités médicales  -->

        <div class="grid grid-cols-1 gap-6 mt-8 sm:mt-12 xl:mt-20 sm:grid-cols-2 lg:grid-cols-3 lg:gap-8 xl:gap-14">
            @foreach ($specialites as $specialite) 
                <a href="{{ route('specialites.doctors', $specialite->id) }}" class="block bg-blue-100 shadow-lg hover:shadow-xl transition-shadow duration-200"> 
                    <div class="py-8 px-9">
                        <p class="text-lg font-bold text-gray-900">{{ $specialite->nom }}</p>
                    </div>
                </a>
            @endforeach
        </div>  
        </div>
    </div>
</section>

{{-- Foooooooter --}}
<x-footer></x-footer>