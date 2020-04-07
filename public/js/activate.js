// Tooltips activate
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});

$(function () {
  $("#submit").click(function () {
    let confirm = $("#confirm").val();
    if(confirm != 'YAKIN')
    {
      alert('Silahkan ketikkan, yakin');
      return false;
    }
    return true;
  });
});
