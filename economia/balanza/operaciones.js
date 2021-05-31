function sumarBCC()
{
  const $total = document.getElementById('saldos');
  let subtotal = 0;
  [ ...document.getElementsByClassName( "montoBCC" ) ].forEach( function ( element ) {
    if(element.value !== '') {
      subtotal += parseFloat(element.value);
    }
  });
  $total.value = subtotal;
}