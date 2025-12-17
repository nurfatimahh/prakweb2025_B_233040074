@extends('components.layout')

@section('title', 'Tentang Kami')

@section('content')
<section class="max-w-5xl mx-auto py-20 px-6">
    <h1 class="text-4xl font-bold text-center mb-6 text-blue-600">
        Tentang DonasiKu
    </h1>

    <p class="text-gray-700 text-center mb-10">
        DonasiKu adalah platform donasi yang bertujuan membantu sesama
        melalui berbagai program sosial, pendidikan, kesehatan, dan bencana.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white shadow rounded-lg p-6 text-center">
            <h3 class="text-xl font-semibold mb-3">💙 Misi Kami</h3>
            <p class="text-gray-600">
                Menyalurkan donasi secara transparan dan tepat sasaran.
            </p>
        </div>

        <div class="bg-white shadow rounded-lg p-6 text-center">
            <h3 class="text-xl font-semibold mb-3">🎯 Tujuan</h3>
            <p class="text-gray-600">
                Membantu masyarakat yang membutuhkan di seluruh Indonesia.
            </p>
        </div>

        <div class="bg-white shadow rounded-lg p-6 text-center">
            <h3 class="text-xl font-semibold mb-3">🤝 Komitmen</h3>
            <p class="text-gray-600">
                Transparansi, kepercayaan, dan kebermanfaatan.
            </p>
        </div>
    </div>
</section>
@endsection
