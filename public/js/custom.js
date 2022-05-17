

//alert("Se ha cargado el test wsm");
//document.getElementById('btnGetData').onclick = function () { alert('hello1!'); };;
//document.getElementById('btnShowAll').onclick= function () { alert('hello2!'); };;

$("#btnGetData").on("click",function(event){
    event.preventDefault();
    obtenerDatosCuenta()
    // resto de tu codigo
});
function obtenerDatosCuenta(){

    var cuentaP = document.getElementById("accountId").value;

    const url  = '/reports/account1/' + cuentaP;

    if(cuentaP == "")
        return false
    else{
        $.ajax({
            url: "/reports/account1" + cuentaP,
            type: "get",
            dataType: "json",
            success: function (datos) {
                showData(datos);
            }
        });
    }
}