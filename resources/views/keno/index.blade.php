<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Keno Gasy
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="p-6 bg-white border-b border-gray-200 row justify-content-between align-items-center mb-4">
        <div class="col" id="welcome">
          Tongasoa
        </div>
        <button class="btn btn-success col-1" id="generator">
          alefa
        </button>
      </div>
      <div class="row">
        <div class="p-2 bg-dark rounded container-result me-2" id="display-result">
          <ul class="row g-0 flex-column-reverse" style="height: 330px; width:65px">
          </ul>
        </div>
        <div id="digit" class="p-2 bg-dark border rounded container-result">
          <div class="border-b border-orange-500 py-1 fs-4 text-slate-50 mb-2 text-center">
            Misafidiana tarehimarika <br> raha toa ka hilalao!
            <button class="btn bg-orange-500" id="bet">Pari</button>
          </div>
          <ul class="row g-0" style="width: 330px; height: fit-content">
          </ul>
        </div>
        <div class="col ms-2 border-2 rounded">
          <div class="alert alert-dark my-2 uppercase fw-bolder text-center text-orange-500">
            Momban'ny lalao
          </div>
          <div>
            <strong>Ireo safidinao : </strong>
            <ul class="ps-4 mt-2" id="userChoice">
              
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
<style>
  .ball {
    width: 27px;
    height: 27px;
    line-height: 27px;
    text-align: center;
  }

  .container-result {
    width: max-content;
  }

  .digit:hover {
    cursor: pointer;
    color: #FFFFFF;
    background: #921
  }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
  integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  for (let j = 1; j < 81; j++) {
    $('#digit ul').append('<li class="ball m-1 rounded-circle bg-orange-500 fw-bold digit" onclick="userChoice(' + j + ')">' + j + '</li>')
  }
  let numberChoice = []
  let hiddenNumb = []
  let i = 0
  $('#display-result').hide()
  $('#generator').on('click', function () {
    $('#generator').hide()
    for (let index = 0; index < 20; index++) {
      let number = Math.floor(Math.random() * 81);
      if (hiddenNumb.includes(number)) {
        index--
      } else {
        hiddenNumb.push(number)
      }
    }
    $('#display-result').show()
    const myInterval = setInterval(showResult, 100)
    function showResult() {
      $('#display-result ul').append('<li class="ball m-1 rounded-circle bg-orange-500 fw-bold">' + hiddenNumb[i] + '</li>')
      i++
      if (i > 19) {
        clearInterval(myInterval)
      }
    }
  })
  
  function userChoice(n) {
    numberChoice.push(n)
    return numberChoice
  }

  $('#bet').on('click', () => {
    $('#userChoice').append('<li>' + numberChoice.join('-') + '</li>')
    numberChoice = []
    // $('#bet').prop('disabled', true);
  })


</script>