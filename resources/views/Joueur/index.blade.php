<x-app-layout>
    <style>
        .wrapper{

            width: 90%;
            max-width: 34.37em;
            max-height: 90vh;
            background-color: #ffffff;
            /* position: absolute; */
            /* transform: translate(-50%,-50%);
            top: 50%;
            left: 20%; */
            padding: 3em;
            border-radius: 1em;
            /* box-shadow: 0 4em 5em rgba(27, 8, 53, 0.2); */
        }
        .container{
            position: relative;
            width: 100%;
            height: 100%;
        }
        #wheel{
            max-height: inherit;
            width: inherit;
            top: 0;
            padding: 0;
        }

        @keyframes rotate{
            100%{
                transform: rotate(360deg);
            }
        }
        #spin-btn{
            position: absolute;
            transform: translate(-50%,-50%);
            top: 43.5%;
            left: 50%;
            height: 25%;
            width: 28%;
            border-radius: 50%;
            cursor: pointer;
            border:0;
            background: white;
            color: #c66e16;
            text-transform: uppercase;
            font-size: 20px;
            font-weight: 600;
        }
        img{
            position: absolute;
            width: 4em;
            top:45%;
            right: -8%;
        }
        #final-value{
            font-size: 1.5em;
            text-align: center;
            margin-top: 1.5em;
            font-weight: 500;
            /* background: red; */

        }
        @media screen  and (max-width: 768px){
            .wrapper{
                font-size: 12px;
            }
            img{
                right: -5%;
            }
        }
    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="p-6 bg-white border-b border-gray-200">
                                @if(!$tirage)
                                    mbola tsisi tirage ooo
                                @else
                                    @if($choix)
                                        @if($choix->choix == "mena")
                                            <div class="alert bg-danger text-light text-center" id="test">
                                                Mena ny loko nosafidianao, tsindrio ny bokotra <b><u>ALEFA</u></b> hanombohana ny lalao!
                                            </div>
                                        @else
                                        <div class="alert bg-dark text-light text-center" id="test">
                                            Mainty ny loko nosafidianao, tsindrio ny bokotra <b><u>ALEFA</u></b> hanombohana ny lalao!
                                        </div>
                                        @endif
                                    @else
                                    <div class="row">
                                        <div class="col-md-12">
                                            <center>
                                                <span>Misafidiana loko iray</span>
                                                <a href="#" class="btn btn-danger" value="Mena" onclick="sub('mena',{{$tirage->id}});" class="choix">Mena</a>
                                                <a href="#" class="btn btn-dark" value="Mainty" onclick="sub('mainty',{{$tirage->id}});" class="choix">Mainty</a>
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

                <div class="row">
                    <div class="wrapper" style="width: 600px;height:600px;margin-left:120px">
                        <div class="container">
                            <canvas id="wheel"></canvas>
                            <button id="spin-btn">Alefa</button>
                            <img src="{{asset('images/kisspng-brand-logo-black-and-white-triangle-arrow-symbol-5a76c6d1df2c13.8388288415177335859141.png')}}" alt="">
                            <div id="final-value">

                            </div>
                        </div>

                    </div>
                    <div class="col">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta vel fugiat molestiae consequuntur architecto at, similique consequatur possimus? Assumenda, eius veritatis voluptas id reprehenderit alias tenetur dolor neque adipisci voluptate.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <center id="valiny">

                </center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" onclick="window.location.reload()">Hiala</button>
            </div>
        </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.1.0/chartjs-plugin-datalabels.min.js" integrity="sha512-Tfw6etYMUhL4RTki37niav99C6OHwMDB2iBT5S5piyHO+ltK2YX8Hjy9TXxhE1Gm/TmAV0uaykSpnHKFIAif/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
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
            {minDegree:0,maxDegree:30,value:"Rouge", choix:"mena"},
            {minDegree:31,maxDegree:90,value:"Noir", choix:"mainty"},
            {minDegree:91,maxDegree:150,value:"Rouge", choix:"mena"},
            {minDegree:151,maxDegree:210,value:"Noir", choix:"mainty"},
            {minDegree:211,maxDegree:270,value:"Rouge", choix:"mena"},
            {minDegree:271,maxDegree:330,value:"Noir", choix:"mainty"},
            {minDegree:331,maxDegree:360,value:"Rouge", choix:"mena"},

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
                            break;
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
                            break;
                        }

                    }

                }

            }



            let count = 0;
            let resultValue = 101;
            spinBtn.addEventListener('click',()=>{
                spinBtn.disabled = false;
                finalValue.innerHTML = "<p>Ho aminao anie ny vintana</p>";

                let randomDegree = Math.floor(Math.random()*(355 - 0 + 1) +0);
                let rotationInterval = window.setInterval(()=>{
                    myChart.options.rotation = myChart.options.rotation + resultValue;
                    myChart.update();
                    if(myChart.options.rotation >= 360){
                        count += 1;
                        resultValue -= 5;
                        myChart.options.rotation = 0;
                        spinBtn.disabled = true;
                    }else if(count > 15 && myChart.options.rotation == randomDegree){
                        valueGenerator(randomDegree);
                        clearInterval(rotationInterval);
                        count = 0;
                        resultValue = 101;
                        myChart.options.rotation = 0;
                        spinBtn.disabled = true;
                    }
                },10);
            })
    </script>
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
