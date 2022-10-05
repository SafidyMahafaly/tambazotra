<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Tongasoa ny enjana

                    <div class="row">
                        <form action="{{route('tirage')}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary">Lancer le jeur</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
