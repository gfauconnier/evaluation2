$('#accounts_table').stacktable();

// adds a link to tbody rows
$('.accounts').click(function(){
  window.location.href = 'account_details.php?id_account=' + this.id;
});
