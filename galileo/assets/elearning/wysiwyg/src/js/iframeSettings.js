// iframeSettings
exports.setAttributes = function(editArea) {

  $(editArea).designMode = 'on';
  $(editArea.body).attr('contenteditable', true);

};

exports.setStylesheet = function(editArea) {

  $(editArea.head).append('<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,800" rel="stylesheet" type="text/css">');

};

exports.setCss = function(editArea) {

  $(editArea.body).css('padding', '15px');
  $(editArea.body).css('font-family', 'Open Sans, sans-serif');
  $(editArea.body).css('font-size', '13px');
  $(editArea.body).css('line-height', '1.6em');

}

exports.setWidth = function(iframe) {

  // Set iframe width
  iframe.width(iframe.parent().width());
  $(window).resize(function() {
    iframe.width(iframe.parent().width());
  });

};
