// Create markup
module.exports = function(randomID, actions) {

  var markup = '';

  markup += '<div id="' + randomID + '" class="wysiwygEditor-wrapper">';
  markup +=   '<div class="wysiwygEditor-toolbar">';
  markup +=     '<ul>';

  // Display all tools
  $.each(actions, function(i) {
    markup +=       '<li>';
    markup +=         '<a href class="wysiwygEditor-' + actions[i].title + '" title="' + actions[i].title.toUpperCase() + '">';
    markup +=           '<i class="fa fa-' + actions[i].title + '"></i>';
    markup +=        '</a>';
    markup +=       '</li>';

    // Break
    if(typeof(actions[i].break) != 'undefined') {
      markup +=     '<li class="break">|</li>'
    }
  });

  markup +=     '</ul>';
  markup +=   '</div>';
  markup +=   '<div class="wysiwygEditor-editArea">';
  markup +=     '<iframe src="about:blank" height="300"></iframe>';
  markup +=   '</div>';
  markup +=   '<div class="wysiwygEditor-footer">';
  markup +=   'HTML';
  markup +=   '</div>';
  markup += '</div>';

  return markup;

}
