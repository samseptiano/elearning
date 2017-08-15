// Backlight active tools
module.exports = function(randomID, elements, actions) {

  $.each(actions, function() {
    var action = this;
    var match = false;

    $.each(elements, function() {
      var nodeName = this.nodeName;

      // Align property style name
      if(this.style.textAlign != '')
        nodeName = this.style.textAlign;

      if(typeof(action.nodeName) != 'undefined' && action.nodeName === nodeName)
        match = true;
    });

    if(match)
      $('#' + randomID).find('.wysiwygEditor-' + action.title).addClass('action-active');
    else
      $('#' + randomID).find('.wysiwygEditor-' + action.title).removeClass('action-active');
  });

};
