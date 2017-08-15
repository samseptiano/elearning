module.exports = function(randomID, editArea, getAction, backlightActiveTools, actions) {

  $.each(actions, function(i) {
    $('#' + randomID).find('.wysiwygEditor-' + actions[i].title).bind('click', function(e) {
      e.preventDefault();
      editArea.body.focus();

      if(typeof(actions[i].value) != 'undefined') {
        var value = prompt(actions[i].desc);
        if(value != null)
          editArea.execCommand(getAction(actions[i]), false, value);
      } else {
        editArea.execCommand(getAction(actions[i]), false, null);
      }

      $(this).toggleClass('action-active');
      backlightActiveTools(randomID, $(editArea.getSelection().anchorNode).parents(), actions);
    });
  });
  
};
