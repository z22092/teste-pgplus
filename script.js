
let drop_ = document.querySelector('.area-upload #upload-file');
drop_.addEventListener('dragenter', function () {
  document.querySelector('.area-upload .label-upload').classList.add('highlight');
});
drop_.addEventListener('dragleave', function () {
  document.querySelector('.area-upload .label-upload').classList.remove('highlight');
});
drop_.addEventListener('drop', function () {
  document.querySelector('.area-upload .label-upload').classList.remove('highlight');
});

var barra = document.createElement("div");
var fill = document.createElement("div");
var text = document.createElement("div");
barra.appendChild(fill);
barra.appendChild(text);
barra.classList.add("barra");
fill.classList.add("fill");
text.classList.add("text");


document.querySelector('#upload-file').addEventListener('change', function () {
  files = this.files;
  for (var i = 0; i < files.length; i++) {
    var info = { "success": "Enviando: " + files[i].name };
    if (info.error == undefined) {
      text.innerHTML = info.success;
      enviarArquivo(i, barra);
    } else {
      text.innerHTML = info.error;
      barra.classList.add("error");
    }
    document.querySelector('.lista-uploads').appendChild(barra);
  };
});

function enviarArquivo(indice, barra) {
  const data = new FormData();
  const request = new XMLHttpRequest();
  var i = 0
  const load = []
  data.append('file', document.querySelector('#upload-file').files[indice]);
  request.onreadystatechange = function (event) {
    if (this.responseText) {

      const partialResponse = this.responseText.split("\n")[i];

      i++

      const partialResponseJson = JSON.parse(partialResponse)
      load.push(`<a> ${partialResponseJson.id} <i class="fas fa-check"> </i>`)
      barra.querySelector(".text").innerHTML = load.join('<br>');

      const percent_complete = (partialResponseJson.i / partialResponseJson.size) * 100 + 1;
      barra.querySelector(".fill").style.minWidth = percent_complete + "%";
    }
  }
  request.addEventListener('load', function (event) {
    if ('CLOSE') {
      var response = this.response.split('\n');
      response = response[response.length - 2];
      const lastResponse = JSON.parse(response);

      if (lastResponse) {
        load.unshift(`<a href=${lastResponse.file} target="_blank"> ${lastResponse.id} </a> <i class="fas fa-check"></i>`);
        barra.querySelector(".text").innerHTML = load.join('<br>');
      }
      barra.querySelector(".fill").style.minWidth = 100 + "%";
      barra.classList.add("complete");
    }
  });
  request.upload.addEventListener('progress', function (e) {
    const percent_complete = (e.loaded / e.total) * 100;
    barra.querySelector(".fill").style.minWidth = percent_complete + "%";
  });
  request.responseType = 'octet-stream';
  request.open('post', './src/upload.php', true);
  request.send(data);
}
