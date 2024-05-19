<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-40 bg-white tracking-wide text-gray-800 font-bold rounded border-b-2 border-[#95172d] hover:border-[#95172d] hover:bg-[#95172d] hover:text-white shadow-md py-2 px-6 inline-flex items-center text-center justify-center']) }}>
    {{ $slot }}
</button>
