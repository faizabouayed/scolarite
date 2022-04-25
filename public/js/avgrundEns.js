(function($) {
  'use strict ';
  $(function() {
    $('#show').avgrund({
      height:500 ,
      //width: 600,
      holderClass: 'custom',
      showClose: true,
      showCloseText: 'x',
      onBlurContainer: '.container-scroller',
      /*template: '<p>So implement your design and place content here! If you want to close modal, please hit "Esc", click somewhere on the screen or use special button.</p>' +
        '<div>' +
        '<a href="http://twitter.com/voronianski" target="_blank" class="twitter btn btn-twitter btn-block">Twitter</a>' +
        '<a href="http://dribbble.com/voronianski" target="_blank" class="dribble btn btn-dribbble btn-block">Dribbble</a>' +
        '</div>'+
        '<div class="text-center mt-4">' +
        '<a href="#" target="_blank" class="btn btn-success mr-2">Great!</a>' +
        '<a href="#" target="_blank" class="btn btn-light">Cancel</a>' +
        '</div>'*/
         template:'<div style="text-align: center">'+
        '<legend>Modifier les coordonnées:</legend>  ' +       
        'Nom:<br><input type="text" name="nom" placeholder="Nom" size="30" maxlength="10" style="border-radius:5px;  box-shadow:1px 1px 2px #C0C0C0 inset" ></input></br>'+
        'Prénom:<br><td><input type="text" name="prénom" placeholder="Prénom" size="30" maxlength="10"style="border-radius:5px;  box-shadow:1px 1px 2px #C0C0C0 inset" ></input></br>'+ 
        'Date de naissance:<br><input type="date" name="date" size="80" maxlength="10" style="border-radius:5px;  box-shadow:1px 1px 2px #C0C0C0 inset"></input> </br>'+
        'Grade:<br><td><input type="text" name="prénom" placeholder="Grade" size="30" maxlength="10"style="border-radius:5px;  box-shadow:1px 1px 2px #C0C0C0 inset" ></input></br>'+ 

        '</div>' +
        '<div class="text-center mt-4">' +
        '<a  target="_blank" class="btn btn-success mr-2">confirmer!</a>' +
        '<a  target="_blank" class="btn btn-light">Cancel</a>' +
        '</div>'
    });
  })
})(jQuery);