document.addEventListener('DOMContentLoaded', function () {
  candiatosAlumnos=document.querySelector("#txtDatos").getAttributeNames();
  console.log(candiatosAlumnos);
  

  var chartDom = document.querySelector('.Grafica');
  var myChart = echarts.init(chartDom);
  var option = {
    tooltip: {
      trigger: 'item'
    },
    legend: {
      top: '5%',
      left: 'center'
    },
    series: [
      {
        name: 'Estadisticas',
        type: 'pie',
        radius: ['40%', '70%'],
        avoidLabelOverlap: false,
        itemStyle: {
          borderRadius: 10
        },
        label: {
          show: false,
          position: 'center'
        },
        emphasis: {
          label: {
            show: true,
            fontSize: '20',
            fontWeight: 'bold'
          }
        },
        labelLine: {
          show: false
        },
        data: [
          { value: parseInt(document.querySelector("#txtDatos").getAttribute(candiatosAlumnos[4])), name: 'Candiatos que son Alumnos del tec postulados ' },
          { value: parseInt(document.querySelector("#txtDatos").getAttribute(candiatosAlumnos[3])), name: 'Candidatos generales postulados' },
          { value: parseInt(document.querySelector("#txtDatos").getAttribute(candiatosAlumnos[5])), name: 'Candidatos no postulados' }
        ]
      }
    ]
  };
  myChart.setOption(option); // Esta línea es crucial para renderizar el gráfico
});
