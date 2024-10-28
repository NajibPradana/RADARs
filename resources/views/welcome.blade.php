<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="src/output.css" rel="stylesheet">
</head>
<body>
    <!-- Header Section -->
    <header class="bg-[#842222] absolute top-0 left-0 w-full flex items-center z-10">
        <div class="container">
            <div class="flex items-center justify-between relative">
                <div class="px-4">
                    <a href="#Beranda" class="max-w-60 block py-4"><img src="./img/logo.png" alt="logo"></a>
                </div>
                <div class="flex items-center px-4">
                    <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                        <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
                    </button>
                    <nav id="nav-menu" class="hidden absolute py-3 bg-white shadow-lg max-w-[200px] w-full right-4 top-full lg:shadow-none lg:block lg:static lg:bg-transparent lg:max-w-full">
                        <ul class="block lg:flex">
                            <li class="group">
                                <a href="" class="text-base font-medium text-slate-500 py-2 mx-8 flex lg:hidden group-hover:text-[#842222]">Nama Pengguna</a>
                            </li>
                            <li class="group">
                                <a href="" class="text-base font-medium text-slate-500 py-2 mx-8 flex lg:text-white lg:group-hover:text-[#FDA43C] group-hover:text-[#842222]">Lihat Daftar</a>
                            </li>
                            <li class="group">
                                <a href="" class="text-base font-medium text-slate-500 py-2 mx-8 flex lg:text-white lg:group-hover:text-[#FDA43C] group-hover:text-[#842222]">Riwayat</a>
                            </li>
                            <li class="group">
                                <a href="" class="text-base font-medium text-slate-500 py-2 mx-8 flex lg:text-white lg:group-hover:text-[#FDA43C] group-hover:text-[#842222]">Keluar</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header END -->

    <!-- Hero Section -->
     <section id="Beranda" class="pt-36 pb-20 bg-slate-500">
        <div class="container items-center">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h4 class="font-bold text-[32px] lg:text-[48px] text-white mb-4">Selamat Datang.</h4>
                    <p class="font-medium text-slate-300 text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt culpa alias dolores.</p>
                </div>
            </div>
            <div class="w-full px-4 flex justify-center">
                <div class="min-w-[264px] sm:min-w-[324px] md:min-w-96 md:flex md:flex-wrap lg:flex lg:flex-wrap p-2 bg-white items-center rounded-md justify-center lg:min-w-[600px] shadow-lg">
                    <div class="flex md:w-3/5 md:pr-2 lg:w-3/5 lg:pr-2">
                        <select class="w-full appearance-auto bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            <option>Pilihan 1</option>
                            <option>Pilihan 2</option>
                            <option>Pilihan 3</option>
                        </select>
                    </div>
                    
                    <div class="flex space-x-2 items-center md:w-2/5 lg:w-2/5">
                        <button class="mt-2 md:mt-0 lg:mt-0 w-1/2  bg-[#842222] hover:bg-[#561818] text-white font-medium py-2 px-4 rounded items-center"> 
                            <span>Input</span>
                        </button>
                        <button class="mt-2 md:mt-0 lg:mt-0 w-1/2  bg-[#FDA43C] hover:bg-[#eb8c20] text-white font-medium py-2 px-4 rounded">
                            Lihat
                        </button>
                    </div>
                </div>
            </div>
        </div>
     </section>
    <!-- Hero End -->

    <!-- About Section -->
     <section id="About" class="pt-16">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-3xl mx-auto text-center mb-16">
                    <h4 class="font-bold text-[32px] lg:text-[48px] text-black mb-4">Tentang <span class="text-[#842222]">DIAPUSI</span></h4>
                    <div class="space-y-4 lg:flex lg:space-x-4 lg:space-y-0">
                        <p class="font-medium text-gray-600 lg:text-end lg:w-1/2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis quibusdam non temporibus iure, voluptatum reiciendis quod officiis molestiae veritatis recusandae doloribus laboriosam ipsa nemo doloremque dolores dignissimos beatae. Tenetur quidem natus doloribus in deserunt nam?</p>
                        <p class="font-medium text-gray-600 lg:text-start lg:w-1/2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo totam alias corrupti itaque, aspernatur eos autem dolorem, soluta ipsam, eveniet facilis recusandae?</p>
                    </div>
                </div>
            </div>
        </div>
     </section>
    <!-- About END -->

    <!-- Footer Section -->
     <footer>
        <div class="container w-full bg-slate-950 py-5 items-center">
            <div class="block px-4 pt-5 lg:flex lg:flex-wrap">
                <div class="block lg:w-1/3">
                    <img src="./img/logo2.png" alt="logo" class="max-w-11 space-y-1">
                    <h5 class="uppercase text-white text-bold pt-2 max-w-full">Dinas Arsip dan Perpustakaan Kota Semarang</h5>
                    <p class="text-slate-400 font-medium text-sm max-w-full">dinas_arpus@semarangkota.go.id</p>
                    <p class="text-slate-500 font-medium text-sm max-w-full">Jl. Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, aliquam!</p>
                </div>
                <div class="block mt-4 lg:pl-6 lg:pt-10 lg:w-2/3">
                    <p class="text-slate-400 font-medium text-base ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum beatae eaque expedita deleniti quasi neque ad quo, similique deserunt inventore vitae assumenda, veniam, libero labore dolores soluta? Officia provident dignissimos quae, expedita, sequi in possimus ratione eaque, consequuntur vitae quidem.</p>
                </div>
            </div>
            <p class="mt-10 px-4 text-center text-xs font-medium text-slate-500">
                Dibuat dengan <span class="text-pink-500">❤️</span> oleh Tim Kerja Praktik Teknik Komputer UNDIP
            </p>
        </div>
     </footer>
    <!-- Footer END -->

    <script src="./src/script.js"></script>
</body>
</html> 