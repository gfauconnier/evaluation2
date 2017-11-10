// stacktable
$('#accounts_table').stacktable()

// adds a link to tbody rows
$('.accounts').click(function(){
  window.location.href = 'account_details.php?id_account=' + this.id;
})

// bootstrap tabs display
$('#accountTabs a').on('click', function (e) {
  e.preventDefault()
  $(this).tab('show')
})
