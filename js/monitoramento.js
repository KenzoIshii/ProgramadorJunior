$(document).ready(function() {
    $.ajax({
        url: 'http://127.0.0.1:8000/lib/View/painelView.php',
        success: function(response) {
            // Display the HTML content
            $('#content').html(response);
        },
        error: function(xhr, status, error) {
            console.log("Errou!!");
        }
    });
});

function reloadPage() {
    $('#cartoes').empty();
    $.ajax({
        url: "http://127.0.0.1:8000/lib/libFile.php",
        cache: false,
        dataType: 'json',
        type: "GET",
        success: function (data) {
            for (let i in data) {
                $('#cartoes').append(`
                       <div class="cartao">
                       <div>${data[i].nome}</div>
                       <span class="${data[i].status} icone-posicao"></span>
                        </div>`)
            }
            setTimeout(reloadPage, 10000);
        },
        error: function () {
            console.log("Errou!!");
        }
    });
}

reloadPage();