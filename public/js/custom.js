

//alert("Se ha cargado el test wsm");
//document.getElementById('btnGetData').onclick = function () { alert('hello1!'); };;
//document.getElementById('btnShowAll').onclick= function () { alert('hello2!'); };;

$("#btnGetData").on("click",function(event){
    event.preventDefault();
    obtenerDatosCuenta()
    // resto de tu codigo
});

function obtenerDatosCuenta()
{
    var cuentaP = document.getElementById("accountId").value;
    //const url  = '/reports/account1/' + cuentaP;

    if(cuentaP == "")
        return false
    else{
        console.log("Funciona :D")
        $.ajax({
            url: "/reports/show/" + cuentaP,
            method: "GET",
            async: true,
            dataType: "json",
            success: function (response) {
                console.log(response);
                $('#tblDatas').empty()
                if(response.length == 0)
                {
                    alert("holaaa")
                    $('#tblDatas').append('' +
                        '<tr><td>' +
                        'No data available for ' +
                        'the supplied Account Id.' +
                        '</td></tr>');
                }
                else
                {
                    $.each(response.data, function(i, data) {
                        $('#tblDatas').append('<tr><td>' + data.accountName + '</td><td>' +
                            data.accountId + '</td><td>' +
                            data.spend + '</td><td>' +
                            data.clicks + '</td><td>' +
                            data.impressions + '</td><td>' +
                            data.costPerClick + '</td></tr>');

                    });
                }
            },
            error: function(response) {
                console.log(response)
            }
        });
    }
}

$("#btnShowAll").on("click",function(event){
    event.preventDefault();
    location.reload();
    // resto de tu codigo
});