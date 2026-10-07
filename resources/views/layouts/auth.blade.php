<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'دار الرؤى للتدريب')</title>

    <link rel="icon" type="image/png" href="/landing/images/logo.png" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&family=El+Messiri:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- Vite Styles -->
    {{ (clone app(\Illuminate\Foundation\Vite::class))->useHotFile(public_path('landing.hot'))->useBuildDirectory('landing/build')->withEntryPoints(['resources/landing/style.css']) }}

    <style>
        body {
            font-family: 'El Messiri', 'Cairo', sans-serif;
            background-color: #F5F5F5;
            color: #262626;
        }
        .form-input-focus:focus-within {
            border-color: #4585CF !important;
            box-shadow: 0 0 0 4px rgba(69, 133, 207, 0.12) !important;
            background-color: #F6F6F6 !important;
        }
        .input-error {
            border-color: #E53935 !important;
            background-color: #FFF5F5 !important;
        }
        .input-error:focus-within {
            border-color: #E53935 !important;
            box-shadow: 0 0 0 4px rgba(229, 57, 53, 0.12) !important;
        }
        .field-error-msg {
            color: #E53935;
            font-size: 13px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 4px;
            margin-top: 2px;
            animation: fadeIn 0.2s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-3px); }
            to { opacity: 1; transform: translateY(0); }
        }
        /* Custom scrollbar for nationality dropdown */
        .custom-dropdown-scroll::-webkit-scrollbar {
            width: 6px;
        }
        .custom-dropdown-scroll::-webkit-scrollbar-track {
            background: #F1F5F9;
            border-radius: 4px;
        }
        .custom-dropdown-scroll::-webkit-scrollbar-thumb {
            background: #CBD5E1;
            border-radius: 4px;
        }
        .custom-dropdown-scroll::-webkit-scrollbar-thumb:hover {
            background: #94A3B8;
        }
    </style>
</head>
<body class="bg-[#F5F5F5] min-h-screen flex flex-col justify-center p-3 sm:p-5 lg:p-6 xl:p-8 antialiased selection:bg-[#204A7A] selection:text-white @yield('body_class', '')">
    <div class="w-full my-auto max-w-[1440px] mx-auto flex items-stretch justify-center @yield('wrapper_class', '')">
        <div class="w-full grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-8 xl:gap-12 items-stretch @yield('grid_class', '')">
            
            <!-- Form Section (Col 7 on LG/XL: Centered, clean, naturally scrollable) -->
            <main class="w-full lg:col-span-7 flex flex-col justify-center items-center px-2 sm:px-6 py-4 @yield('main_class', '')">
                @yield('content')
            </main>

            <!-- Brand Side Banner (Figma: Full Height of the UI card area, 604px width, 30px rounded) -->
            <aside class="hidden lg:flex lg:col-span-5 w-full max-w-[560px] xl:max-w-[604px] min-h-[700px] h-full mx-auto shrink-0 rounded-[20px] xl:rounded-[30px] bg-[#204A7A] text-white p-6 xl:p-10 shadow-[0px_4px_7px_1px_rgba(0,0,0,0.21)] relative overflow-hidden flex-col items-center justify-between text-center select-none py-12 @yield('aside_class', '')">
                <!-- Top Decorative Vector (Exact Figma coordinates: top left) -->
                <img src="/images/auth/auth-decor-top.svg" alt="" aria-hidden="true" class="absolute top-[28px] left-[14px] w-[135px] xl:w-[148px] max-w-[148px] pointer-events-none select-none opacity-90" />
                
                <!-- Bottom Decorative Vector (Exact Figma coordinates: bottom right) -->
                <img src="/images/auth/auth-decor-bottom.svg" alt="" aria-hidden="true" class="absolute bottom-[28px] right-[14px] w-[135px] xl:w-[148px] max-w-[148px] pointer-events-none select-none opacity-90" />

                <!-- Top Spacer -->
                <div class="h-4"></div>

                <!-- Center Logo & Slogan (Figma: 169x171px logo, 36px bold title, 21px medium subtitle) -->
                <div class="flex flex-col items-center my-auto z-10 max-w-[450px] px-2">
                    <div class="w-[140px] h-[140px] xl:w-[165px] xl:h-[165px] max-w-[169px] max-h-[171px] mb-6 flex items-center justify-center overflow-hidden">
                        <img src="/images/auth/auth-logo.png" alt="دار الرؤى للتدريب" class="w-full h-full object-contain filter drop-shadow-md" />
                    </div>
                    
                    <h2 class="text-white font-bold text-[30px] xl:text-[36px] leading-[1.3] mb-3">
                        تعلّم اليوم، لتصنع غدك!
                    </h2>
                    
                    <p class="text-[#DDDDDD] font-medium text-[18px] xl:text-[21px] leading-[1.6]">
                        مع دار الرؤى للتدريب... نصنع مستقبلك بخبرات علمية ومهارات عملية.
                    </p>
                </div>

                <!-- Footer Badge -->
                <div class="text-[#DDDDDD]/70 text-sm font-medium z-10 pb-1">
                    دار الرؤى للتدريب © {{ date('Y') }}
                </div>
            </aside>

        </div>
    </div>

    <!-- Toggle Password Visibility Script -->
    <script>
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            if (!input || !icon) return;

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        }
    </script>
    @stack('scripts')
</body>
</html>
