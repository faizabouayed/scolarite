insertItem:function(insertingClient){
        this.clients.push(insertingClient);
        var dat=new Date(document.getElementById("d").value);
        if(mois%2==0) alert("31");
        else 
          if (mois==1) alert("Fev 28 ou 29");
      },