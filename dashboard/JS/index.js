//Consultas de Usuarios metodo AJAX
console.clear();
Viewusuarios();

function Viewusuarios(){



    //Vista de Usuarios
    $.ajax({
        url: '../dashboard/bd/Consultas.php',
        type:"POST",
        datatype: "json",
        data: {
            valordeConsulta: 1, 
        }, 
        success: function(data1) {
            let usu = JSON.parse(data1)[0].numberusuarios;
            $('#NumeroUsuariossistema').html(usu);
        }
    });

    //Vista de total de productos del inventario
    $.ajax({
        url: '../dashboard/bd/Consultas.php',
        type:"POST",
        datatype: "json",
        data: {
            valordeConsulta: 2, 
        }, 
        success:function(data2){
            let inv = JSON.parse(data2)[0].keslerpendejo;
            $('#inventario').html(inv);
        }
     });

     $.ajax({
      url: '../dashboard/bd/Consultas.php',
      type:"POST",
      datatype: "json",
      data: {
          valordeConsulta: 12, 
      }, 
      success:function(data){
          let inv = JSON.parse(data)[0].suma;
          $('#dineroencaja').html(inv);
      }
   });

   $.ajax({
    url: '../dashboard/bd/Consultas.php',
    type:"POST",
    datatype: "json",
    data: {
        valordeConsulta: 13, 
    }, 
    success:function(data){
        let inv = JSON.parse(data)[0].sumafac;
        $('#Ventasdeldia').html(inv);
    }
 });

 $.ajax({
  url: '../dashboard/bd/Consultas.php',
  type:"POST",
  datatype: "json",
  data: {
      valordeConsulta: 15, 
  }, 
  success:function(data){
      let venta = JSON.parse(data)[0].venta;
      $('#ventatotal').html("C$: "+venta);

      let compra = JSON.parse(data)[0].compra;
      $('#compras').html("C$: "+compra);

      let ganancias = JSON.parse(data)[0].ganancias;
      $('#ganancias').html("C$: "+ganancias);
  }
});

 $.ajax({
  url: '../dashboard/bd/Consultas.php',
  type:"POST",
  datatype: "json",
  data: {
      valordeConsulta: 14, 
  }, 
  success:function(data){
      let uno = JSON.parse(data)[0].uno;
      $('#uno').html(uno);

      let dos = JSON.parse(data)[0].dos;
      $('#dos').html(dos);

      let tres = JSON.parse(data)[0].tres;
      $('#tres').html(tres);

      let cuatro = JSON.parse(data)[0].cuatro;
      $('#cuatro').html(cuatro);
  }
});
}

$(function () {

  let uno, dos, tres, cuatro;

  $.ajax({
    url: '../dashboard/bd/Consultas.php',
    type:"POST",
    datatype: "json",
    data: {
        valordeConsulta: 10, 
    }, 
    success:function(data){
      
          uno = JSON.parse(data)[0].almacenuno;
         dos = JSON.parse(data)[0].almacendos;
         tres = JSON.parse(data)[0].almacentres;
         cuatro = JSON.parse(data)[0].almacencuatro;

         let almacen1 = uno;
        let almacen2 = dos;
        let almacen3 = tres;
        let almacen4 = cuatro;

    var donutData = [
        {
          label: 'Almacen 1',
          data : almacen1,
          color: '#ffc107'
        },
        {
          label: 'Almacen 2',
          data : almacen2,
          color: '#28a745'
        },
        {
          label: 'Almacen 3',
          data : almacen3,
          color: '#17a2b8'
        },
        {
          label: 'Almacen 4',
          data : almacen4,
          color: '#dc3545'
        }
      ]
      $.plot('#donut-chart', donutData, {
        series: {
          pie: {
            show       : true,
            radius     : 1,
            innerRadius: 0.5,
            label      : {
              show     : true,
              radius   : 2 / 3,
              formatter: labelFormatter,
              threshold: 0.1
            }
  
          }
        },
        legend: {
          show: false
        }
      })
      /*
       * END DONUT CHART
       */
  
    }
 });
    /*
     * DONUT CHART
     * -----------
     */

    
})

