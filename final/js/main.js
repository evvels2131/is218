$(function() {
  console.log('document.onload --> ready!');
  console.log(' ');

  // Go back to the previous page
  $('#backButton').on('click', function() {
    window.history.back();
  });

});
