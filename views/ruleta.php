<div class="container">
  <div class="row text-center">
    <div class="col-12">
      <h4>Si no sabes que zapatillas elegir, puedes ayudarte con esta ruleta :)</h4><br>
    </div>
    
    <div class="col-12">
      <canvas id="canvas" height="400" width="400"></canvas>
    </div>
    <div class="col-12">
      <button type="button" class="btn btn-warning" onclick="miRuleta.startAnimation();">GIRAR RULETA</button>
    </div>
  </div>
</div>
	
<script>
	var miRuleta = new Winwheel({
		'numSegments': 7,
		'outerRadius': 170,
		'segments': [
			    { 'fillStyle': '#9A57EB', 'text': 'Nike' },
          { 'fillStyle': '#d2f3e0', 'text': 'ADIDAS' },
          { 'fillStyle': '#77D157', 'text': 'REEBOK' },
          { 'fillStyle': '#EB7971', 'text': 'PUMA' },
          { 'fillStyle': '#6EDCE0', 'text': 'VANS' },
          { 'fillStyle': '#f7ff56', 'text': 'ASICS' },
          { 'fillStyle': '#E089C3', 'text': 'NEW BALANCE' },
		],
		'animation': {
			'type': 'spinToStop',
			'duration': 5,
			'callbackFinished': 'Mensaje()',
			'callbackAfter': 'dibujarIndicador()',
		}
	});
	function Mensaje() {
         var SegmentoSeleccionado = miRuleta.getIndicatedSegment();
         swal ( "Enhorabuena!" ,  "Puedes decantarte por unas zapatillas " + SegmentoSeleccionado.text,  "success" )
         // reinicio de la ruleta
         miRuleta.stopAnimation(false);
         miRuleta.rotationAngle = 0;
         miRuleta.draw();
         dibujarIndicador();
     }


	dibujarIndicador();

	function dibujarIndicador() {
          var ctx = miRuleta.ctx;
          ctx.strokeStyle = 'navy';     
          ctx.fillStyle = 'black';     
          ctx.lineWidth = 2;
          ctx.beginPath();             
          ctx.moveTo(170, 0);          
          ctx.lineTo(230, 0);          
          ctx.lineTo(200, 40);
          ctx.lineTo(171, 0);
          ctx.stroke();                
          ctx.fill();                  
     }
</script>