function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }

  $(document).ready(function(){

    
  $.ajax({
    url: '../dashboard/bd/insercciones.php',
    type:"POST",
    datatype: "json",
    data: {
        valordeConsulta: 5
    },success(data){
      //tienda
      if((JSON.parse(data)[0].estado) == 1)
          $('#tienda').bootstrapToggle('on');

    }
  })

    $.ajax({
      url: '../dashboard/bd/insercciones.php',
      type:"POST",
      datatype: "json",
      data: {
          valordeConsulta: 3
      }, 
      success:function(data){
        if((JSON.parse(data)[0].almacen == 1) && (JSON.parse(data)[0].estado == 1))
            $('#unochek').bootstrapToggle('on');

        if((JSON.parse(data)[1].almacen == 2) && (JSON.parse(data)[1].estado == 1))
            $('#doschek').bootstrapToggle('on');
        
            
        if((JSON.parse(data)[2].almacen == 3) && (JSON.parse(data)[2].estado == 1))
            $('#treschek').bootstrapToggle('on');

        
        if((JSON.parse(data)[3].almacen == 4) && (JSON.parse(data)[3].estado == 1))
            $('#cuatrochek').bootstrapToggle('on');
          
      }
    });

    $(function() {
      $('#unochek').change(function() {
        estado = $(this).prop('checked');
        cambiarestado(estado, 1);
      })

      $('#doschek').change(function() {
        estado = $(this).prop('checked');
        cambiarestado(estado, 2);
      })

      $('#treschek').change(function() {
        estado = $(this).prop('checked');
        cambiarestado(estado, 3);
      })

      $('#cuatrochek').change(function() {
        estado = $(this).prop('checked');
        cambiarestado(estado, 4);
      })

      $('#tienda').change(function() {
        estado = $(this).prop('checked');
        cambiartienda(estado, 5);
      })
    })
  })


  function cambiartienda(estado, valor){

    if(estado){
      estado = 1;
    }else{
      estado = 0;
    }

    $.ajax({
      url: '../dashboard/bd/insercciones.php',
      type:"POST",
      datatype: "json",
      data: {
          valordeConsulta: 4,
          estado: estado,
          valor: valor
      }, 
      success:function(data){
          
      }
    });


  }

  function cambiarestado(estado, valor){

    if(estado){
      estado = 1;
    }else{
      estado = 0;
    }

    $.ajax({
      url: '../dashboard/bd/insercciones.php',
      type:"POST",
      datatype: "json",
      data: {
          valordeConsulta: 2,
          estado: estado,
          valor: valor
      }, 
      success:function(data){
          
      }
    });

  }

  $.ajax({
    url: '../dashboard/bd/grafica.php',
    type:"POST",
    datatype: "json",
    data: {
        valordeConsulta: 1,
    }, 
    success: function(data, semana) {
      console.log(semana);


  $(function () {
    'use strict'
    var salesChartCanvas = $('#salesChart').get(0).getContext('2d')
  
    var salesChartData = {
        labels: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
        datasets: [
          {
            label: 'Digital Goods',
            backgroundColor: 'rgba(60,141,188,0.9)',
            borderColor: 'rgba(60,141,188,0.8)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: [JSON.parse(data)[0].contado, JSON.parse(data)[1].contado, JSON.parse(data)[2].contado, JSON.parse(data)[3].contado, JSON.parse(data)[4].contado, JSON.parse(data)[5].contado, JSON.parse(data)[6].contado]
          },
          {
            label: 'Electronics',
            backgroundColor: 'rgba(210, 214, 222, 1)',
            borderColor: 'rgba(210, 214, 222, 1)',
            pointRadius: false,
            pointColor: 'rgba(210, 214, 222, 1)',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: [JSON.parse(semana)[0].contado, JSON.parse(semana)[1].contado, JSON.parse(semana)[2].contado, JSON.parse(semana)[3].contado, JSON.parse(semana)[4].contado, JSON.parse(semana)[5].contado, JSON.parse(semana)[6].contado]
          }
        ]
      }
  
    var salesChartOptions = {
      maintainAspectRatio: false,
      responsive: true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines: {
            display: false
          }
        }],
        yAxes: [{
          gridLines: {
            display: false
          }
        }]
      }
    }
  
    var salesChart = new Chart(salesChartCanvas, {
      type: 'line',
      data: salesChartData,
      options: salesChartOptions
    })
  
  })
}
});  
  

  
