
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
<section class="py-10 bg-gradient-to-r from-cyan-200 via-teal-400 to-green-300 sm:py-16 lg:py-24">
    <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="text-3xl font-bold leading-tight text-gray-800 sm:text-4xl lg:text-5xl lg:leading-tight">Nos Spécialités Médicales</h2>
            <p class="mt-4 text-xl text-gray-600">Explorez nos domaines d'expertise et trouvez le spécialiste qu'il vous faut.</p>
        </div>
  <!--  spécialités médicales ici -->
        <div class="grid grid-cols-1 gap-6 mt-8 sm:mt-12 xl:mt-20 sm:grid-cols-2 lg:grid-cols-3 lg:gap-8 xl:gap-14">
            @foreach ($specialites as $specialite)
                <a href="#" class="block bg-blue-100 shadow-lg hover:shadow-xl transition-shadow duration-200">
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