document.addEventListener('DOMContentLoaded', (event) => {
  // Set the background black and text white
  document.body.style.backgroundColor = 'black';
  document.body.style.color = 'white';

  // Function to apply movement effect
  function moveText(event) {
    event.target.style.transform = 'translate(5px, -5px)';
  }

  // Function to reset text position
  function resetText(event) {
    event.target.style.transform = 'translate(0, 0)';
  }

  // Select all text elements you want to apply the effect to
  var textElements = document.querySelectorAll('p');
  
  // Add event listeners to the selected elements
  textElements.forEach(elem => {
    elem.style.transition = 'transform 0.3s ease';
    elem.addEventListener('mouseover', moveText);
    elem.addEventListener('mouseout', resetText);
  });
});
