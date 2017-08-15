$.fn.wysiwygEditor = function() {

  'use strict'

  var textarea = this;

  var randomID = 'wysiwygEditor-' + Math.floor(Math.random() * 1000000);
  var actions = require('./actions')
  var markup = require('./markup');
  var iframeLoaded = require('./iframeLoaded');
  var iframeSettings = require('./iframeSettings');
  var getAction = require('./getAction');
  var backlightActiveTools = require('./backlightActiveTools');
  var bindClickToolbar = require('./bindClickToolbar.js');
  var triggerContentChanged = require('./triggerContentChanged.js');

  // Hide original textarea
  textarea.css('display', 'none');
  textarea.addClass(randomID);

  // Create new wysiwygEditor
  textarea.before(markup(randomID, actions));
  var iframe = $('#' + randomID).find('iframe');

  iframeLoaded(iframe, function() {
    var editArea = iframe[0].contentDocument;

    // Set iframe width
    iframeSettings.setWidth(iframe);

    // Set iframe body to editable
    iframeSettings.setAttributes(editArea);

    // Iframe body styles
    iframeSettings.setStylesheet(editArea);
    iframeSettings.setCss(editArea);

    // Copy data from textarea to iframe
    $(editArea.body).html(textarea.val());

    // Bind click events for toolbar
    bindClickToolbar(randomID, editArea, getAction, backlightActiveTools, actions);

    // Trigger contentChanged
    triggerContentChanged(randomID, editArea, textarea, backlightActiveTools, actions);

    // Textarea synchronization
    $(editArea.body).on('contentChanged', function() {
      textarea.val($(this).html());
    });
  });

  return this;
}
