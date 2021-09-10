$( document ).click(function() {
    $( "#timer" ).toggle("slide", {direction: "left", easing: "linear" }, 10000, function() {
        //alert("toto");
      });

  });