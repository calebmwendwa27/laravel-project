@extends('layouts.app')

@section('content')

{{-- Navigation Bar --}}
<div class="bg-white shadow-sm py-4 px-6 flex justify-between items-center text-sm md:text-base">
    <div class="text-blue-600 font-bold text-xl">MEDIFIND</div>
    <div class="space-x-4 text-gray-700 font-medium">
        <a href="#" class="hover:text-blue-500">HOME</a>
        <a href="#services" class="hover:text-blue-500">SERVICES</a>
        <a href="#about" class="hover:text-blue-500">ABOUT US</a>
        <a href="#contact" class="hover:text-blue-500">CONTACT US</a>
        <a href="{{ route('search') }}" class="bg-[#082842] text-white px-6 py-2 rounded hover:bg-blue-900 transition">
            Search for Drug or Disease
        </a>
    </div>
</div>

{{-- ABOUT US SECTION --}}
<div id="about" class="py-12 px-6 text-gray-700 mb-[15px] ml-0">
    <div class="flex flex-col md:flex-row items-stretch gap-8 h-[400px] w-full max-w-6xl mx-auto">
        {{-- LEFT: Text Block --}}
        <div class="flex flex-col gap-8 w-[500px] h-[400px] text-sm">
            <h2 class="text-1xl font-bold text-blue-700">ABOUT US</h2>
            <p class="mb-0">
                At MediFind, we believe that access to trusted medical information is the first step to better health.
                Our platform is designed to help you instantly search and understand any medicine in the world —
                whether by its name or by the condition it treats.
            </p>
            <ul class="list-disc pl-9 mt-0 mb-0">
                <li>Your age</li>
                <li>Any pre-existing condition</li>
                <li>Ongoing health complication</li>
                <li>Your medication history</li>
                <li>Potential drug interactions</li>
            </ul>
            <p class="mt-0 mb-0">
                This allows users to gain contextual knowledge about prescriptions — ensuring the medicine you're
                exploring aligns with your personal health background. We also provide a real-time quote estimation
                of how much a medicine should cost — based on regional and global average prices.
            </p>
        </div>

        {{-- RIGHT: Image Block --}}
        <img src="{{ asset('dashboard.png') }}" alt="Dashboard Banner"
             class="w-[400px] object-contain rounded-2xl shadow-md">
    </div>
</div>

{{-- SERVICES SECTION --}}
<div id="services" class="bg-gray-50 py-12 px-6">
    <h2 class="text-1xl font-bold text-blue-700">SERVICES</h2>
    <div class="grid md:grid-cols-3 gap-8">
        <div class="w-[234px] h-[213px]">
            <h3 class="font-semibold text-lg mb-2">Find Medicines by Name or Condition</h3>
            <p class="bg-[#BEAEAE]">
                Quickly search for any medicine and discover its uses, dosage, side effects, and alternatives.
            </p>
            <p class="italic bg-[#BEAEAE]">"Type it. Learn it. Know what heals you.”</p>
        </div>
        <div>
            <h3 class="font-semibold text-lg mb-2">Personalized Drug Information</h3>
            <p class="bg-[#A5CBE3]">
                MediFind analyzes your age, medical history, and ongoing conditions to help you make smarter decisions.
            </p>
            <p class="italic bg-[#A5CBE3]">"Because every body is different — and so is every dose."</p>
        </div>
        <div>
            <h3 class="font-semibold text-lg mb-2">Real-Time Drug Price Estimation</h3>
            <p class="bg-[#9E5152]">
                Access real-time quote estimations of medicine prices based on your location.
            </p>
            <p class="italic bg-[#9E5152]">“Stay informed. Buy smart.”</p>
        </div>
    </div>
</div>

{{-- SPECIALIST SECTION --}}
<div class="py-12 px-6 bg-white text-gray-800">
    <div class="flex flex-col md:flex-row items-start gap-0 max-w-6xl mx-auto">
        {{-- LEFT: Text Block --}}
        <div class="w-[398px] h-[155px]">
            <h2 class="text-1xl font-bold text-blue-700">Specialist Support & Clarification</h2>
            <p class="text-sm leading-relaxed mb-4">
                If you need more clarification about a particular medicine, have additional questions, or require
                further guidance, <strong>MediFind</strong> has you covered. Click the
                <strong>"consult a Specialist"</strong> button to speak with a professional.
            </p>
            <button class="mt-4 bg-[#082842] text-white px-6 py-2 rounded-full hover:bg-blue-900 transition">
                consult a Specialist
            </button>
        </div>

        {{-- RIGHT: Image Block --}}
        <div class="ml-[10px] w-[200px] h-[300px]">
            <img src="{{ asset('image2.jpg') }}" alt="Consult a Specialist"
                 class="w-[200px] h-[300px] object-cover rounded shadow-md">
        </div>
    </div>
</div>

{{-- TESTIMONIALS --}}
<div class="py-12 px-6 max-w-6xl mx-auto">
    <h2 class="text-3xl font-bold text-blue-700 mb-8">TESTIMONIALS</h2>
    <div class="space-y-6">
        <blockquote class="border-l-4 pl-4 italic text-gray-600">
            “I used MediFind to compare three allergy medications my doctor mentioned.”<br>
            <strong>~ Angela K., 29 – MOMBASA</strong>
        </blockquote>
        <blockquote class="border-l-4 pl-4 italic text-gray-600">
            “Searching for meds by disease is genius. I typed in ‘malaria’ and got all treatments.”<br>
            <strong>~ Felix M., 22 – NAIROBI</strong>
        </blockquote>
        <blockquote class="border-l-4 pl-4 italic text-gray-600">
            “MediFind explained it in seconds — I felt safe and informed.”<br>
            <strong>~ Caleb M., 45 – MACHAKOS</strong>
        </blockquote>
    </div>
</div>

{{-- CONTACT US --}}
<div id="contact" class="bg-blue-50 py-12 px-6">
    <h2 class="text-3xl font-bold text-blue-700 text-center mb-6">CONTACT US</h2>
    <div class="max-w-4xl mx-auto grid md:grid-cols-2 gap-6">
        <div>
            <p><strong>Address:</strong> P.O Box 28883 – 00100, Nairobi Kenya</p>
            <p><strong>Phone:</strong> <a href="tel:+254720285698" class="text-blue-600">+254 720 285 698</a></p>
            <p><strong>Email:</strong> <a href="mailto:info@healthix.co.ke" class="text-blue-600">info@healthix.co.ke</a></p>
            <p><strong>Website:</strong> <a href="https://healthix.co.ke" class="text-blue-600">www.medifind.com</a></p>
        </div>
        <form action="#" method="POST" class="space-y-4">
            <input type="text" placeholder="Full Name" class="w-full px-4 py-2 border rounded" required>
            <input type="email" placeholder="Email Address" class="w-full px-4 py-2 border rounded" required>
            <input type="text" placeholder="Subject" class="w-full px-4 py-2 border rounded" required>
            <textarea placeholder="Message" class="w-full px-4 py-2 border rounded" rows="4" required></textarea>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-red-600 transition">
                SEND MESSAGE
            </button>
        </form>
    </div>
</div>

@endsection

