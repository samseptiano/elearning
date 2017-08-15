module.exports = function(randomID, editArea, textarea, backlightActiveTools, actions) {

  $.each(['click', 'keyup'], function() {
    $(editArea.body).bind(this.toString(), function(e) {
      if($(this).html() != textarea.val())
        $(this).trigger('contentChanged');

      // Update footer element indicator
      var footerElementIndicator = '';
      var elements = $(editArea.getSelection().anchorNode).parents();

      for(var i = elements.length - 1; i >= 0; i--) {
        footerElementIndicator += elements[i].nodeName;
        if(i != 0)
          footerElementIndicator+= ' &raquo; ';
      }

      $('#' + randomID).find('.wysiwygEditor-footer').html(footerElementIndicator);

      backlightActiveTools(randomID, elements, actions);
    });
  });

};
