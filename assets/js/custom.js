 $(document).ready(function(){
  $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
  {
    return {
      "iStart": oSettings._iDisplayStart,
      "iEnd": oSettings.fnDisplayEnd(),
      "iLength": oSettings._iDisplayLength,
      "iTotal": oSettings.fnRecordsTotal(),
      "iFilteredTotal": oSettings.fnRecordsDisplay(),
      "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
      "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
    };
  };

  var table_dasar = $("#table-dasar").dataTable({
    initComplete: function() {
      var api = this.api();
      $('#table_dasar input')
      .off('.DT')
      .on('input.DT', function() {
        api.search(this.value).draw();
      });
    },
    oLanguage: {
      sProcessing: "loading..."
    },
    processing: true,
    serverSide: true,
    ajax: {"url": SITE_URL +'/welcome/get_all_data_dasar', "type": "POST"},
    columns: [
    {"data": "id"},
    {"data": "kata"},
    ],
    order: [[1, 'asc']],
    rowCallback: function(row, data, iDisplayIndex) {
      var info = this.fnPagingInfo();
      var page = info.iPage;
      var length = info.iLength;
      $('td:eq(0)', row).html();
    }
  });


  $('#table-uji').DataTable({
    pageLength: 25,
    responsive: true,


  });


  $("#btn-temukan").click(function(e) {
    let inputKata = $("input[name='input-kata']").val();

    $.ajax({
      url: SITE_URL + 'welcome/single_stem',
      type: 'POST',
      dataType: 'json',
      data: {'input-kata': inputKata},
    })
    .done(function(res) {
      let status = $("#ket-status");
      let input = $("#ket-input");
      let output = $("#ket-output");
      let rule = $("#ket-rule");


      let classLabel = '';
      let textLabel = '';
      if (res.result == false)
      {
        classLabel = 'label label-danger';
        textLabel = 'Tidak Ditemukan';
      } 
      else 
      {
        classLabel = 'label label-primary';
        textLabel = 'Ditemukan';
      }

      status.removeClass('label-danger').removeClass('label-primary');
      status.html(textLabel).addClass(classLabel);

      input.html(res.input);
      output.html(res.output);
      rule.html(res.rule);

      console.log(res);
    })
    .fail(function() {
    })
    .always(function() {
    });
    

  });

  $(document).keypress(function(e){
    if (e.which == 13){
      $("#btn-temukan").click();
    }
  });
});