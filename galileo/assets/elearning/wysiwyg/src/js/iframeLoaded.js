// iframeLoaded
module.exports = function(element, callback) {

  var loop = true;

  while(loop) {
    if($(element).length) {
      $($(element)[0].contentDocument).ready(function() {
        callback();
      });
      loop = false;
    }
  }

}
