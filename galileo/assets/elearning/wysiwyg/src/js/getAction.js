// Get action
module.exports = function(element) {

    if(typeof(element.action) != 'undefined')
      return element.action;
      
    if(typeof(element.title) != 'undefined')
      return element.title;

};
