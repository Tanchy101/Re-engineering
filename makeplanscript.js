$(function() {

  // Double click to rotate
  $(".rect").live("dblclick", function() {
      var width = 120;
      var height = 80;
      if ($(this).hasClass("r90")) {
          $(this).removeClass("r90");
          $(this).addClass("r180");
          $('.rect-container').toggleClass('h');
          $('.rect-container').toggleClass('v');
      } else if ($(this).hasClass("r180")) {
          $(this).removeClass("r180");
          $(this).addClass("r270");
          $('.rect-container').toggleClass('h');
          $('.rect-container').toggleClass('v');
      } else if ($(this).hasClass("r270")) {
          $(this).removeClass("r270");
          $('.rect-container').toggleClass('h');
          $('.rect-container').toggleClass('v');
      } else {
          $(this).addClass("r90");
          $('.rect-container').toggleClass('h');
          $('.rect-container').toggleClass('v');
      }

  });

});

interact('.drag-element').draggable({
  'manualStart' : true,      
  'onmove' : function (event) {

    var target = event.target;

    var x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx;
    var y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;
    

    // translate the element
    target.style.webkitTransform = target.style.transform = 'translate(' + x + 'px, ' + y + 'px)';

    // update the position attributes
    target.setAttribute('data-x', x);
    target.setAttribute('data-y', y);

  },
  'onend' : function (event) {

    console.log('Draggable: ', event);

  }
}).on('move', function (event) {
  var interaction = event.interaction;

  // if the pointer was moved while being held down
  // and an interaction hasn't started yet
  if (interaction.pointerIsDown && !interaction.interacting() && event.currentTarget.classList.contains('drag-element-source')) {

    var original = event.currentTarget;
    
    // create a clone of the currentTarget element
    var clone = event.currentTarget.cloneNode(true);

    // Remove CSS class using JS only (not jQuery or jQLite) - http://stackoverflow.com/a/2155786/4972844
    clone.className = clone.className.replace(/\bdrag-element-source\b/,'');
      
    // insert the clone to the page
    // TODO: position the clone appropriately

    document.getElementById('form-container').appendChild(clone);

    // start a drag interaction targeting the clone
    interaction.start({ name: 'drag' }, event.interactable, clone);
    

  } else {
  interaction.start({ name: 'drag' }, event.interactable, event.currentTarget);
  }


});

// enable draggables to be dropped into this
interact('.dropzone').dropzone({
// only accept elements matching this CSS selector
accept: '.drag-element',
// Require a 75% element overlap for a drop to be possible
overlap: 0.75,

// listen for drop related events:
ondropactivate: function (event) {
  
// add active dropzone feedback
event.target.classList.add('drop-active');
  
},
ondragenter: function (event) {
  
var draggableElement = event.relatedTarget;
var dropzoneElement = event.target;

// feedback the possibility of a drop
dropzoneElement.classList.add('drop-target');
draggableElement.classList.add('can-drop');
draggableElement.textContent = ''
  
},
ondragleave: function (event) {
  
// remove the drop feedback style
event.target.classList.remove('drop-target');
event.relatedTarget.classList.remove('can-drop');
event.relatedTarget.textContent = ''
  
},
ondrop: function (event) {

  console.log('Drop Zone: ', event);
  console.log('Dropped Element: ', event.relatedTarget);
  
  $(event.relatedTarget).remove();
  //event.relatedTarget.classList.add('dropped');
  
},
ondropdeactivate: function (event) {
  
// remove active dropzone feedback
event.target.classList.remove('drop-active');
event.target.classList.remove('drop-target');
  
}

});


function applyOverlay(selector) {
  var elements = document.querySelectorAll(selector);
  elements.forEach(function (element) {
    var overlay = document.createElement('div');
    overlay.classList.add('overlay');
    element.appendChild(overlay);
  });
}

function applyOverlay2(selector) {
  var elements = document.querySelectorAll(selector);
  elements.forEach(function (element) {
    var overlay = document.createElement('div');
    overlay.classList.add('overlay2');
    element.appendChild(overlay);
  });
}

function removeOverlay(selector) {
  var elements = document.querySelectorAll(selector);
  elements.forEach(function (element) {
    var overlay = element.querySelector('.overlay');
    if (overlay) {
      element.removeChild(overlay);
    }
  });
}
function removeOverlay2(selector) {
  var elements = document.querySelectorAll(selector);
  elements.forEach(function (element) {
    var overlay = element.querySelector('.overlay2');
    if (overlay) {
      element.removeChild(overlay);
    }
  });
}
