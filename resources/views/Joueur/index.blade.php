<x-app-layout>
    <style>
        .wrapper {
            width: 300px;
            position: relative;
        }

        #wheel {
            max-height: inherit;
            width: inherit;
            top: 0;
            padding: 0;
        }

        @keyframes rotate {
            100% {
                transform: rotate(360deg);
            }
        }

        #spin-btn {
            position: absolute;
            top: 33%;
            right: 35%;
            height: 90px;
            width: 90px;
            border-radius: 50%;
            cursor: pointer;
            border: 0;
            background: white;
            color: #c66e16;
            text-transform: uppercase;
            font-size: 20px;
            font-weight: 600;
        }

        img {
            position: absolute;
            width: 2em;
            top: 45%;
            right: -3%;
        }

        #final-value {
            font-size: 1.5em;
            text-align: center;
            margin-top: 1.5em;
            font-weight: 500;
            /* background: red; */

        }

        @media screen and (max-width: 768px) {
            .wrapper {
                font-size: 12px;
            }

            img {
                right: -5%;
            }
        }
    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="p-6 bg-white border-b border-gray-200">
                                @if(!$tirage)
                                mbola tsisi tirage ooo
                                @else
                                @if($choix)
                                @if($choix->choix == 1)
                                <div class="alert bg-danger text-light text-center mb-0" id="test">
                                    Mena ny loko nosafidianao, tsindrio ny bokotra <b><u>ALEFA</u></b> hanombohana ny
                                    lalao!
                                </div>
                                @else
                                <div class="alert bg-dark text-light text-center mb-0" id="test">
                                    Mainty ny loko nosafidianao, tsindrio ny bokotra <b><u>ALEFA</u></b> hanombohana ny
                                    lalao!
                                </div>
                                @endif
                                @else
                                <div class="row">
                                    <div class="col-md-12">
                                        <center>
                                            <span class="alert mb-0">Misafidiana loko iray</span>
                                            <a href="#" class="btn btn-danger" value=1 onclick="sub(1,{{$tirage->id}});"
                                                class="choix">Mena</a>
                                            <a href="#" class="btn btn-dark" value=0 onclick="sub(0,{{$tirage->id}});"
                                                class="choix">Mainty</a>
                                        </center>
                                    </div>
                                </div>
                                @endif


                                @endif

                            </div>
                        </div>
                        {{-- <div class="col-md-4 ">
                            <div class="text-end">
                                <form action="{{route('tirage')}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-primary">Jouer à nouveaux</button>
                                </form>
                            </div>
                        </div> --}}
                    </div>
                </div>

                <div class="row pt-4">
                    <div class="wrapper">
                        <canvas id="wheel"></canvas>
                        <button id="spin-btn">Alefa</button>
                        <img src="{{asset('images/kisspng-brand-logo-black-and-white-triangle-arrow-symbol-5a76c6d1df2c13.8388288415177335859141.png')}}"
                            alt="">
                        <div id="final-value">

                        </div>
                    </div>
                    <div class="col">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Dicta vel fugiat molestiae consequuntur architecto at,
                        similique consequatur possimus? Assumenda, eius veritatis
                        voluptas id reprehenderit alias tenetur dolor neque adipisci voluptate.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <center id="valiny">

                    </center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                        onclick="window.location.reload()">Hiala</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"
        integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.1.0/chartjs-plugin-datalabels.min.js"
        integrity="sha512-Tfw6etYMUhL4RTki37niav99C6OHwMDB2iBT5S5piyHO+ltK2YX8Hjy9TXxhE1Gm/TmAV0uaykSpnHKFIAif/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script>
        var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'), {
        keyboard: false
        })

        let isChoix = {{ Js::from($choix) }};
        const wheel      = document.getElementById("wheel");
        const spinBtn    = document.getElementById("spin-btn");
        const finalValue = document.getElementById("final-value");

        if (isChoix) {
            var choix  = isChoix

        } else {
            spinBtn.disabled = true
            spinBtn.title = "Choisissez d'abord un couleur"
        }

        var rotationValues = [
            {minDegree:0,maxDegree:30,value:"Mena", choix:1},
            {minDegree:31,maxDegree:90,value:"Mainty", choix:0},
            {minDegree:91,maxDegree:150,value:"Mena", choix:1},
            {minDegree:151,maxDegree:210,value:"Mainty", choix:0},
            {minDegree:211,maxDegree:270,value:"Mena", choix:1},
            {minDegree:271,maxDegree:330,value:"Mainty", choix:0},
            {minDegree:331,maxDegree:360,value:"Mena", choix:1},

            ];

            const data = [16,16,16,16,16,16];


            var pieColors = ["#212529","#DC3444","#212529","#DC3444","#212529","#DC3444"];

            let myChart = new Chart(wheel,{
                type : "pie",
                data : {
                    datasets : [
                        {
                            backgroundColor : pieColors,
                            data : data,
                        }
                    ]
                },
                options : {
                    responsive :true,
                    animation : { duration : 0},
                    plugins:{
                        tooltip:false
                    }

                },
            });
            var a ;
            let test = document.getElementById("test");

            const valueGenerator = (angleValue) => {


                // test.innerHTML = "";
                for(let i of rotationValues){
                    if(angleValue >= i.minDegree && angleValue <= i.maxDegree){

                        finalValue.innerHTML = `<p>Valin'ny lalao : ${i.value} </p>`;
                        spinBtn.disabled = false;


                        if (i.choix == isChoix.choix) {
                            test.innerHTML = "Merci ty!"
                            test.removeAttribute("class")
                            test.classList.add("alert", "bg-success", "text-light", "text-center")
                            logout()
                            $('#valiny').html(
                                '<lottie-player src="https://assets1.lottiefiles.com/packages/lf20_kfl4ksd9.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay></lottie-player>'+
                                '<p class="text-success" style="font-size:30px;">Naharesy ihanao, Arahabaina!</p>'
                            )
                            myModal.show();
                        } else {
                            test.innerHTML = "Diso ny safidinao"
                            test.removeAttribute("class")
                            test.classList.add("alert", "bg-dark", "text-light", "text-center")
                            logout()
                            $('#valiny').append(
                                '<lottie-player src="https://assets8.lottiefiles.com/packages/lf20_aboiuwwv.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>\
                                <p class="text-dark" style="font-size:30px;">Resy ihanao, mampalahelo anakay</p>'
                            )
                            myModal.show();
                        }
                        break;

                    }

                }

            }

            let count = 0;
            let resultValue = 101;
            spinBtn.addEventListener('click',()=>{
                spinBtn.disabled = false;
                finalValue.innerHTML = "<p>Ho aminao anie ny vintana</p>";
                let randomDegree = Math.floor(Math.random()*(355 - 0 + 1) +0);
                console.log(randomDegree)
                if (randomDegree >= 0 && randomDegree < 30) {
                    randomDegree = 1
                } else if (randomDegree >= 31 && randomDegree < 90) {
                    randomDegree = 60
                } else if (randomDegree >= 91 && randomDegree < 150) {
                    randomDegree = 120
                } else if (randomDegree >= 151 && randomDegree < 210) {
                    randomDegree = 180
                } else if (randomDegree >= 211 && randomDegree < 270) {
                    randomDegree = 240
                }else if (randomDegree >= 271 && randomDegree < 330) {
                    randomDegree = 300
                }else if (randomDegree >= 331 && randomDegree < 360) {
                    randomDegree = 359
                }
                let rotationInterval = window.setInterval(()=>{
                    myChart.options.rotation = myChart.options.rotation + resultValue;
                    myChart.update();
                    if(myChart.options.rotation >= 360){
                        count += 1;
                        resultValue -= 5;
                        myChart.options.rotation = 0;
                    }else if(count > 15 && myChart.options.rotation == randomDegree){
                        valueGenerator(randomDegree);
                        clearInterval(rotationInterval);
                        count = 0;
                        resultValue = 101;
                        myChart.options.rotation = 0;
                    }
                    spinBtn.disabled = true;
                },10);
            })
    </script>
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

            function logout(){
                $.ajax({
                    type: "GET",
                    url: "/tiragevita",
                    success: function (response) {
                        console.log('teste');
                        // location.reload();
                    }
                });
            }

    </script>
</x-app-layout>