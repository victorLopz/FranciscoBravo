function generar(){
    var inicio = document.getElementById("dateinicios").value;
    var final = document.getElementById("datefini").value;
    var tienda = document.getElementById("inputGroupSelect01").value;


    window.location.href = '../dashboard/imprimirreporte.php?inicio='+inicio+'&final='+final+'&tienda='+tienda;
    
}