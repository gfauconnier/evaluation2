// stacktable
$('#accounts_table').stacktable()

// adds a link to tbody rows
$('.accounts').click(function() {
  window.location.href = 'account_details.php?id_account=' + this.id;
})

// bootstrap tabs display
$('#accountTabs a').on('click', function(e) {
  e.preventDefault()
  $(this).tab('show')
})

// changes the displayed account on select change
$('.owned_accounts').change(function() {
  window.location.href = 'account_details.php?id_account=' + this.value[0];
})

// changes the color of the text depending on balance value
$(document).ready(function () {
  $('.balance').each(function(index) {
    if (($('.balance').eq(index).text() < 0)) {
      $('.balance').eq(index).addClass("red")
    }
    else if (($('.balance').eq(index).text() > 0)) {
      $('.balance').eq(index).addClass("green")
    }
  })
})
