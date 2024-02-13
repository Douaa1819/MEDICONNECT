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
<body class="bg-no-repeat bg-right bg-fixed" style="background-image: url('your-background-image'); background-size: contain;">
    <header>
        <nav class="h-40 bg-white shadow-md">
            <div class="max-w-6xl mx-auto px-4 flex justify-between items-center h-full">
                <a href="/patient/home">
                    <img src="{{asset('images/logo.png')}}" alt="logo" width="190px" height="150px">
                </a>
                <div class="flex items-center">
                    <ul class="flex space-x-4 rtl:space-x-reverse">
                        <li>
                            <a href="/" class="py-2 px-4 text-blue-800 hover:text-blue-600 dark:text-white">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('Edite.patient') }}" class="py-2 px-4 text-gray-500 hover:text-gray-700">Edit Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('logout.perform') }}" class="py-2 px-4 text-gray-500 hover:text-gray-700">Logout</a>
                        </li>
                    </ul>
                    <div class="flex justify-end">
                        <a href="{{ route('Edite.patient') }}">
                        <div class="h-full">
                            <button class="flex items-center gap-3 py-3 px-5 rounded-lg text-black hover:bg-gray-200 active:bg-gray-300 transition-all">
                              <img src="{{asset('images/profile.jpg')}}" alt="Profile" class="w-12 h-12 rounded-full object-cover">
                            </button>
                          </div>
                        </div>
                    </a>
                </div>
            </div>
        </nav>
    </header>
</body>
</html>


    