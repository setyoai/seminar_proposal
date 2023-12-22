/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

var path = location.pathname.split('/')
var url = location.origin + '/' + path[1]

//custom menu active
$('ul.sidebar-menu li a').each(function () {
  if ($(this).attr('href').indexOf(url) !== -1) {
    $(this).parent().addClass('active').parent('li').addClass('active')
  }
})

// datatables
$(document).ready( function (){
  $('#table1').DataTable();
});

//modal confirmation
function submitDel(id) {
  $('#del-'+id).submit()
}

//return logout

function returnLogout() {
  var link = $('#logout').attr('href')
  $(location).attr('href', link)
}

var statusCell = document.getElementById('statusCell');

// Define a function to update the content based on the value
function updateStatus(value) {
  // Clear previous content
  statusCell.innerHTML = '';

  // Create a new badge element
  var badge = document.createElement('div');
  badge.classList.add('badge');

  // Check the value and set the appropriate class and text
  if (value === 1) {
    badge.classList.add('badge-success');
    badge.textContent = 'Diterima';
  } else if (value === 2) {
    badge.classList.add('badge-danger');
    badge.textContent = 'Ditolak';
  } else {
    badge.classList.add('badge-secondary');
    badge.textContent = 'Undefined'; // Handle other values if needed
  }

  // Append the badge to the cell
  statusCell.appendChild(badge);
}

// Example usage:
var valueToDisplay = 1; // Replace with your actual value
updateStatus(valueToDisplay);
