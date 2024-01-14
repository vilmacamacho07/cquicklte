$(".imprimir").click(function(e) {
    /* Obtener el tr de la línea actual */
    var table_tr = $(this).parent().parent();
    imprimirElemento(table_tr);
  })
  
  function imprimirElemento(linea) {
    var contents = '';
    linea.find('td').each(function() {
      contents += '<p>' + $(this).html() + '</p>';
    });
  
    var frame1 = $('<iframe />');
    frame1[0].name = "frame1";
    frame1.css({
      "position": "absolute",
      "top": "-1000000px"
    });
    $("body").append(frame1);
  
    var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
  
    frameDoc.document.open();
    frameDoc.document.write('<html><head><title>Ticket VE - AR S.A de C.V.</title>');
    frameDoc.document.write('</head><body>');
    // Por si quieres añadir css.
    //frameDoc.document.write('<link href="style.css" rel="stylesheet" type="text/css" />');
    frameDoc.document.write(contents);
    frameDoc.document.write('</body></html>');
    frameDoc.document.close();
    setTimeout(function() {
      window.frames["frame1"].focus();
      window.frames["frame1"].print();
      frame1.remove();
    }, 500);
  }