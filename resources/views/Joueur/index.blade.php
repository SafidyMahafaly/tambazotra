<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(!$tirage)
                        mbola tsisi tirage ooo
                    @else


                        @if($choix)
                            votre choix est {{$choix->choix}}
                        @else
                        <div class="row">
                            <div class="col-md-12">
                                <h1>{{$tirage->tirage}}</h1>
                                <a href="#" class="btn btn-danger" value="Mena" onclick="sub(1,{{$tirage->id}});" class="choix">Mena</a>
                                <a href="#" class="btn btn-dark" value="Mainty" onclick="sub(0,{{$tirage->id}});" class="choix">Mainty</a>
                            </div>
                        </div>
                        @endif


                    @endif
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

            function sub(choix,session_id){
                $.ajax({
                    type: "GET",
                    url: "/choix",
                    data: {
                        choix:choix,
                        session_id:session_id
                    },
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        location.reload()
                    }
                });
            }




    </script>
</x-app-layout>
